<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Blog\Blog;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.app.blog.';

    public function blog(): View{
        $last = Blog::orderBy('id', 'desc')->first();
        return view($this->_path . 'blog', [
            'posts' => Blog::where('published', '=', 1)->where('id', '!=', $last->id)->orderBy('id', 'DESC')->take(3)->get(),
            'last' => $last
        ]);
    }

    public function single_blog(): View{
        return view($this->_path . 'single-blog');
    }
    public function preview($id): View{
        $post = Blog::where('id', $id)->first();
        return view($this->_path . 'single-blog', [
            'post' => $post,
            'blogPosts' => Blog::where('id', '!=', $post->id)->orderBy('id', 'DESC')->take(6)->get()
        ]);
    }
    public function loadMore(Request $request): bool|string{
        try{
            $posts = Blog::where('published', '=', 1)->where('id', '<', $request->lastID)->orderBy('id', 'DESC')->take(3)->get();
            foreach ($posts as $post){
                $post->img = $post->mainImg->getFile();
                $post->categoryVal = $post->getCategory();
                $post->createdAt = $post->getDate();
                $post->createdBy = $post->createdBy->name;
            }
            return $this->jsonResponse('0000', __(''), ['posts' => $posts->toArray()]);
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Desila se greška'));
        }
    }
}
