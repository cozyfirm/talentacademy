<?php

namespace App\Http\Controllers\API\PublicPart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Programs\Program;
use App\Models\User;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AttendeesController extends Controller
{
    use ResponseTrait, LogTrait;

    /* Number of samples returned with query */
    protected int $_number_of_samples = 10;
    protected $_programs;

    /** Set active programs info for request filament */
    public function __construct(){
        $this->_programs = Program::whereHas('seasonRel', function ($q){
            $q->where('active', '=', 1);
        })->with('imageRel:id,file,name,ext')->get(['id', 'title', 'image_id', 'season_id'])->toArray();
    }

    /**
     * Fetch all attendees
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request): JsonResponse{
        try{
            if(isset($request->number)) $this->_number_of_samples = $request->number;

            $attendees = User::whereHas('applicationRel', function ($q){
                $q->where('app_status', '=', 'accepted')
                    ->whereHas('programRel.seasonRel', function ($q){
                        $q->where('active', '=', 1);
                    });
            })->where('role', 'user')->orderBy('id', 'DESC')
                ->select('id', 'name', 'username', 'role', 'about', 'photo_uri');

            /** If program ID is provided, filter by program ID */
            if(isset($request->program_id)){
                $attendees = $attendees->whereHas('applicationRel.programRel', function ($query) use($request){
                    $query->where('id', $request->program_id);
                });
            }

            // We do not need that
            // $attendees = $attendees->with('applicationRel:id,program_id,attendee_id,app_status,motivation,interests,experience,created_at');

            $attendees = Filters::filter($attendees, $this->_number_of_samples);

            return $this->apiResponse('0000', 'Success', [
                'programs' => $this->_programs,
                'attendees' => $attendees->toArray()
            ]);
        }catch (\Exception $e) {
            $this->write('API: AttendeesController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5340', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Preview single attendee; Fetch full data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function preview(Request $request): JsonResponse{
        try{
            if(!isset($request->id)) return $this->apiResponse('5361', __('Nepoznat polaznik'));

            $attendee = User::whereHas('applicationRel', function ($q){
                $q->where('app_status', '=', 'accepted')
                    ->whereHas('programRel.seasonRel', function ($q){
                        $q->where('active', '=', 1);
                    });
            })->where('role', 'user')
                ->where('id', '=', $request->id)
                ->first(['id', 'name', 'username', 'role', 'about', 'photo_uri']);

            return $this->apiResponse('0000', 'Success', [
                'attendee' => $attendee->toArray()
            ]);
        }catch (\Exception $e) {
            $this->write('API: AttendeesController::preview()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5350', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
