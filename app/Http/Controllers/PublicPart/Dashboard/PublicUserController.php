<?php

namespace App\Http\Controllers\PublicPart\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Models\Core\Country;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramSession;
use App\Traits\Common\CommonTrait;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use MongoDB\Driver\Session;

class PublicUserController extends Controller{
    use UserBaseTrait, ResponseTrait, FileTrait, CommonTrait;
    protected string $_path = 'public-part.dashboard.';

    /**
     *  Preview and update my profile
     */
    public function myProfile(): View{
        return view($this->_path . 'my-profile', [
            'countries' => Country::orderBy('name_ba')->get()->pluck('name_ba', 'id'),
        ]);
    }
    public function updateProfile (Request $request): JsonResponse{
        try{
            /* When updating password */
            if(isset($request->email)){
                if(empty($request->password)) return $this->jsonError('1501', __('Lozinka ne može biti prazna!'));
                if($request->password != $request->password_w) return $this->jsonError('1502', __('Lozinke se ne podudaraju!'));
                $request['password'] = Hash::make($request->password);
            }
            Auth::user()->update($request->all());

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('dashboard.my-profile'));
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
            Auth::user()->update(['photo_uri' => $name]);

            return redirect()->route('dashboard.my-profile');
        }catch (\Exception $e){
            return back();
        }
    }
    public function editLinks($link): View{
        if($link == 'instagram') $value = Auth::user()->instagram;
        else if($link == 'facebook') $value = Auth::user()->facebook;
        else if($link == 'twitter') $value = Auth::user()->twitter;
        else$value = Auth::user()->web;

        return view($this->_path . 'edit-links', [
            'link' => ucfirst($link),
            'value' => $value
        ]);
    }
    public function changePassword (): View{
        return view($this->_path . 'change-password', []);
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Presenter routes
     */
    public function previewSessions (){
        /* Redirect if not presenter */
        if(Auth::user()->role != 'presenter') return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'presenter.preview-sessions', [
            'sessions' => ProgramSession::where('presenter_id', Auth::user()->id)->get()
        ]);
    }
    public function previewSession ($id){
        $session = ProgramSession::where('id', $id)->first();
        /* Redirect if not presenter */
        if(Auth::user()->role != 'presenter' or $session->presenter_id != Auth::user()->id) return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'presenter.preview-session', [
            'session' => $session
        ]);
    }
    public function updateSessions(Request $request): JsonResponse{
        try{
            $session = ProgramSession::where('id', $request->id)->first();
            if(Auth::user()->role != 'presenter' or $session->presenter_id != Auth::user()->id)  return $this->jsonError('1500', __('Nemate ovlaštenje za pristup!'));

            $session->update(['presenter_data' => $request->presenter_data]);

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('dashboard.preview-session', ['id' => $request->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  User routes
     */
    public function applyForScholarship (){
        /* Redirect if not presenter */
        if(Auth::user()->role != 'user') return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'user.apply-for-scholarship', [
            'programs' => Program::where('id', '<', 6)->get()
        ]);
    }


    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Sign out and redirect to homepage
     */
    public function signOut(): RedirectResponse{
        Auth::logout();

        return redirect()->route('public-part.home');
    }
}
