<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Programs\Program;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgramsController extends Controller{
    protected string $_path = 'public-part.app.programs.';

    public function preview($id): View{
        return view($this->_path . 'preview', [
            'program' => Program::where('id', $id)->first()
        ]);
    }
}
