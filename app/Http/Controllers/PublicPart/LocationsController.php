<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Location;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationsController extends Controller{
    protected string $_path = 'public-part.app.locations.';

    public function locations(): View{
        return view($this->_path . 'locations', [
            'locations' => Location::get()
        ]);
    }

    public function single_location($id): View{
        return view($this->_path . 'single-location', [
            'location' => Location::where('id', '=', $id)->first(),
            'similarLocations' => Location::inRandomOrder()->take(6)->get()
        ]);
    }
}
