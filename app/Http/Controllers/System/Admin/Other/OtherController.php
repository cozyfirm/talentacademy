<?php

namespace App\Http\Controllers\System\Admin\Other;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Other\SinglePage;
use App\Traits\Common\CommonTrait;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OtherController extends Controller{
    use UserBaseTrait, ResponseTrait, FileTrait;
    protected string $_path = 'admin.other.';

    /**
     *  Single pages CRUD
     */
    public function index (): View{
        $pages = SinglePage::where('id', '>', 0);
        $pages = Filters::filter($pages);
        $filters = [ 'title' => __('Naziv') ];

        return view($this->_path . 'pages.index', [
            'filters' => $filters,
            'pages' => $pages
        ]);
    }
    public function edit($id){
        return view($this->_path . 'pages.create', [
            'page' => SinglePage::where('id', $id)->first(),
            'edit' => true
        ]);
    }
    public function update(Request $request): JsonResponse{
        try{
            SinglePage::where('id', $request->id)->update($request->except(['id']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.pages.edit', ['id' => $request->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function updateImage  (Request $request) : RedirectResponse{
        try{
            $request['path'] = ('files/images/single-pages/');
            $file = $this->saveFile($request, 'photo_uri', 'program_file');

            SinglePage::where('id', $request->page_id)->update(['image_id' => $file->id]);
            return redirect()->back()->with('success', __('Uspješno ažurirana fotografija!'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', __('Desila se greška!'));
        }
    }
}
