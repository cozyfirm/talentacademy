<?php

namespace App\Http\Controllers\System\Admin\Other;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Models\Core\Country;
use App\Models\Other\Location;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationsController extends Controller{
    use UserBaseTrait, ResponseTrait;
    protected string $_path = 'admin.other.locations.';

    public function index (){
        $locations = Location::where('id', '>', 0);
        $locations = Filters::filter($locations);

        $filters = [
            'title' => __('Naziv'),
            'address' => __('Adresa'),
            'city' => __('Grad'),
            'countryRel->name_ba' => __('Država'),
            'location' => __('Lokacija')
        ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'locations' => $locations
        ]);
    }

    public function create (): View{
        return view($this->_path . 'create', [
            'create' => true,
            'countries' => Country::pluck('name_ba', 'id')
        ]);
    }
    public function save(Request $request){
        try{
            $location = Location::create($request->all());

            return $this->jsonSuccess(__('Uspješno ste unijeli lokaciju!'), route('system.admin.locations.preview', ['id' => $location->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function preview ($id): View{
        return view($this->_path . 'create', [
            'preview' => true,
            'countries' => Country::pluck('name_ba', 'id'),
            'location' => Location::where('id', $id)->first()
        ]);
    }
    public function edit ($id): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'countries' => Country::pluck('name_ba', 'id'),
            'location' => Location::where('id', $id)->first()
        ]);
    }
    public function update(Request $request){
        try{
            Location::where('id', $request->id)->update($request->except(['id', '_token', 'undefined', 'files']));

            return $this->jsonSuccess(__('Uspješno ste unijeli lokaciju!'), route('system.admin.locations.preview', ['id' => $request->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function delete($id){
        try{
            $location = Location::where('id', $id)->first();
            $name = $location->title;
            $location->delete();

            return redirect()->route('system.admin.locations')->with('success', __('Uspješno obrisana lokacija ' . $name . "!"));
        }catch (\Exception $e){
            return redirect()->route('system.admin.locations')->with('error', __('Desila se greška!'));
        }
    }

    public function changeImage($id, $what): View{
        if($what == 'map_img') $title = 'Map Image';
        else if($what == 'main_img') $title = 'Main Image';
        else if($what == 'cover_img') $title = 'Cover Image';

        return view($this->_path . 'change-image', [
            'location' => Location::where('id', $id)->first(),
            'what' => $what,
            'title' => $title,
            'id' => $id
        ]);
    }
    public function updateImage (Request $request){
        try{
            $file = $request->file('photo_uri');
            $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
            $name = md5($file->getClientOriginalName().time()).'.'.$ext;
            $file->move(public_path('files/images/public-part/locations'), $name);

            Location::where('id', $request->id)->update([$request->what => $name]);

            return redirect()->route('system.admin.locations.preview', ['id' => $request->id ])->with('success', __('Uspješno spašena fotografija!'));
        }catch (\Exception $e){ }
    }
}
