<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Blog\Blog;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramSession;
use App\Models\Programs\ProgramSessionNote;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProgramsController extends Controller{
    use ResponseTrait;
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
        $session = ProgramSession::where('id', $id)->first();
        $program = Program::where('id', $session->program_id)->first();
        return view($this->_path . 'preview-session', [
            'program' => $program,
            'session' => $session,
            'otherSessions' => ProgramSession::where('id', '!=', $id)->where('program_id', $program->id)->take(6)->get()
        ]);
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     * Session notes
     */
    public function saveSessionNote(Request $request): bool|string{
        try{
            $note = ProgramSessionNote::create([
                'attendee_id' => Auth::user()->id,
                'session_id' => $request->session_id,
                'note' => $request->note
            ]);

            $note->time = $note->time();

            return $this->jsonResponse('0000', __(''), ['note' => $note]);
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Desila se greška'));
        }
    }
    public function deleteSessionNote(Request $request): bool|string{
        try{
            $note = ProgramSessionNote::where('id', $request->id)->first();
            if($note->attendee_id == Auth::user()->id) $note->delete();

            return $this->jsonResponse('0000', __('Bilješka obrisana!'));
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Desila se greška'));
        }
    }
}
