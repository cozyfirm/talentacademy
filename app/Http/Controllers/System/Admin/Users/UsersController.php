<?php

namespace App\Http\Controllers\System\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Mail\Users\ConfirmEmail;
use App\Mail\Users\GeneratePresenterPassword;
use App\Models\Models\Core\Country;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class UsersController extends Controller{
    use UserBaseTrait, ResponseTrait;
    protected string $_path = 'admin.users.';

    public function index(){
        $users = User::where('id', '>', 0);
        $users = Filters::filter($users);

        $filters = [
            'name' => __('Ime i prezime'),
            'email' => 'Email',
            'role' => __('Uloga'),
            'phone' => __('Telefon'),
            'birth_date' => __('Datum rođenja'),
            'address' => __('Adresa'),
            'city' => __('Grad'),
            'countryRel->name_ba' => __('Država'),
            'title' => __('Titula'),
            'institution' => __('Institucija'),
            'acceptedAppRel.programRel.title' => __('Program')
        ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'users' => $users
        ]);
    }
    public function create (): View{
        return view($this->_path . 'create', [
            'create' => true,
            'countries' => Country::pluck('name_ba', 'id')
        ]);
    }
    public function save(Request $request): JsonResponse{
        try{
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');

            if($request->role != 'presenter'){
                $request['title'] = '';
                $request['institution'] = '';
                $request['presenter_role'] = '';
            }

            $kurac = User::where('email', '=', $request->email)->first();
            if($kurac){
                return $this->jsonError('1500', __('Odabrani email već postoji :D'));
            }

            /* Add username to request */
            $request['username'] = $this->getSlug($request->name);

            /* Hash password and add token */
            $request['password'] = Hash::make(md5(time()));
            $request['api_token'] = hash('sha256', 'root'. '+'. time());
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');

            /* Update user */
            $user = User::create($request->except(['id']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.users.preview', ['username' => $user->username]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }

    public function preview ($username): View{
        return view($this->_path . 'create', [
            'preview' => true,
            'user' => User::where('username', '=', $username)->first(),
            'countries' => Country::pluck('name_ba', 'id')
        ]);
    }
    public function edit ($username): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'user' => User::where('username', '=', $username)->first(),
            'countries' => Country::pluck('name_ba', 'id')
        ]);
    }
    public function update(Request $request): JsonResponse{
        try{
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
            $user = User::where('id', '=', $request->id)->first();

            if($request->role != 'presenter'){
                $request['title'] = '';
                $request['institution'] = '';
                $request['presenter_role'] = '';
            }

            /* Update user */
            $user->update($request->except(['id']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.users.preview', ['username' => $user->username]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }

    public function updateProfileImage (Request $request): RedirectResponse{
        try{
            $file = $request->file('photo_uri');
            $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
            $name = md5($file->getClientOriginalName().time()).'.'.$ext;
            $file->move(public_path('files/images/public-part/users'), $name);

            /* Update file name */
            User::where('id', '=', $request->id)->update(['photo_uri' => $name]);

        }catch (\Exception $e){}

        return back();
    }

    /**
     * Generate new password to presenter and send via an email;
     * This is used only for presenter
     *
     * @param $username
     * @return RedirectResponse
     */
    public function generateNewPassword  ($username): RedirectResponse{
        try{
            $user = User::where('username', '=', $username)->first();
            $password = $this->generateRandomPassword();

            $user->update(['password' => Hash::make($password)]);

            Mail::to($user->email)->send(new GeneratePresenterPassword($user->name, $user->email, $password));
        }catch (\Exception $e){
            return redirect()->back()->with('error', __('Greška. Molimo da kontaktirate administratore'));
        }
        return redirect()->back()->with('success', __('Šifra uspješno generisana i poslana putem email-a!!'));
    }
}
