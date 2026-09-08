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
    public function home($year): View{
        return view($this->_path . 'home', [
            'year' => $year
        ]);
    }

    /**
     * Archive of critical thinking
     *
     * @return View
     */
    public function criticalThinking($year): View{
        $season = 1;
        if($year == 2025) $season = 2;
        else if($year == 2026) $season = 3;

        return view('public-part.app.archive.critical-thinking.home', [
            'posts' => Blog::whereHas('seasonRel', function ($q) use ($season) {
                $q->where('id', '=', $season);
            })->where('published', '=', 1)->where('category', '=', -2)->orderBy('id', 'DESC')->take(30)->get(),
            'showAll' => true,
            'criticalThinking' => true,
            'page' => SinglePage::where('id', 8)->first(),
            'year' => $year
        ]);
    }

    /**
     * Preview single element of critical thinking in archive
     *
     * @param $id
     * @return View
     */
    public function criticalThinkingPreview($year, $id): View{
        $post = Blog::where('id', '=', $id)->first();

        $season = 1;
        if($year == 2025) $season = 2;
        else if($year == 2026) $season = 3;

        return view('public-part.app.archive.critical-thinking.preview', [
            'post' => $post,
            'blogPosts' => Blog::whereHas('seasonRel', function ($q) use ($season){
                $q->where('id', '=', $season);
            })->where('published', '=', 1)->where('category', '=', -2)->where('id', '!=', $post->id)->orderBy('id', 'DESC')->take(6)->get(),
            'showAll' => true,
            'criticalThinking' => true,
            'archive' => true,
            'year' => $year
        ]);
    }

    /**
     * Preview archive gallery
     *
     * @return View
     */
    public function gallery($year): View{
        $season_id = 1;
        if($year == 2025) $season_id = 2;
        else if($year == 2026) $season_id = 3;

        return view($this->_path . 'gallery', [
            'images' => Gallery::where('season_id', '=', $season_id)->orderBy('id', 'desc')->take(9)->get(),
            'year' => $year
        ]);
    }

    /**
     * Load more images from gallery
     * @param Request $request
     * @return bool|string
     */
    public function loadMoreImages(Request $request): bool|string{
        try{
            $year = (int)$request->get('year');
            $season_id = 1;
            if($year == 2025) $season_id = 2;
            else if($year == 2026) $season_id = 3;

            $last = Gallery::where('season_id', '=', $season_id)->orderBy('id', 'ASC')->first();
            $images = Gallery::where('season_id', '=', $season_id)->where('id', '<', $request->lastID)->orderBy('id', 'desc')->take(6)->get();
            $isLast = false;

            foreach ($images as $image) {
                if($image->id == $last->id) $isLast = true;
            }

            if(!$images->count()) $isLast = true;

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
            $year = (int)$request->get('year');
            $season_id = 1;
            if($year == 2025) $season_id = 2;
            else if($year == 2026) $season_id = 3;

            $previous = Gallery::where('season_id', '=', $season_id)->where('id', '>', $request->attrID)->orderBy('id', 'asc')->first();
            $image    = Gallery::where('season_id', '=', $season_id)->where('id', '=', $request->attrID)->first();
            $next     = Gallery::where('season_id', '=', $season_id)->where('id', '<', $request->attrID)->orderBy('id', 'desc')->first();

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
