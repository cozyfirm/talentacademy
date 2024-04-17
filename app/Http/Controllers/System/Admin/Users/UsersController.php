<?php

namespace App\Http\Controllers\System\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Models\Core\Country;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
            'institution' => __('Institucija')
        ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'users' => $users
        ]);
    }
    public function preview ($username): View{
        return view($this->_path . 'create', [
            'preview' => true,
            'user' => User::where('username', $username)->first(),
            'countries' => Country::pluck('name_ba', 'id')
        ]);
    }
    public function edit ($username): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'user' => User::where('username', $username)->first(),
            'countries' => Country::pluck('name_ba', 'id')
        ]);
    }
    public function update(Request $request){
        try{
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');
            $user = User::where('id', $request->id)->first();

            if($request->role != 'teacher'){
                $request['title'] = '';
                $request['institution'] = '';
            }

            /* Update user */
            $user->update($request->except(['id']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.users.preview', ['username' => $user->username]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
}
