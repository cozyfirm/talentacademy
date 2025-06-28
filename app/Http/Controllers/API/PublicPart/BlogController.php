<?php

namespace App\Http\Controllers\API\PublicPart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Other\Blog\Blog;
use App\Models\Other\Location;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller{
    use ResponseTrait, LogTrait;

    /* Number of samples returned with query */
    protected int $_number_of_samples = 10;

    /**
     * Fetch all news
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request): JsonResponse{
        try{
            if(isset($request->number)) $this->_number_of_samples = $request->number;

            $news = Blog::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('published', '=', 1)->where('category', '>=', '-1')->where('category', '<', 6)->orderBy('id', 'DESC')
                ->with('mainImg:id,file,name,ext')
                ->with('imgOne:id,file,name,ext')
                ->select('id', 'title', 'short_desc', 'category', 'published', 'main_img', 'img_one', 'img_two');
            $news = Filters::filter($news, $this->_number_of_samples);

            return $this->apiResponse('0000', 'Success', [
                'news' => $news->toArray()
            ]);
        }catch (\Exception $e) {
            $this->write('API: LocationsController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5320', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Preview single location; Fetch full data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function preview(Request $request): JsonResponse{
        try{
            if(!isset($request->id)) return $this->apiResponse('5331', __('Odabrani post nije pronađen'));

            $post = Blog::where('id', '=', $request->id)
                ->with('mainImg:id,file,name,ext')
                ->with('imgOne:id,file,name,ext')
                ->first(['id', 'title', 'short_desc', 'description', 'category', 'published', 'main_img', 'img_one', 'img_two']);

            return $this->apiResponse('0000', 'Success', [
                'post' => $post->toArray()
            ]);
        }catch (\Exception $e) {
            $this->write('API: LocationsController::preview()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5330', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
