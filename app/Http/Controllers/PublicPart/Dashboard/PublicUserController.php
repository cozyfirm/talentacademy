<?php

namespace App\Http\Controllers\PublicPart\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Models\Core\Country;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicUserController extends Controller{
    use UserBaseTrait, ResponseTrait;
    protected string $_path = 'public-part.dashboard.';

    /**
     *  Preview and update my profile
     */
    public function myProfile(){
        return view($this->_path . 'my-profile', [
            'countries' => Country::orderBy('name_ba')->get()->pluck('name_ba', 'id'),
        ]);
    }
    public function updateProfile (Request $request){
        try{
            Auth::user()->update($request->all());
            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('dashboard.my-profile'));
        }catch (\Exception $e){
            return $this->jsonResponse('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function updateProfileImage (Request $request){
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

    /**
     *  Sign out and redirect to homepage
     */
    public function signOut(){
        Auth::logout();

        return redirect()->route('public-part.home');
    }
}
