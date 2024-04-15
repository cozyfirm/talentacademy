<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LecturersController extends Controller
{
    protected string $_path = 'public-part.app.lecturers.';

    public function lecturers(): View{
        return view($this->_path . 'lecturers');
    }

    public function single_lecturer(): View{
        return view($this->_path . 'single-lecturer');
    }
}
