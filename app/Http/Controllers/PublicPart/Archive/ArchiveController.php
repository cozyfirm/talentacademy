<?php

namespace App\Http\Controllers\PublicPart\Archive;

use App\Http\Controllers\Controller;
use App\Models\Archive\Gallery;
use App\Models\Other\Blog\Blog;
use App\Models\Other\SinglePage;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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

    /**
     * Preview archive gallery
     *
     * @return View
     */
    public function gallery(): View{
        return view($this->_path . 'gallery', [
            'images' => Gallery::orderBy('id', 'desc')->take(3)->get()
        ]);
    }

    /**
     * Load more images from gallery
     * @param Request $request
     * @return bool|string
     */
    public function loadMoreImages(Request $request): bool|string{
        try{
            $last = Gallery::orderBy('id', 'ASC')->first();
            $images = Gallery::where('id', '<', $request->lastID)->orderBy('id', 'desc')->take(3)->get();
            $isLast = false;

            foreach ($images as $image) {
                if($image->id == $last->id) $isLast = true;
            }

            return $this->jsonResponse('0000', 'Success', [
                'images' => $images,
                'isLast' => $isLast
            ]);
        }catch (\Exception $e){}
    }

    /**
     * Fetch single image
     * @param Request $request
     * @return bool|string
     */
    public function fetchImage(Request $request): bool|string{
        try{
            $previous = Gallery::where('id', '>', $request->attrID)->orderBy('id', 'asc')->first();
            $image    = Gallery::where('id', '=', $request->attrID)->first();
            $next     = Gallery::where('id', '<', $request->attrID)->orderBy('id', 'desc')->first();

            if(!$previous){
                $previous = Gallery::orderBy('id', 'asc')->first();
            }
            if(!$next){
                $next = Gallery::orderBy('id', 'desc')->first();
            }

            return $this->jsonResponse('0000', 'Success', [
                'previous' => $previous,
                'image' => $image,
                'next' => $next
            ]);
        }catch (\Exception $e){ }
    }
}
