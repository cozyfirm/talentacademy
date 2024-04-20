<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class BlogController extends Controller
{
    protected string $_path = 'public-part.app.blog.';

    public function blog(): View{
        return view($this->_path . 'blog');
    }

    public function single_blog(): View{
        return view($this->_path . 'single-blog');
    }
}
