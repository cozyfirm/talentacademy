<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LocationsController extends Controller{
    protected string $_path = 'public-part.app.locations.';

    public function locations(): View{
        if(Auth::check()){
            $locations = Location::get();
        }else{
            $locations = Location::where('public', '=', 1)->get();
        }
        return view($this->_path . 'locations', [
            'locations' => $locations
        ]);
    }

    public function single_location($id): View{
        if(Auth::check()){
            $locations = Location::inRandomOrder()->take(6)->get();
        }else{
            $locations = Location::where('public', '=', 1)->inRandomOrder()->take(6)->get();
        }

        return view($this->_path . 'single-location', [
            'location' => Location::where('id', '=', $id)->where('public', '=', 1)->first(),
            'similarLocations' => $locations
        ]);
    }
}
