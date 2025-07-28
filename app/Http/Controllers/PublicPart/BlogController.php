<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Blog\Blog;
use App\Models\Other\Blog\BlogImage;
use App\Models\Other\SinglePage;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.app.blog.';

    public function blog(): View{
        $last = Blog::whereHas('seasonRel', function ($q){
            $q->where('active', '=', 1);
        })->where('published', '=', 1)->where('category', '!=', -1)->where('category', '!=', '-2')->where('category', '!=', '-3')->orderBy('id', 'desc')->first();

        return view($this->_path . 'blog', [
            'posts' => Blog::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('published', '=', 1)->where('category', '>=', '0')->where('category', '<', 6)->where('id', '!=', $last->id)->orderBy('id', 'DESC')->take(3)->get(),
            'last' => $last
        ]);
    }

    public function single_blog(): View{
        return view($this->_path . 'single-blog');
    }
    public function preview($id): View{
        $post = Blog::where('id', '=', $id)->first();
        return view($this->_path . 'single-blog', [
            'post' => $post,
            'blogPosts' => Blog::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('published', '=', 1)->where('category', '>=', '0')->where('id', '!=', $post->id)->orderBy('id', 'DESC')->take(6)->get()
        ]);
    }
    public function loadMore(Request $request): bool|string{
        try{
            $posts = Blog::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('published', '=', 1)->where('category', '!=', -1)->where('category', '!=', '-2')->where('category', '!=', '-3')->where('id', '<', $request->lastID)->orderBy('id', 'DESC')->take(3)->get();
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

    public function fetchImages(Request $request): string|bool {
        try{
            $current = BlogImage::where('id', '=', $request->attrID)->first();

            $previous = BlogImage::where('blog_id', '=', $request->blog_id)->where('id', '<', $request->attrID)->orderBy('id', 'desc')->first();
            $next     = BlogImage::where('blog_id', '=', $request->blog_id)->where('id', '>', $request->attrID)->orderBy('id', 'ASC')->first();

            return $this->jsonResponse('0000', __(''), [
                'next' => $next->id ?? '',
                'previous' => $previous->id ?? '',
                'current' => $current->fileRel->getFile()
            ]);
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Desila se greška'));
        }
    }

    /**
     * Homepage for alumni
     *
     * @return View
     */
    public function alumni(): View{
        return view('public-part.app.alumni.home', [
            'page' => SinglePage::where('id', 20)->first(),
            'posts' => Blog::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('published', '=', 1)->where('category', '=', '-3')->orderBy('id', 'DESC')->get(),
            'alumni' => true
        ]);
    }
    public function alumniPreview($id): View{
        $post = Blog::where('id', '=', $id)->first();
        return view($this->_path . 'single-blog', [
            'post' => $post,
            'blogPosts' => Blog::where('published', '=', 1)->where('category', '=', -3)->where('id', '!=', $post->id)->orderBy('id', 'DESC')->take(6)->get(),
            'alumni' => true
        ]);
    }
}
