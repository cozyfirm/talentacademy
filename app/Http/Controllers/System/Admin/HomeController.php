<?php

namespace App\Http\Controllers\System\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        dump(Carbon::now() > Carbon::parse('2024-06-04 06:00:00'), Carbon::now(), Carbon::parse('2024-06-04 06:00:00') );

        return view('admin.home');
    }
}
