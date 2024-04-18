<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\SinglePage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller{
    protected string $_path = 'public-part.app.home.';

    public function home(): View{
        return view($this->_path . 'home');
    }
    public function scholarship (){
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 1)->first()
        ]);
    }
}
