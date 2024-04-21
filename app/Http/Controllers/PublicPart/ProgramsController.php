<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Blog\Blog;
use App\Models\Programs\Program;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgramsController extends Controller{
    protected string $_path = 'public-part.app.programs.';

    public function preview($id): View{
        return view($this->_path . 'preview', [
            'program' => Program::where('id', $id)->first(),
            'blogPosts' => Blog::orderBy('id', 'DESC')->take(6)->get()
        ]);
    }

    public function preview_session($id): View{
        return view($this->_path . 'preview-session', [
            'program' => Program::where('id', $id)->first(),
            'blogPosts' => Blog::orderBy('id', 'DESC')->take(6)->get()
        ]);
    }
}
