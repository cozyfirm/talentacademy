<?php

namespace App\Http\Controllers\PublicPart\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Models\Core\Country;
use App\Models\Other\Inbox\InboxTo;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramApplication;
use App\Models\Programs\ProgramSession;
use App\Models\Programs\ProgramSessionFile;
use App\Models\Programs\ProgramSessionLink;
use App\Traits\Common\CommonTrait;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use MongoDB\Driver\Session;

class PublicUserController extends Controller{
    use UserBaseTrait, ResponseTrait, FileTrait, CommonTrait;
    protected string $_path = 'public-part.dashboard.';

    /**
     *  Preview and update my profile
     */
    public function myProfile(): View{
        return view($this->_path . 'my-profile', [
            'countries' => Country::orderBy('name_ba')->get()->pluck('name_ba', 'id'),
        ]);
    }
    public function updateProfile (Request $request): JsonResponse{
        try{
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');

            /* When updating password */
            if(isset($request->email)){
                if(empty($request->password)) return $this->jsonError('1501', __('Lozinka ne može biti prazna!'));
                if($request->password != $request->password_w) return $this->jsonError('1502', __('Lozinke se ne podudaraju!'));
                $request['password'] = Hash::make($request->password);
            }
            Auth::user()->update($request->all());

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('dashboard.my-profile'));
        }catch (\Exception $e){
            dd($e);
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function updateProfileImage (Request $request): RedirectResponse{
        try{
            $file = $request->file('photo_uri');
            $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
            $name = md5($file->getClientOriginalName().time()).'.'.$ext;
            $file->move(public_path('files/images/public-part/users'), $name);

            /* Update file name */
            Auth::user()->update(['photo_uri' => $name]);

            return redirect()->route('dashboard.my-profile');
        }catch (\Exception $e){
            return back();
        }
    }
    public function editLinks($link): View{
        if($link == 'instagram') $value = Auth::user()->instagram;
        else if($link == 'facebook') $value = Auth::user()->facebook;
        else if($link == 'twitter') $value = Auth::user()->twitter;
        else if($link == 'linkedin') $value = Auth::user()->linkedin;
        else $value = Auth::user()->web;

        return view($this->_path . 'edit-links', [
            'link' => ucfirst($link),
            'value' => $value
        ]);
    }
    public function changePassword (): View{
        return view($this->_path . 'change-password', []);
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Presenter routes
     */
    public function previewSessions (): View{
        /* Redirect if not presenter */
        if(Auth::user()->role != 'presenter') return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'presenter.preview-sessions', [
            'sessions' => ProgramSession::where('presenter_id', Auth::user()->id)->get()
        ]);
    }
    public function previewSession ($id): View{
        $session = ProgramSession::where('id', $id)->first();
        /* Redirect if not presenter */
        if(Auth::user()->role != 'presenter' or $session->presenter_id != Auth::user()->id) return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'presenter.preview-session', [
            'session' => $session
        ]);
    }
    public function updateSessions(Request $request): JsonResponse{
        try{
            $session = ProgramSession::where('id', $request->id)->first();
            if(Auth::user()->role != 'presenter' or $session->presenter_id != Auth::user()->id)  return $this->jsonError('1500', __('Nemate ovlaštenje za pristup!'));

            $session->update(['presenter_data' => $request->presenter_data]);

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('dashboard.preview-session', ['id' => $request->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function addNewFile($session_id): View{
        $session = ProgramSession::where('id', $session_id)->first();

        return view($this->_path . 'presenter.add-new-file', [
            'session' => $session
        ]);
    }
    public function saveNewFile (Request $request): RedirectResponse{
        try{
            /* Add path */
            $request['path'] = ('files/programs/sessions');
            $file = $this->saveFile($request, 'file_uri', 'session_file');

            ProgramSessionFile::create(['session_id' => $request->session_id, 'file_id' => $file->id]);

            return redirect()->route('dashboard.preview-session', ['id' => $request->session_id]);
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška!'));
        }
    }
    public function removeSessionFile ($id): RedirectResponse{
        try{
            $file = ProgramSessionFile::where('id', $id)->first();
            $fileName = $file->file;

            $file->delete();

            return back()->with('success', __('Uspješno obrisan dokument ' . $fileName . "!"));
        }catch (\Exception $e){
            return back();
        }
    }
    public function addNewLink($session_id): View{
        $session = ProgramSession::where('id', $session_id)->first();

        return view($this->_path . 'presenter.add-new-link', [
            'session' => $session
        ]);
    }
    public function saveNewLink  (Request $request): JsonResponse{
        try{
            $link = ProgramSessionLink::create($request->except(['_token']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('dashboard.preview-session', ['id' => $request->session_id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function removeSessionLink ($id): RedirectResponse{
        try{
            $link = ProgramSessionLink::where('id', $id)->first();
            $linkName = $link->value;

            $link->delete();

            return back()->with('success', __('Uspješno obrisan link: ' . $linkName . "!"));
        }catch (\Exception $e){
            return back();
        }
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  User routes
     */
    public function applyForScholarship (){
        /* Redirect if not user */
        if(Auth::user()->role != 'user') return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'user.apply-for-scholarship', [
            'programs' => Program::where('id', '<', 6)->get()
        ]);
    }
    public function inbox(){
        return view($this->_path . 'user.inbox', [
            'messages' => InboxTo::where('to', Auth::user()->id)->get()
        ]);
    }
    public function mySchedule($date = null): View | RedirectResponse{
        if(Auth::user()->role == 'user'){
            $app = ProgramApplication::where('app_status', 'accepted')->where('attendee_id', Auth::user()->id)->first();
            $program = Program::where('id', $app->program_id)->first();

            if($date){
                $currentDay = ProgramSession::where('program_id', $app->program_id)->whereDate('date', $date)->orderBy('date')->first();
            }else $currentDay = ProgramSession::where('program_id', $app->program_id)->orderBy('date')->first();

            $sessions = ProgramSession::where('program_id', $program->id)->whereDate('date', $date ?? $currentDay->date)->get();
        }else{
            $session  = ProgramSession::where('presenter_id', Auth::user()->id)->first();
            $program = Program::where('id', $session->program_id)->first();

            if($date){
                $currentDay = ProgramSession::where('presenter_id', Auth::user()->id)->whereDate('date', $date)->orderBy('date')->first();
            }else $currentDay = ProgramSession::where('presenter_id', Auth::user()->id)->orderBy('date')->first();

            $sessions = ProgramSession::where('program_id', $program->id)->where('presenter_id', Auth::user()->id)->whereDate('date', $date ?? $currentDay->date)->get();
        }

        return view($this->_path . 'user.my-schedule', [
            'program' => $program,
            'sessions' => $sessions,
            'currentDay' => $currentDay
        ]);
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Sign out and redirect to homepage
     */
    public function signOut(): RedirectResponse{
        Auth::logout();

        return redirect()->route('public-part.home');
    }
}
