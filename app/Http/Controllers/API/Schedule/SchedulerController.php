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
     * Get current date we're searching for
     * @param Request $request
     * @param $currentDay
     * @param string $format
     * @return void
     */
    public function getCurrentDate(Request $request, $currentDay, string $format = 'bs'): void{

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

            $sessions = ProgramSession::where('program_id', $this->_selected_program)
                ->whereDate('date', $date)->orderBy('datetime_from')
                ->with('presentersRel.presenterRel:id,name,photo_uri')
                ->with('presentersRel:id,session_id,presenter_id')
                ->with('locationRel:id,title');

            if(!$application){
                /* Only public sessions */
                $sessions = $sessions->where('public', '=', 1);
            }

            $sessions = $sessions->get(['id', 'program_id', 'title', 'type', 'time_from', 'time_to', 'duration', 'date', 'datetime_from', 'public', 'location_id', 'short_description', 'description', 'presenter_id', 'presenter_data']);

            return $this->apiResponse('0000', 'Success', [
                'selected_date' => $date,
                'selected_program' => $this->_selected_program,
                'programs' => $this->_programs,
                'dates' =>  $this->getUniqueDates($this->_selected_program),
                'sessions' => $sessions
            ]);

        }catch (\Exception $e){
            $this->write('API: SchedulerController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
