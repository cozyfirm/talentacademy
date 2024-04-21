<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Programs\Program;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class LecturersController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.app.lecturers.';
    protected int $_take = 6;

    public function getData($lecturers, int $program_id = 0): View{
        return view($this->_path . 'lecturers', [
            'lecturers' => $lecturers,
            'lecPrograms' => Program::where('id', '>', 0)->where('id', '<=', 5)->get(),
            'program_id' => $program_id
        ]);
    }
    public function lecturers(): View{
        $lecturers = User::where('role', 'presenter')->orderBy('id', 'ASC')->take($this->_take)->get();
        return $this->getData($lecturers);
    }
    public function filter ($program_id): View{
        $lecturers = User::whereHas('sessionsRel.programRel', function ($query) use($program_id){
            $query->where('id', $program_id);
        })->where('role', 'presenter')->orderBy('id', 'ASC')->take($this->_take)->get();
        return $this->getData($lecturers, $program_id);
    }

    public function single_lecturer(): View{
        return view($this->_path . 'single-lecturer');
    }

    /**
     *  Load more
     */
    public function loadMore(Request $request): bool|string{
        try{
            if($request->program_id == 0){
                $lecturers = User::where('role', 'presenter')
                    ->where('id', '>', $request->lastID)
                    ->orderBy('id', 'ASC')
                    ->take($this->_take)
                    ->get();
            }else{
                $lecturers = User::whereHas('sessionsRel.programRel', function ($query) use($request){
                    $query->where('id', $request->program_id);
                })->where('role', 'presenter')->where('id', '>', $request->lastID)->orderBy('id', 'ASC')->take($this->_take)->get();
            }

            return $this->jsonResponse('0000', __(''), ['lecturers' => $lecturers->toArray()]);
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Desila se greška'));
        }
    }
    public function filterByName(Request $request){
        try{
            if($request->program_id == 0){
                $lecturers = User::where('role', 'presenter')
                    ->where('name', 'LIKE', '%'. $request->value . '%')
                    ->orderBy('id', 'ASC')
                    ->take($this->_take)
                    ->get();
            }else{
                $lecturers = User::whereHas('sessionsRel.programRel', function ($query) use($request){
                    $query->where('id', $request->program_id);
                })->where('name', 'LIKE', '%'. $request->value . '%')->where('role', 'presenter')->orderBy('id', 'ASC')->take($this->_take)->get();
            }

            return $this->jsonResponse('0000', __(''), ['lecturers' => $lecturers->toArray()]);
        }catch (\Exception $e){
            dd($e);
            return $this->jsonResponse('1200', __('Desila se greška!'));
        }
    }
}
