<?php

namespace App\Http\Controllers\System\Admin\Archive;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Archive\Gallery;
use App\Models\Models\Core\Country;
use App\Models\Other\Location;
use App\Models\Programs\Season;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller{
    use UserBaseTrait, ResponseTrait;
    protected string $_path = 'admin.archive.gallery.';
    protected string $_img_path = 'files/archive/gallery';

    /**
     * Get all photos
     *
     * @return View
     */
    public function index (): View{
        $images = Gallery::where('id', '>', 0);
        $images = Filters::filter($images);

        $filters = [ 'seasonRel.title' => __('Sezona'), 'file' => __('Naziv') ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'images' => $images
        ]);
    }

    /**
     * Upload new photos
     *
     * @return View
     */
    public function create (): View{
        return view($this->_path . 'create', [
            'create' => true,
            'seasons' => Season::where('active', '=', 0)->pluck('title', 'id')
        ]);
    }

    /**
     * Save multiple images
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request): RedirectResponse{
        try{
            $counter = 0;
            if ($request->hasFile('photo')) {
                foreach ($request->file('photo') as $file){

                    $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
                    $name = md5($file->getClientOriginalName().time()).'.'.$ext;

                    $sizeInBytes = $file->getSize();             // bytes
                    $sizeInMb    = round($sizeInBytes / 1024 / 1024, 2); // e.g. 1.2

                    $file->move($this->_img_path, $name);
                    Gallery::create([
                        'season_id' => $request->season_id,
                        'file' => $file->getClientOriginalName(),
                        'name' => $name,
                        'ext' => $ext,
                        'path' => $this->_img_path,
                        'size' => $sizeInMb . " MB"
                    ]);

                    $counter ++;
                }
            }

            return back()->with('success', __('Uspješno spremljeno ' . $counter . '. fotografija/e'));
        }catch (\Exception $e){
            return back()->with('error', __('Greška: ') . $e->getMessage());
        }
    }

    public function delete($id): RedirectResponse{
        try{
            $image = Gallery::where('id', '=', $id)->first();

            try{
                unlink($image->path . '/' . $image->name);
            }catch (\Exception $e){}

            $image->delete();

            return back()->with('success', __('Uspješno obrisana fotografija !'));
        }catch (\Exception $e){
            return back()->with('error', __('Greška: ') . $e->getMessage());
        }
    }
}
