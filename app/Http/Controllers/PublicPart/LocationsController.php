<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationsController extends Controller{
    protected string $_path = 'public-part.app.locations.';

    public function locations(): View{
        return view($this->_path . 'locations');
    }

    public function single_location(): View{
        return view($this->_path . 'single-location');
    }
}
