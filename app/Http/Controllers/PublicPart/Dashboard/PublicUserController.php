<?php

namespace App\Http\Controllers\PublicPart\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Models\Core\Country;
use App\Models\Other\Blog\Blog;
use App\Models\Other\FormQuestion;
use App\Models\Other\Inbox\InboxTo;
use App\Models\Other\SinglePage;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramApplication;
use App\Models\Programs\ProgramSession;
use App\Models\Programs\ProgramSessionEvaluation;
use App\Models\Programs\ProgramSessionFile;
use App\Models\Programs\ProgramSessionLink;
use App\Models\Programs\ProgramSessionNote;
use App\Models\User;
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
    protected int $_notification_count = 6;

    /**
     *  Preview and update my profile
     */
    public function myProfile(): View{
        return view($this->_path . 'my-profile', [
            'countries' => Country::orderBy('name_ba')->get()->pluck('name_ba', 'id'),
            'myProfile' => true
        ]);
    }
    public function welcome(): View{
        return view($this->_path . 'user.welcome', [
            'content' => SinglePage::where('id', 14)->first()
        ]);
    }
    public function latestNews(): View{
        $last = Blog::whereHas('seasonRel', function ($q){
            $q->where('active', '=', 1);
        })->where('published', '=', 1)->where('category', '=', -1)->orderBy('id', 'desc')->first();

        return view('public-part.app.blog.blog', [
            'posts' => Blog::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('published', '=', 1)->where('category', '=', -1)->where('id', '!=', $last->id)->orderBy('id', 'DESC')->take(30)->get(),
            'last' => $last,
            'showAll' => true
        ]);
    }
    public function latestNew($id): View{
        $post = Blog::where('id', $id)->first();

        return view('public-part.app.blog.single-blog', [
            'post' => $post,
            'blogPosts' => Blog::where('published', '=', 1)->where('category', '=', 10)->where('id', '!=', $post->id)->orderBy('id', 'DESC')->take(6)->get(),
            'showAll' => true
        ]);
    }
    public function updateProfile (Request $request): JsonResponse{
        try{
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');

            if(isset($request->phone)){
                if(strlen($request->phone) > 12) return $this->jsonError('1503', __('Broj telefona nije važeći!'));
            }

            /* When updating password */
            if(isset($request->email)){
                if(empty($request->password)) return $this->jsonError('1501', __('Lozinka ne može biti prazna!'));
                if($request->password != $request->password_w) return $this->jsonError('1502', __('Lozinke se ne podudaraju!'));
                $request['password'] = Hash::make($request->password);
            }
            Auth::user()->update($request->all());

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('dashboard.my-profile'));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function updateProfileImage (Request $request): RedirectResponse{
        try{
            $file = $request->file('photo_uri');
            $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);

            if($ext != 'png' and $ext != 'jpg' and $ext != 'jpeg') return back();

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
        return view($this->_path . 'change-password', [

        ]);
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Presenter routes
     */
    public function previewSessions (): View | RedirectResponse{
        /* Redirect if not presenter */
        if(Auth::user()->role != 'presenter') return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'presenter.preview-sessions', [
            'sessions' => ProgramSession::whereHas('presentersRel', function ($q){
                $q->where('presenter_id', '=', Auth::user()->id);
            })->whereHas('programRel.seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->get()
        ]);
    }
    public function previewSession ($id): View | RedirectResponse{
        $session = ProgramSession::where('id', $id)->first();
        /* Redirect if not presenter */

        if(!Auth::user()->presenterHasAccess($id)) return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'presenter.preview-session', [
            'session' => $session
        ]);
    }
    public function updateSessions(Request $request): JsonResponse{
        try{
            $session = ProgramSession::where('id', $request->id)->first();
            if(!Auth::user()->presenterHasAccess($session->id)) return $this->jsonError('1500', __('Nemate privilegiju za ažuriranje ove sesije!'));

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
    public function applyForScholarship (): View | RedirectResponse{
        /* Redirect if not user */
        if(Auth::user()->role != 'user') return redirect()->route('dashboard.my-profile');
        if($this->appTimePassed()) return back();

        return view($this->_path . 'user.apply-for-scholarship', [
            'programs' => Program::where('id', '>', 5)->get()
        ]);
    }
    public function inbox(){
        return view($this->_path . 'user.inbox', [
            'messages' => InboxTo::where('to', Auth::user()->id)->orderBy('id', 'DESC')->paginate($this->_notification_count)
        ]);
    }
    public function markMessageAsRead(Request $request): JsonResponse|bool|string {
        try{
            $notification = InboxTo::where('id', $request->id)->first();

            if($notification->to == Auth::user()->id){
                $notification->update(['read_at' => Carbon::now(), 'read' => 1]);
            }
            return $this->jsonResponse('0000', __('Uspješno ažurirano!'), [
                'unread' => Auth::user()->unreadNotifications()
            ]);
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function mySchedule($date = null): View | RedirectResponse{
        if(Auth::user()->role == 'user'){
            $app = ProgramApplication::where('app_status', 'accepted')->where('attendee_id', Auth::user()->id)->first();
            $program = Program::where('id', $app->program_id)->first();

            if($date){
                $currentDay = ProgramSession::where('program_id', $app->program_id)->whereDate('date', $date)->orderBy('datetime_from')->first();
            }else $currentDay = ProgramSession::where('program_id', $app->program_id)->orderBy('datetime_from')->first();

            $sessions = ProgramSession::where('program_id', $program->id)->whereDate('date', $date ?? $currentDay->date)->orderBy('datetime_from')->get();
        }else{
            $session  = ProgramSession::where('presenter_id', Auth::user()->id)->first();
            $program = Program::where('id', $session->program_id)->first();

            if($date){
                $currentDay = ProgramSession::where('presenter_id', Auth::user()->id)->whereDate('date', $date)->orderBy('datetime_from')->first();
            }else $currentDay = ProgramSession::where('presenter_id', Auth::user()->id)->orderBy('datetime_from')->first();

            $sessions = ProgramSession::where('program_id', $program->id)->where('presenter_id', Auth::user()->id)->whereDate('date', $date ?? $currentDay->date)->orderBy('datetime_from')->get();
        }

        return view($this->_path . 'user.my-schedule', [
            'program' => $program,
            'sessions' => $sessions,
            'currentDay' => $currentDay
        ]);
    }

    /*
     *  My notes
     */
    public function myNotes(): View | RedirectResponse{
        if(!Auth::user()->myProgram()) return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'user.my-notes', [
            'sessions' => Auth::user()->getMySessions()
        ]);
    }
    public function removeMyNote(Request $request){
        try{
            $note = ProgramSessionNote::where('id', $request->id)->first();
            $left = ProgramSessionNote::where('session_id', $note->session_id)->where('id', '!=', $note->id)->count();

            $note->delete();

            return $this->jsonResponse('0000', __('Bilješka uspješno obrisana!'), [
                'left' => $left,
                'totalLeft' => Auth::user()->totalNotes()
            ]);
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }

    public function department(): View | RedirectResponse{
        //if(Auth::user()->role == 'presenter'){
        //    if(!Auth::user()->presenterProgram()) return redirect()->route('dashboard.my-profile');
        //}else if(!Auth::user()->myProgram()) return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'user.department', [
            'lecturers' => Auth::user()->getMyLecturers(),
            'teamMates' => Auth::user()->getMyTeamMates()
        ]);
    }
    public function previewUser($username): View | RedirectResponse{
        if(Auth::user()->role == 'presenter'){
            if(!Auth::user()->presenterProgram()) return redirect()->route('dashboard.my-profile');
        }else if(!Auth::user()->myProgram()) return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'user.preview-user', [
            'user' => User::where('username', $username)->first(),
            'teamMates' => Auth::user()->getMyTeamMates()
        ]);
    }
    /*
     *  My evaluations
     */
    public function myEvaluations (): View | RedirectResponse{
        if(!Auth::user()->myProgram()) return redirect()->route('dashboard.my-profile');

        return view($this->_path . 'user.my-evaluations', [
            'sessions' => Auth::user()->getMySessions(true)
        ]);
    }
    public function checkMyEvaluation ($session_id): View | RedirectResponse{
        if(!Auth::user()->myProgram()) return redirect()->route('dashboard.my-profile');

        $session = ProgramSession::where('id', $session_id)->first();

        return view($this->_path . 'user.my-evaluation-check', [
            'questions' => FormQuestion::get(),
            'session_id' => $session_id,
            'session' => $session
        ]);
    }
    public function updateEvaluation(Request $request): RedirectResponse{
        try{
            /* First remove all previous samples */
            ProgramSessionEvaluation::where('session_id', $request->session_id)->where('attendee_id', Auth::user()->id)->delete();

            foreach ($request->all() as $key => $val){
                if($key == '_token' or $key == 'session_id') continue;
                /* Remove question__ from key */
                $question_id = substr($key, 10);

                ProgramSessionEvaluation::create([
                    'session_id' => $request->session_id,
                    'attendee_id' => Auth::user()->id,
                    'question_id' => $question_id,
                    'answer' => $val
                ]);
            }

            return redirect()->route('dashboard.my-evaluations.check', ['session_id' => $request->session_id]);
        }catch (\Exception $e){ return back(); }
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Sign out and redirect to homepage
     */
    public function signOut(): RedirectResponse{
        Auth::logout();

        return redirect()->route('public-part.home');
    }

    /**
     * Update users online status
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateOnlineStatus(Request $request): JsonResponse{
        try{
            /** Update last online status */
            if (auth()->check()) {
                Auth::user()->update(['last_online' => Carbon::now()]);
            }

            return $this->apiResponse('0000', __('Success'));
        }catch (\Exception $e){
            $this->write('API: PublicUserController::updateOnlineStatus()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5030', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
