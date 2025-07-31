<?php

namespace App\Http\Controllers\API\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramApplication;
use App\Models\Programs\ProgramSession;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SchedulerController extends Controller{
    use ResponseTrait, LogTrait;

    protected array $_week_days_long = [ 0 => 'Nedjelja', 1 => 'Ponedjeljak', 2 => 'Utorak', 3 => 'Srijeda', 4 => 'Četvrtak', 5 => 'Petak', 6 => 'Subota' ];

    /* Attribute for all active programs */
    protected $_programs;
    protected int $_selected_program;
    protected array $_unique_dates;

    /** Set active programs info for request filament */
    public function __construct(){
        $this->_programs = Program::whereHas('seasonRel', function ($q){
            $q->where('active', '=', 1);
        })->with('imageRel:id,file,name,ext')->get(['id', 'title', 'image_id', 'season_id'])->toArray();
    }

    /**
     * Get unique dates for selected program
     *
     * @param $programID
     * @return array
     */
    protected function getUniqueDates($programID): array {
        $uniqueDates = ProgramSession::where('program_id', $programID)->orderBy('date')->orderBy('datetime_from')->get()->unique('date');
        $counter = 1;

        /* Reset array */
        $this->_unique_dates = [];

        foreach ($uniqueDates as $date){
            $this->_unique_dates[$date->date] = [
                'title' => 'Dan ' . $counter++,
                'date' => Carbon::parse($date->date)->format('d.m.Y'),
                'day'  => $this->_week_days_long[Carbon::parse($date->date)->dayOfWeek]
            ];
        }

        return $this->_unique_dates;
    }

    /**
     * Fetch info about my schedule with:
     *
     *      1. Programs
     *      2. Days for program
     *      3. Sessions for selected (default) day
     *
     * Notes: Date format for param date should be dd.mm.yyyy (02.08.2025)
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request): JsonResponse{
        try{
            /** Check does user belong to any of programs (have accepted application) */
            $application = ProgramApplication::whereHas('programRel.seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('attendee_id', '=', $request->user_id)->where('app_status', '=', 'accepted')->first();

            /* Get program ID so we can search for relative sessions */
            if(isset($request->program_id)) $this->_selected_program = (int)$request->program_id;
            else {
                if($application) $this->_selected_program = $application->program_id;
                else{
                    $program = Program::whereHas('seasonRel', function ($q){
                        $q->where('active', '=', 1);
                    })->with('imageRel:id,file,name,ext')->orderBy('id')->first();

                    $this->_selected_program = $program->id;
                }
            }

            if(isset($request->date)){
                $date = Carbon::parse($request->date)->format('Y-m-d');
            }else {
                $currentDay = ProgramSession::where('program_id', $this->_selected_program)->orderBy('datetime_from')->first();
                $date = $currentDay->date;
            }

//            dd($this->_selected_program);

            $sessions = ProgramSession::where('program_id', $this->_selected_program)
                ->whereDate('date', $date)->orderBy('datetime_from')
//                ->with('presentersRel.presenterRel:id,name,photo_uri')
//                ->with('presentersRel:id,session_id,presenter_id')
                ->with('locationRel:id,title');

            /** If there is no active application, then return only public sessions */
            // if(!$application){ $sessions = $sessions->where('public', '=', 1); }

            /** Fetch sessions */
            $sessions = $sessions->get(['id', 'program_id', 'title', 'type', 'time_from', 'time_to', 'duration', 'date', 'datetime_from', 'public', 'location_id', 'short_description', 'description', 'presenter_id', 'presenter_data']);

// Ručno dodaj presenters_rel samo ako postoji
            $sessions = $sessions->map(function ($session) {
                $data = $session->toArray();

                $presenters = $session->presentersRel()
                    ->with('presenterRel:id,name,photo_uri')
                    ->get(['id', 'session_id', 'presenter_id']);

                if ($presenters->isNotEmpty()) {
                    $data['presenters_rel'] = $presenters->map(function ($pr) {
                        return [
                            'id' => $pr->id,
                            'session_id' => $pr->session_id,
                            'presenter_id' => $pr->presenter_id,
                            'presenter_rel' => optional($pr->presenterRel)->only(['id', 'name', 'photo_uri']),
                        ];
                    })->all();
                }

                return $data;
            })->values()->all(); // all() konvertuje kolekciju u čisti array

//            $sessions = $sessions->map(function ($session) {
//                $data = $session->toArray(); // pretvori u niz
//
//                if (isset($data['presenters_rel']) && count($data['presenters_rel']) === 0) {
//                    unset($data['presenters_rel']);
//                }
//
//                return $data;
//            })->values()->all(); // <- KLJUČ: ovo pretvara kolekciju u čisti niz



            /** Get dates */
            $dates = $this->getUniqueDates($this->_selected_program);

            return $this->apiResponse('0000', 'Success', [
                'selected_date' => $dates[$date],
                'selected_program' => $this->_selected_program,
                'programs' => $this->_programs,
                'dates' => $dates,
                'sessions' => $sessions
            ]);

        }catch (\Exception $e){
            $this->write('API: SchedulerController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }


    public function fetchSession(Request $request): JsonResponse{
        try{
            if(!isset($request->session_id)) return $this->apiResponse('5221', __('Sesija nije pronađena'));
            $session = ProgramSession::where('id', '=', $request->session_id)
                ->with('presentersRel.presenterRel:id,name,photo_uri')
                ->with('presentersRel:id,session_id,presenter_id')
                ->with('locationRel:id,title')
                ->first(['id', 'program_id', 'title', 'type', 'time_from', 'time_to', 'duration', 'date', 'datetime_from', 'public', 'location_id', 'short_description', 'description', 'presenter_id', 'presenter_data']);

            /* Get dates */
            $dates = $this->getUniqueDates($session->program_id);

            if(isset($session->locationRel->title)){
                $session->description = $session->description . "<br><br> Lokacija: " . $session->locationRel->title;
            }

            return $this->apiResponse('0000', 'Success', [
                'selected_date' => $dates[$session->date],
                'selected_program' => $session->program_id,
                'programs' => $this->_programs,
                'session' => $session
            ]);
        }catch (\Exception $e) {
            $this->write('API: SchedulerController::fetchSession()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5220', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
