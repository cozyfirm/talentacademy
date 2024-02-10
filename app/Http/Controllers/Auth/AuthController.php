<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Users\RestartPassword;
use App\Models\Models\Core\Country;
use App\Models\Models\UserModels\RestartToken;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller{
    use UserBaseTrait, ResponseTrait;
    protected string $_path = 'public-part.auth.';

    /**
     *  Return Auth view
     */
    public function auth(){
        return view($this->_path. 'auth');
    }

    public function authenticate(Request $request){
        if(empty($request->email)) return json_encode(['code' => '1101', 'message' => __('Molimo da unesete Vaš email') ]);
        if(empty($request->password)) return json_encode(['code' => '1102', 'message' => __('Molimo da unesete Vašu šifru') ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            return json_encode([
                'code' => '0000',
                'message' => __('Uspješno ste se prijavili!'),
                'url' => route('system.home')
            ]);

//            if(!($user->active ?? '')){
//                return json_encode(array('code' => '0001', 'message' => __('Pristup za korisnika '. ($user->name ?? '') .' nije dozvoljen!')));
//            }else{
//                return json_encode([
//                    'code' => '0000',
//                    'message' => __('Uspješno ste se prijavili!'),
//                    'url' => route('system.users.profile')
//                ]);
//            }
        }else {
            return json_encode([
                'code' => '1100',
                'message' => __('Pogrešni pristupni podaci. Molimo pokušajte ponovo!')
            ]);
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * Destroy sessions and log user out
     */
    public function logout(): \Illuminate\Http\RedirectResponse{
        Auth::logout();
        return redirect()->route('auth');
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Register Form
     */

    /**
     *  Return view for account creation
     */
    public function createAccount(){
        return view($this->_path. 'create-account', [
            'prefixes' => Country::orderBy('phone_code')->get()->pluck('phone_code', 'id'),
            'countries' => Country::orderBy('name_ba')->get()->pluck('name_ba', 'id'),
        ]);
    }

    /**
     * @param Request $request
     * @return bool|\Illuminate\Http\JsonResponse|string|void
     *
     * Ajax END-Point; Create new profile
     */
    public function saveAccount(Request $request){
        try{
            /* Password cannot be empty */
            if(!isset($request->password)) return $this->jsonResponse('1001', __('Unesite Vašu šifru'));

            /* Check for unique email */
            $user = User::where('email', $request->email)->first();
            if($user) return $this->jsonResponse('1002', __('Odabrani email se već koristi'));

            /* Add username to request */
            $request['username'] = $this->getSlug($request->name);

            /* Hash password and add token */
            $request['password'] = Hash::make($request->password);
            $request['api_token'] = hash('sha256', 'root'. '+'. time());
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');

            /* When user is created, UserObserver is called and email was sent */
            /* Note: Data is logged into laravel.log */
            $user = User::create($request->all());

            if($user) return $this->jsonSuccess(__('Uspješno ste se kreirali korisnički račun!'), route('auth'));
        }catch (\Exception $e){
            dd($e);
            return $this->jsonResponse('1101', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Restart password methods
     */

    /**
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function restartPassword(){
        return view($this->_path. 'restart-password');
    }

    /**
     * @param Request $request
     * @return bool|string|void
     * Post method to generate new restart_password token
     */
    public function generateRestartToken(Request $request){
        try{
            $token = RestartToken::create(['email' => $request->email, 'token' => Hash::make(time())]);
            $user  = User::where('email', $request->email)->first();

            /* Set email with instructions */
            Mail::to($request->email)->send(new RestartPassword($user->email, $token->token));

            return $this->jsonSuccess(__('Detaljne upute su Vam poslane putem email-a!'));
        }catch (\Exception $e){
            return $this->jsonResponse('1131', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }

    /**
     * @param $token
     * @return \Illuminate\Contracts\Foundation\Application
     *
     * Offer user option to insert new password
     */
    public function newPassword($token){
        return view($this->_path. 'new-password', [
            'token' => $token
        ]);
    }
}
