<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller{
    protected $_path = 'public-part.auth.';

    public function auth(){
        return view($this->_path. 'auth');
    }
}
