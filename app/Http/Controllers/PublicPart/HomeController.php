<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Blog\Blog;
use App\Models\Other\FAQ;
use App\Models\Other\Location;
use App\Models\Other\SinglePage;
use App\Models\User;
use App\Traits\Common\CommonTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller{
    use CommonTrait;
    protected string $_path = 'public-part.app.home.';

    public function home(): View{
        $daysTil = Carbon::now()->diffInDays(Carbon::parse($this->getSeasonData('app_date') . ' 23:59:59'));

        if($this->appTimePassed()){
            $daysTil = Carbon::now()->diffInDays(Carbon::parse($this->getSeasonData('start_date') . ' 08:00:00'));
        }
        if($daysTil < 0) $daysTil = 0;

        if(Auth::check()){
            $locations = Location::where('active', '=', 1)->inRandomOrder()->take(6)->get();
        }else{
            $locations = Location::where('active', '=', 1)->where('public', '=', 1)->inRandomOrder()->take(6)->get();
        }

        return view($this->_path . 'home', [
            'blogPosts' => Blog::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('published', '=', 1)->where('category', '>=', 0)->where('category', '<', 6)->orderBy('id', 'DESC')->take(6)->get(),
            'locations' => $locations,
            'faqs' => FAQ::where('what', 0)->get(),
            'lecturers' => User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('role', 'presenter')->inRandomOrder()->take(4)->get(),
            'daysTill' => $daysTil
        ]);
    }
    public function scholarship(): View{
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 1)->first()
        ]);
    }
    public function aboutUs(): View{
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 2)->first()
        ]);
    }
    public function howToApply(): View{
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 3)->first()
        ]);
    }
    public function hotToReachUs(): View{
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 4)->first()
        ]);
    }
    public function privacy(): View{
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 5)->first()
        ]);
    }
    public function terms(): View{
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 6)->first()
        ]);
    }
    public function cookies(): View{
        return view($this->_path . 'single-page', [
            'page' => SinglePage::where('id', 7)->first()
        ]);
    }
    public function criticalThinking(): View{
        // $last = Blog::where('published', '=', 1)->where('category', '=', 6)->orderBy('id', 'desc')->first();

        return view('public-part.app.blog.blog', [
            'posts' => Blog::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('published', '=', 1)->where('category', '=', -2)->orderBy('id', 'DESC')->take(30)->get(),
            'showAll' => true,
            'criticalThinking' => true,
            'page' => SinglePage::where('id', 8)->first()
        ]);
    }
    public function criticalThinkingPreview($id): View{
        $post = Blog::where('id', '=', $id)->first();

        return view('public-part.app.blog.single-blog', [
            'post' => $post,
            'blogPosts' => Blog::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('published', '=', 1)->where('category', '=', -2)->where('id', '!=', $post->id)->orderBy('id', 'DESC')->take(6)->get(),
            'showAll' => true,
            'criticalThinking' => true,
        ]);
    }
}
