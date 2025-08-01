<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Blog\Blog;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramSession;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class LecturersController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.app.lecturers.';
    protected int $_take = 6;
    protected int $_pages = 6;

    public function getData($lecturers, int $program_id = 0): View{
        return view($this->_path . 'lecturers', [
            'lecturers' => $lecturers,
            'lecPrograms' => Program::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->get(),
            'program_id' => $program_id
        ]);
    }
    public function lecturers(): View{
        $lecturers = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
            $q->where('active', '=', 1);
        })->where('role', 'presenter')->orderBy('id', 'DESC')->take($this->_take)->get();
        return $this->getData($lecturers);
    }
    public function filter ($program_id): View | RedirectResponse{
        /**
         *  If program is not active, redirect to Lecturers home
         */
        $program = Program::whereHas('seasonRel', function ($q){
            $q->where('active', '=', 1);
        })->where('id', '=', $program_id)->first();
        if(!isset($program)) return redirect()->route('public-part.lecturers.lecturers');

        /**
         *  Get only lecturers from active season; User can be in two different seasons
         */
        $lecturers = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
            $q->where('active', '=', 1);
        })->whereHas('sessionsPresenterRel.sessionRel.programRel', function ($query) use($program_id){
            $query->where('id', $program_id);
        })->where('role', 'presenter')->orderBy('id', 'DESC')->take($this->_take)->get();
        return $this->getData($lecturers, $program_id);
    }

    public function single_lecturer($id, $date = null): View | RedirectResponse{
        $lecturer = User::where('id', $id)->first();
        if($lecturer->role != 'presenter') return redirect()->route('public-part.lecturers.lecturers');

        /**
         *  Show lecturer info only for active users or lecturers
         */

        /* Always redirect */
        // return redirect()->route('public-part.lecturers.single-lecturer.sneak-and-peek', ['id' => $id, 'page' => 1]);

        if(!Auth::check()) return redirect()->route('public-part.lecturers.single-lecturer.sneak-and-peek', ['id' => $id, 'page' => 1]);
        // else{
        //     /* ToDo : Uncomment this one */
        //     if(Auth::user()->role != 'presenter' or Auth::user()->role != 'admin'){
        //         if(!Auth::user()->hasAcceptedApp()) return redirect()->route('public-part.lecturers.single-lecturer.sneak-and-peek', ['id' => $id, 'page' => 1]);
        //     }
        // }

        /* ToDo:: Check if user is not at current active season, do not show it's data */

        if($date){
            $currentDay = ProgramSession::whereHas('presentersRel', function ($q) use($id){
                $q->where('presenter_id', '=', $id);
            })->whereHas('programRel.seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->whereDate('date', $date)->orderBy('date')->first();
        }else{
            $currentDay = ProgramSession::whereHas('presentersRel', function ($q) use($id){
                $q->where('presenter_id', '=', $id);
            })->whereHas('programRel.seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->orderBy('date')->first();
        }

        return view($this->_path . 'single-lecturer', [
            'program' => Program::where('id', $currentDay->program_id)->first(),
            'blogPosts' => Blog::orderBy('id', 'DESC')->take(6)->get(),
            'currentDay' => $currentDay,
            'sessions' => ProgramSession::whereHas('presentersRel', function ($q) use($id){
                $q->where('presenter_id', '=', $id);
            })->whereHas('programRel.seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('date', $currentDay->date)->orderBy('datetime_from')->get(),
            'lecturer' => $lecturer
        ]);
    }

    public function sneakAndPeak($id, $page = 1): View | RedirectResponse{
        $lecturer = User::where('id', '=', $id)->first();
        if($lecturer->role != 'presenter') return redirect()->route('public-part.lecturers.lecturers');

        // Make sure that you call the static method currentPageResolver()
        // before querying users
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $offlineSessions = ProgramSession::whereHas('presentersRel', function ($q) use($id){
            $q->where('presenter_id', '=', $id);
        })->whereHas('programRel.seasonRel', function ($q){
            $q->where('active', '=', 1);
        })->paginate($this->_pages);

        foreach ($offlineSessions as $session){
            $program = Program::where('id', $session->programRel->id)->first();
            break;
        }

        if(!isset($program)) return redirect()->route('public-part.lecturers.lecturers');

        return view($this->_path . 'single-lecturer', [
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
                    $q->where('active', '=', 1);
                })->where('role', 'presenter')
                    ->where('id', '<', $request->lastID)
                    ->orderBy('id', 'DESC')
                    ->take($this->_take)
                    ->get();
            }else{
                $lecturers = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
                    $q->where('active', '=', 1);
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
                    $q->where('active', '=', 1);
                })->where('role', 'presenter')
                    ->where('name', 'LIKE', '%'. $request->value . '%')
                    ->orderBy('id', 'ASC')
                    ->take($this->_take)
                    ->get();
            }else{
                $lecturers = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
                    $q->where('active', '=', 1);
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
