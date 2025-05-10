<?php

namespace App\Http\Controllers\PublicPart\Archive;

use App\Http\Controllers\Controller;
use App\Models\Other\Blog\Blog;
use App\Models\Other\SinglePage;
use App\Traits\Http\ResponseTrait;
use Illuminate\View\View;

class ArchiveController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.app.archive.';

    /**
     * Get archive dashboard
     *
     * @return View
     */
    public function home(): View{
        return view($this->_path . 'home');
    }

    /**
     * Archive of critical thinking
     *
     * @return View
     */
    public function criticalThinking(): View{
        return view('public-part.app.blog.blog', [
            'posts' => Blog::whereHas('seasonRel', function ($q){
                $q->where('id', '=', 1);
            })->where('published', '=', 1)->where('category', '=', -2)->orderBy('id', 'DESC')->take(30)->get(),
            'showAll' => true,
            'criticalThinking' => true,
            'page' => SinglePage::where('id', 8)->first()
        ]);
    }

    /**
     * Preview single element of critical thinking in archive
     *
     * @param $id
     * @return View
     */
    public function criticalThinkingPreview($id): View{
        $post = Blog::where('id', '=', $id)->first();

        return view('public-part.app.blog.single-blog', [
            'post' => $post,
            'blogPosts' => Blog::whereHas('seasonRel', function ($q){
                $q->where('id', '=', 1);
            })->where('published', '=', 1)->where('category', '=', -2)->where('id', '!=', $post->id)->orderBy('id', 'DESC')->take(6)->get(),
            'showAll' => true,
            'criticalThinking' => true,
        ]);
    }
}
