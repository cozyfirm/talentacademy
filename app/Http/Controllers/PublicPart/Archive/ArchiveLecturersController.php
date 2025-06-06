<?php

namespace App\Http\Controllers\PublicPart\Archive;

use App\Http\Controllers\Controller;
use App\Models\Other\Blog\Blog;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramSession;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;

class ArchiveLecturersController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.app.archive.lecturers.';
    protected int $_take = 6;
    protected int $_pages = 6;

    public function getData($lecturers, int $program_id = 0): View{
        return view('public-part.app.lecturers.lecturers', [
            'lecturers' => $lecturers,
            'lecPrograms' => Program::whereHas('seasonRel', function ($q){
                $q->where('id', '=', 1);
            })->get(),
            'program_id' => $program_id,
            'archive' => true
        ]);
    }
    public function lecturers(): View{
        $lecturers = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
            $q->where('id', '=', 1);
        })->where('role', 'presenter')->orderBy('id', 'DESC')->take($this->_take)->get();
        return $this->getData($lecturers);
    }
    public function filter ($program_id): View | RedirectResponse{
        /**
         *  Get only lecturers from active season; User can be in two different seasons
         */
        $lecturers = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
            $q->where('id', '=', 1);
        })->whereHas('sessionsPresenterRel.sessionRel.programRel', function ($query) use($program_id){
            $query->where('id', $program_id);
        })->where('role', 'presenter')->orderBy('id', 'DESC')->take($this->_take)->get();
        return $this->getData($lecturers, $program_id);
    }

    public function single_lecturer($id, $page = 1): View | RedirectResponse{
        $lecturer = User::where('id', $id)->first();
        if($lecturer->role != 'presenter') return redirect()->route('public-part.archive');

        // Make sure that you call the static method currentPageResolver()
        // before querying users
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $offlineSessions = ProgramSession::whereHas('presentersRel', function ($q) use($id){
            $q->where('presenter_id', '=', $id);
        })->whereHas('programRel.seasonRel', function ($q){
            $q->where('id', '=', 1);
        })->paginate($this->_pages);

        foreach ($offlineSessions as $session){
            $program = Program::where('id', $session->programRel->id)->first();
            break;
        }

        if(!isset($program)) return redirect()->route('public-part.archive');

        return view($this->_path . 'preview', [
            'blogPosts' => Blog::orderBy('id', 'DESC')->take(6)->get(),
            'offlineSessions' => $offlineSessions,
            'lecturer' => $lecturer,
            'program' => $program,
            'page' => $page
        ]);
    }

    /**
     *  Load more
     */
    public function loadMore(Request $request): bool|string{
        try{
            if($request->program_id == 0){
                $lecturers = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
                    $q->where('id', '=', 1);
                })->where('role', 'presenter')
                    ->where('id', '<', $request->lastID)
                    ->orderBy('id', 'DESC')
                    ->take($this->_take)
                    ->get();
            }else{
                $lecturers = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
                    $q->where('id', '=', 1);
                })->whereHas('sessionsPresenterRel.sessionRel.programRel', function ($query) use($request){
                    $query->where('id', $request->program_id);
                })->where('role', 'presenter')->where('id', '<', $request->lastID)->orderBy('id', 'DESC')->take($this->_take)->get();
            }

            return $this->jsonResponse('0000', __(''), ['lecturers' => $lecturers->toArray()]);
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Desila se greška'));
        }
    }
    public function filterByName(Request $request){
        try{
            if($request->program_id == 0){
                $lecturers = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
                    $q->where('id', '=', 1);
                })->where('role', 'presenter')
                    ->where('name', 'LIKE', '%'. $request->value . '%')
                    ->orderBy('id', 'ASC')
                    ->take($this->_take)
                    ->get();
            }else{
                $lecturers = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
                    $q->where('id', '=', 1);
                })->whereHas('sessionsPresenterRel.sessionRel.programRel', function ($query) use($request){
                    $query->where('id', $request->program_id);
                })->where('name', 'LIKE', '%'. $request->value . '%')->where('role', 'presenter')->orderBy('id', 'DESC')->take($this->_take)->get();
            }

            return $this->jsonResponse('0000', __(''), ['lecturers' => $lecturers->toArray()]);
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Desila se greška!'));
        }
    }
}
