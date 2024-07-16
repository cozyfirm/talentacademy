<?php

namespace App\Http\Controllers\System\Admin\Programs;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Mail\Users\ApplicationStatus;
use App\Mail\Users\ConfirmEmail;
use App\Models\Chat\Participant;
use App\Models\Core\File;
use App\Models\Other\FormQuestion;
use App\Models\Other\Inbox\Inbox;
use App\Models\Other\Inbox\InboxTo;
use App\Models\Other\Location;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramApplication;
use App\Models\Programs\ProgramSession;
use App\Models\Programs\ProgramSessionEvaluation;
use App\Models\Programs\ProgramSessionFile;
use App\Models\Programs\ProgramSessionLink;
use App\Models\User;
use App\Traits\Common\CommonTrait;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use MongoDB\Driver\Session;

class ProgramsController extends Controller{
    use UserBaseTrait, ResponseTrait, FileTrait, CommonTrait;
    protected string $_path = 'admin.programs.';
    protected array $_session_types = [
        'Radionica' => 'Radionica',
        'Predavanje' => 'Predavanje',
        'Keynote Predavanje' => 'Keynote Predavanje',
        'Projekcija filma' => 'Projekcija filma',
        'JAM sesija' => 'JAM sesija',
        'Posjeta' => 'Posjeta',
        'Hakaton' => 'Hakaton',
        'Doručak' => 'Doručak',
        'Ručak' => 'Ručak',
        'Večera' => 'Večera',
        'Kritičko razmišljanje' => 'Kritičko razmišljanje'
    ];

    public function index(): View{
        $programs = Program::where('id', '>', 0);
        $programs = Filters::filter($programs);

        $filters = [
            'title' => __('Naslov')
        ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'programs' => $programs
        ]);
    }
    public function create(): View{
        return view($this->_path . 'create', [
            'create' => true
        ]);
    }
    public function save(Request $request): JsonResponse{
        try{
            $program = Program::create($request->all());

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.programs.preview', ['id' => $program->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function preview($id): View{
        $program = Program::where('id', $id)->first();

        return view($this->_path . 'create', [
            'preview' => true,
            'program' => $program
        ]);
    }
    public function edit($id): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'program' => Program::where('id', $id)->first()
        ]);
    }
    public function update(Request $request): JsonResponse{
        try{
            Program::where('id', $request->id)->update([ 'title' => $request->title, 'description' => $request->description ]);

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.programs.preview', ['id' => $request->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function delete($id): RedirectResponse{
        try{
            $program = Program::where('id', $id)->first();
            $name = $program->title;
            $program->delete();

            return redirect()->route('system.admin.programs')->with('success', __('Uspješno obrisana lokacija ' . $name . "!"));
        }catch (\Exception $e){
            return redirect()->route('system.admin.programs')->with('error', __('Desila se greška!'));
        }
    }
    public function saveImage (Request $request) : RedirectResponse{
        try{
            $request['path'] = ('files/programs');
            $file = $this->saveFile($request, 'photo_uri', 'program_file');

            Program::where('id', $request->id)->update(['image_id' => $file->id]);
            return redirect()->back()->with('success', __('Uspješno ažurirana fotografija!'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', __('Desila se greška!'));
        }
    }

    public function allApplications(): View{
        $applications = ProgramApplication::where('status', '=', 'submitted');
        $applications = Filters::filter($applications);

        $filters = [
            'programRel.title' => __('Program'),
            'userRel.name' => __('Ime i prezime'),
            'app_status' => __('Status aplikacije')
        ];

        return view($this->_path . 'all-applications', [
            'filters' => $filters,
            'applications' => $applications
        ]);
    }
    public function previewApplication ($id){
        return view($this->_path . 'preview-application', [
            'application' => ProgramApplication::where('id', $id)->first(),
        ]);
    }
    public function editApplication ($id){
        return view($this->_path . 'edit-application', [
            'application' => ProgramApplication::where('id', $id)->first(),
        ]);
    }
    public function updateApplication(Request $request): JsonResponse{
        try{
            $application = ProgramApplication::where('id', $request->id)->first();

            if($application->app_status == 'in_queue' and $request->app_status != 'in_queue'){
                /* Send this message only first time when changing */

                if($request->app_status == 'accepted'){
                    $message = Inbox::where('id', 3)->first();
                    $status = 'prihvaćena';
                }else if($request->app_status == 'denied'){
                    $message = Inbox::where('id', 4)->first();
                    $status = 'odbijena';
                }

                InboxTo::create([
                    'inbox_id' => $message->id,
                    'to' => $application->attendee_id
                ]);

                /**
                 *  Send an email
                 */
                Mail::to($application->userRel->email)->send(new ApplicationStatus($application->userRel->name, $status, $message->content));
                $application->update(['app_status' => $request->app_status]);

                return $this->jsonSuccess(__('Obavijest uspješno poslana!'), route('system.admin.programs.preview-application', ['id' => $request->id]));
            }
            $application->update(['app_status' => $request->app_status]);

            /* If user does not belong to Academy Info, Add it */
            $participant = Participant::where('conversation_id', '=', 1)->where('user_id', $application->attendee_id)->first();
            if(!$participant){
                Participant::create([
                    'conversation_id' => 1,
                    'user_id' => $application->attendee_id
                ]);
            }

            return $this->jsonSuccess(__('Informacije ažurirane bez slanja obavijesti!'), route('system.admin.programs.preview-application', ['id' => $request->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function downloadFile ($id){
        try{
            $file = File::where('id', $id)->first();

            return response()->download(storage_path('files/programs/applications/' . $file->name));
        }catch (\Exception $e){
            return back();
        }
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /**
     *  Program sessions
     */
    protected function calculateDuration(Request $request): void{
        $start = explode(':', $request->time_from);
        $end   = explode(':', $request->time_to);

        try{
            $request['duration'] = (($end[0] * 60) + $end[1]) - (($start[0] * 60) + $start[1]);
        }catch (\Exception $e){  }
    }

    public function createSession($program_id): View{
        return view($this->_path . 'sessions.create', [
            'create' => true,
            'program' => Program::where('id', $program_id)->first(),
            'types' => $this->_session_types,
            'locations' => Location::pluck('title', 'id'),
            'presenters' => User::where('role', 'presenter')->pluck('name', 'id')->prepend('Bez predavača', 0),
            'timeArr' => self::formTimeArr()
        ]);
    }
    public function saveSession(Request $request): JsonResponse{
        try{
            $this->calculateDuration($request);

            $request['date'] = Carbon::parse($request->date)->format('Y-m-d');
            $request['datetime_from'] = Carbon::parse($request->date . ' ' . $request->time_from);

            ProgramSession::create($request->all());

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.programs.preview', ['id' => $request->program_id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function previewSession($id): View{
        $session = ProgramSession::where('id', $id)->first();
        $program = Program::where('id', $session->program_id)->first();

        $users = ProgramSessionEvaluation::where('session_id', $id)->select('attendee_id')->distinct()->get();

        return view($this->_path . 'sessions.create', [
            'preview' => true,
            'program' => $program,
            'types' => $this->_session_types,
            'locations' => Location::pluck('title', 'id'),
            'presenters' => User::where('role', 'presenter')->pluck('name', 'id')->prepend('Bez predavača', 0),
            'session' => $session,
            'timeArr' => self::formTimeArr(),
            'questions' => FormQuestion::orderBy('id', 'ASC')->get(),
            'users' => $users
        ]);
    }
    public function editSession($id): View{
        $session = ProgramSession::where('id', $id)->first();
        $program = Program::where('id', $session->program_id)->first();

        return view($this->_path . 'sessions.create', [
            'edit' => true,
            'program' => $program,
            'types' => $this->_session_types,
            'locations' => Location::pluck('title', 'id'),
            'presenters' => User::where('role', 'presenter')->pluck('name', 'id')->prepend('Bez predavača', 0),
            'session' => $session,
            'timeArr' => self::formTimeArr()
        ]);
    }
    public function updateSession(Request $request): JsonResponse{
        try{
            $this->calculateDuration($request);

            $request['date'] = Carbon::parse($request->date)->format('Y-m-d');
            $request['datetime_from'] = Carbon::parse($request->date . ' ' . $request->time_from);
            ProgramSession::where('id', $request->id)->update($request->except(['id', 'undefined', 'files']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.programs.sessions.preview', ['id' => $request->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function deleteSession($id): RedirectResponse{
        try{
            $session = ProgramSession::where('id', $id)->first();

            $program = Program::where('id', $session->program_id)->first();
            $name = $session->title;
            $session->delete();

            return redirect()->route('system.admin.programs.preview', ['id' => $program->id ])->with('success', __('Uspješno obrisana sesija ' . $name . "!"));
        }catch (\Exception $e){
            return redirect()->route('system.admin.programs')->with('error', __('Desila se greška!'));
        }
    }

    /**
     * @param $session_id
     * @return View
     * Work with files
     */
    public function uploadFile($session_id): View{
        return view($this->_path . 'sessions.upload-file', [
            'session' => ProgramSession::where('id', $session_id)->first()
        ]);
    }
    public function saveSessionFile (Request $request): RedirectResponse{
        try{
            /* Add path */
            $request['path'] = ('files/programs/sessions');
            $file = $this->saveFile($request, 'file_uri', 'session_file');

            ProgramSessionFile::create(['session_id' => $request->session_id, 'file_id' => $file->id]);

            return redirect()->route('system.admin.programs.sessions.preview', ['id' => $request->session_id]);
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

    /**
     *  Upload links
     */
    public function insertLink($session_id): View{
        return view($this->_path . 'sessions.insert-link', [
            'session' => ProgramSession::where('id', $session_id)->first()
        ]);
    }
    public function saveLink(Request $request){
        try{
            $link = ProgramSessionLink::create($request->except(['_token']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.programs.sessions.preview', ['id' => $request->session_id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function ProgramSessionLink ($id): RedirectResponse{
        try{
            $link = ProgramSessionLink::where('id', $id)->first();
            $linkName = $link->value;

            $link->delete();

            return back()->with('success', __('Uspješno obrisan link: ' . $linkName . "!"));
        }catch (\Exception $e){
            return back();
        }
    }
}
