<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Blog\Blog;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramSession;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgramsController extends Controller{
    protected string $_path = 'public-part.app.programs.';

    public function getSessionsByDate($program_id, $date){
        return ProgramSession::where('program_id', $program_id)->whereDate('date', $date)->get();
    }
    public function preview($id, $date = null): View{
        if($date){
            $currentDay = ProgramSession::where('program_id', $id)->whereDate('date', $date)->orderBy('date')->first();
        }else $currentDay = ProgramSession::where('program_id', $id)->orderBy('date')->first();

        return view($this->_path . 'preview', [
            'program' => Program::where('id', $id)->first(),
            'blogPosts' => Blog::orderBy('id', 'DESC')->take(6)->get(),
            'currentDay' => $currentDay,
            'sessions' => $this->getSessionsByDate($id, $date ?? $currentDay->date)
        ]);
    }

    public function preview_session($id): View{
        return view($this->_path . 'preview-session', [
            'program' => Program::where('id', $id)->first(),
            'blogPosts' => Blog::orderBy('id', 'DESC')->take(6)->get()
        ]);
    }
}
