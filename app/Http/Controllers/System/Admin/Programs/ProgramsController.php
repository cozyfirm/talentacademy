<?php

namespace App\Http\Controllers\System\Admin\Programs;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Other\Location;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramSession;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use MongoDB\Driver\Session;

class ProgramsController extends Controller{
    use UserBaseTrait, ResponseTrait;
    protected string $_path = 'admin.programs.';
    protected array $_session_types = [
        'workshop' => 'Workshop',
        'lecture' => 'Lecture'
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
        return view($this->_path . 'create', [
            'preview' => true,
            'program' => Program::where('id', $id)->first()
        ]);
    }
    public function edit($id): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'program' => Program::where('id', $id)->first()
        ]);
    }
    public function update(Request $request){
        try{
            Program::where('id', $request->id)->update($request->except(['id']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.programs.preview', ['id' => $request->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function delete($id){
        try{
            $program = Program::where('id', $id)->first();
            $name = $program->title;
            $program->delete();

            return redirect()->route('system.admin.programs')->with('success', __('Uspješno obrisana lokacija ' . $name . "!"));
        }catch (\Exception $e){
            return redirect()->route('system.admin.programs')->with('error', __('Desila se greška!'));
        }
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /**
     *  Program sessions
     */
    public function createSession($program_id){
        return view($this->_path . 'sessions.create', [
            'create' => true,
            'program' => Program::where('id', $program_id)->first(),
            'types' => $this->_session_types,
            'locations' => Location::pluck('title', 'id'),
            'presenters' => User::where('role', 'presenter')->pluck('name', 'id')
        ]);
    }
    public function saveSession(Request $request): JsonResponse{
        try{
            $request['date'] = Carbon::parse($request->date)->format('Y-m-d');
            ProgramSession::create($request->all());

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.programs.preview', ['id' => $request->program_id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function previewSession($id): View{
        $session = ProgramSession::where('id', $id)->first();
        $program = Program::where('id', $session->program_id)->first();

        return view($this->_path . 'sessions.create', [
            'preview' => true,
            'program' => $program,
            'types' => $this->_session_types,
            'locations' => Location::pluck('title', 'id'),
            'presenters' => User::where('role', 'presenter')->pluck('name', 'id'),
            'session' => $session
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
            'presenters' => User::where('role', 'presenter')->pluck('name', 'id'),
            'session' => $session
        ]);
    }
    public function updateSession(Request $request){
        try{
            $request['date'] = Carbon::parse($request->date)->format('Y-m-d');
            ProgramSession::where('id', $request->id)->update($request->except(['id']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.programs.sessions.preview', ['id' => $request->id]));
        }catch (\Exception $e){
            dd($e);
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function deleteSession($id){
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
}
