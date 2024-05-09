<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Blog\Blog;
use App\Models\Other\FAQ;
use App\Models\Other\Location;
use App\Models\Other\SinglePage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller{
    protected string $_path = 'public-part.app.home.';

    public function home(): View{
        return view($this->_path . 'home', [
            'blogPosts' => Blog::orderBy('id', 'DESC')->take(6)->get(),
            'locations' => Location::inRandomOrder()->take(6)->get(),
            'faqs' => FAQ::where('what', 0)->get(),
            'lecturers' => User::where('role', 'presenter')->inRandomOrder()->take(4)->get()
        ]);
    }
    public function scholarship (){
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 1)->first()
        ]);
    }
    public function aboutUs (){
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 2)->first()
        ]);
    }
    public function howToApply (){
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 3)->first()
        ]);
    }
    public function hotToReachUs (){
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 4)->first()
        ]);
    }
    public function privacy (){
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 5)->first()
        ]);
    }
    public function terms (){
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 6)->first()
        ]);
    }
    public function cookies (){
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 7)->first()
        ]);
    }
}
