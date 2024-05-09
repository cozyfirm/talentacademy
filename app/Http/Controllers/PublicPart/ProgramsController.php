<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Blog\Blog;
use App\Models\Other\FAQ;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramApplication;
use App\Models\Programs\ProgramSession;
use App\Models\Programs\ProgramSessionNote;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProgramsController extends Controller{
    use ResponseTrait, FileTrait;
    protected string $_path = 'public-part.app.programs.';
    protected int $_pages = 6;

    public function getSessionsByDate($program_id, $date){
        return ProgramSession::where('program_id', $program_id)->whereDate('date', $date)->get();
    }
    public function preview($id, $date = null): View | RedirectResponse{
        if(!Auth::check()) return redirect()->route('public-part.programs.sneak-and-peak', ['id' => $id, 'page' => 1]);

        if($date){
            $currentDay = ProgramSession::where('program_id', $id)->whereDate('date', $date)->orderBy('date')->first();
        }else $currentDay = ProgramSession::where('program_id', $id)->orderBy('date')->first();

        return view($this->_path . 'preview', [
            'program' => Program::where('id', $id)->first(),
            'blogPosts' => Blog::where('published', '=', 1)->orderBy('id', 'DESC')->take(6)->get(),
            'currentDay' => $currentDay,
            'sessions' => $this->getSessionsByDate($id, $date ?? $currentDay->date),
            // 'offlineSessions' => $offlineSessions,
            'faqs' => FAQ::where('what', $id)->get()
        ]);
    }
    public function sneakAndPeak($id, $page = 1): View{
        // Make sure that you call the static method currentPageResolver()
        // before querying users
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });
        $offlineSessions = ProgramSession::where('program_id', $id)->where('public', 1)->paginate($this->_pages);

        return view($this->_path . 'preview', [
            'program' => Program::where('id', $id)->first(),
            'blogPosts' => Blog::where('published', '=', 1)->orderBy('id', 'DESC')->take(6)->get(),
            'offlineSessions' => $offlineSessions,
            'faqs' => FAQ::where('what', $id)->get()
        ]);
    }
    public function fetchSessions(Request $request){
        try{
            $currentPage = 2;
            Paginator::currentPageResolver(function () use ($request) {
                return $request->page;
            });
            $offlineSessions = ProgramSession::where('program_id', $request->program)->paginate($this->_pages)->toArray();

            return $this->jsonResponse('0000', __('Bilješka obrisana!'), $offlineSessions);
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Desila se greška'));
        }
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

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     * Apply for scholarship
     */
    public function getScholarshipApplication(int $program_id){
        try{
            $scholarship = ProgramApplication::where('program_id', $program_id)->where('attendee_id', Auth::user()->id)->first();

            if(!$scholarship){
                $scholarship = ProgramApplication::create([
                    'program_id' => $program_id,
                    'attendee_id' => Auth::user()->id
                ]);
            }

            return $scholarship;
        }catch (\Exception $e){ }
    }
    public function applyForScholarship ($id): View | RedirectResponse{
        if(!Auth::check()) return redirect()->route('auth');

        /* Check does user have other applications */
        $submittedOther = ProgramApplication::where('program_id', '!=', $id)->where('attendee_id', Auth::user()->id)
            ->where('status', 'submitted')
            ->first();

        return view($this->_path . 'apply-for-scholarship', [
            'program' => Program::where('id', $id)->first(),
            'application' => $this->getScholarshipApplication($id),
            'submittedOther' => $submittedOther
        ]);
    }

    public function updateScholarship(Request $request): RedirectResponse{
        try{
            $scholarship = $this->getScholarshipApplication($request->program_id);

            $scholarship->update([
                'motivation' => $request->motivation,
                'interests' => $request->interests,
                'experience' => $request->experience,
                'expectations' => $request->expectations,
                'skills' => $request->skills
            ]);

            if(isset($request->cv)){
                $request['path'] = (storage_path('files/programs/applications'));
                $file = $this->saveFile($request, 'cv', 'app_cv');

                $scholarship->update(['cv' => $file->id ]);
            }
            if(isset($request->motivation_letter)){
                $request['path'] = (storage_path('files/programs/applications'));
                $file = $this->saveFile($request, 'motivation_letter', 'app_mot_letter');

                $scholarship->update(['motivation_letter' => $file->id ]);
            }
            if(isset($request->other)){
                $request['path'] = (storage_path('files/programs/applications'));
                $file = $this->saveFile($request, 'other', 'app_other');

                $scholarship->update(['other' => $file->id ]);
            }

            if(isset($request->criteria) and isset($request->privacy)) $scholarship->update(['checked' => 1]);
            else $scholarship->update(['checked' => 0]);

            return back()->with('success', __('Uspješno spremljeno!'));
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška!'));
        }
    }
    public function cancelScholarship ($program_id): RedirectResponse{
        try{
            ProgramApplication::where('program_id', $program_id)->where('attendee_id', Auth::user()->id)->delete();
        }catch (\Exception $e){}

        return redirect()->route('public-part.programs.preview-program', ['id' => $program_id]);
    }
    public function submitForScholarship ($program_id){
        try{
            ProgramApplication::where('program_id', $program_id)->where('attendee_id', Auth::user()->id)->update([
                'status' => 'submitted'
            ]);
        }catch (\Exception $e){ return back(); }

        return redirect()->route('public-part.programs.preview-program', ['id' => $program_id]);
    }
}
