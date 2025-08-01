<?php

namespace App\Http\Controllers\API\PublicPart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Chat\Conversation;
use App\Models\Chat\Participant;
use App\Models\Programs\Program;
use App\Models\User;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                ->where('id', '!=', $request->user_id)
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
            $canSendMessage = false; $chat = null;

            $attendee = User::whereHas('applicationRel', function ($q){
                $q->where('app_status', '=', 'accepted')
                    ->whereHas('programRel.seasonRel', function ($q){
                        $q->where('active', '=', 1);
                    });
            })->where('role', 'user')
                ->where('id', '=', $request->id)
                ->with('applicationRel.programRel')
                ->first(['id', 'name', 'username', 'role', 'about', 'photo_uri']);

            if(!$attendee) return $this->apiResponse('5362', __('Nepoznat polaznik'));

            /** Check does user have privilege to send message to another user */
            try{
                $attendeeProgram = Program::whereHas('appRel', function ($q) use($attendee){
                    $q->where('attendee_id', $attendee->id)->where('app_status', 'accepted');
                })->first();

                if(isset($attendeeProgram->id) and ($attendeeProgram->id == Auth::user()->whatIsMyProgram('id'))) {
                    $canSendMessage = true;

                    $conversation = Participant::whereIn('user_id', [$request->user_id, $attendee->id])
                        ->whereHas('conversationRel', function ($query) {
                            $query->where('is_group', 0);
                        })
                        ->select('conversation_id')
                        ->groupBy('conversation_id')
                        ->havingRaw('COUNT(DISTINCT user_id) = 2')
                        ->first();

                    $chat = Conversation::where('id', '=', $conversation->conversation_id)->first(['id', 'hash', 'name', 'image', 'is_group', 'updated_at']);
                }
            }catch(\Exception $e){ dd($e); }

            return $this->apiResponse('0000', 'Success', [
                'attendee' => $attendee->toArray(),
                'chat' => [
                    'canSendMessage' => $canSendMessage,
                    'conversation' => $chat?->toArray(),
                ]
            ]);
        }catch (\Exception $e) {
            $this->write('API: AttendeesController::preview()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5350', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
