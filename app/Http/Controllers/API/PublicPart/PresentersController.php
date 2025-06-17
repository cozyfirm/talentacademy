<?php

namespace App\Http\Controllers\API\PublicPart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Chat\Conversation;
use App\Models\Chat\Participant;
use App\Models\Other\Blog\Blog;
use App\Models\Programs\Program;
use App\Models\User;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresentersController extends Controller{
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
     * Fetch all lecturers
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request): JsonResponse{
        try{
            if(isset($request->number)) $this->_number_of_samples = $request->number;

            $presenters = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('role', 'presenter')->orderBy('id', 'DESC')
                ->select('id', 'name', 'username', 'role', 'about', 'photo_uri', 'title', 'institution', 'presenter_role', 'short_description');

            /** If program ID is provided, filter by program ID */
            if(isset($request->program_id)){
                $presenters = $presenters->whereHas('sessionsPresenterRel.sessionRel.programRel', function ($query) use($request){
                    $query->where('id', $request->program_id);
                });
            }

            $presenters = Filters::filter($presenters, $this->_number_of_samples);

            return $this->apiResponse('0000', 'Success', [
                'programs' => $this->_programs,
                'presenters' => $presenters->toArray()
            ]);
        }catch (\Exception $e) {
            $this->write('API: PresentersController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5340', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Preview single location; Fetch full data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function preview(Request $request): JsonResponse{
        try{
            if(!isset($request->id)) return $this->apiResponse('5361', __('Nepoznat predavač'));
            $canSendMessage = false; $chat = null;

            $presenter = User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('role', 'presenter')
                ->where('id', '=', $request->id)
                ->first(['id', 'name', 'username', 'role', 'about', 'photo_uri', 'title', 'institution', 'presenter_role', 'short_description', 'description', 'interview', 'instagram', 'facebook', 'twitter', 'linkedin', 'web']);

            if(!$presenter) return $this->apiResponse('5362', __('Nepoznat predavač'));

            /** Check does user have privilege to send message to another user */
            try{
                $presenterProgram = Program::whereHas('sessionsRel.presentersRel', function ($q) use($presenter){
                    $q->where('presenter_id', $presenter->id);
                })->whereHas('seasonRel', function ($q){
                    $q->where('active', '=', 1);
                })->first();

                if(isset($presenterProgram->id) and ($presenterProgram->id == Auth::user()->whatIsMyProgram('id'))) {
                    $canSendMessage = true;

                    $conversation = Participant::whereIn('user_id', [$request->user_id, $presenter->id])
                        ->whereHas('conversationRel', function ($query) {
                            $query->where('is_group', 0);
                        })
                        ->select('conversation_id')
                        ->groupBy('conversation_id')
                        ->havingRaw('COUNT(DISTINCT user_id) = 2')
                        ->first();

                    $chat = Conversation::where('id', '=', $conversation->conversation_id)->first(['id', 'hash', 'name', 'image', 'is_group', 'updated_at']);
                }
            }catch(\Exception $e){}

            return $this->apiResponse('0000', 'Success', [
                'presenter' => $presenter->toArray(),
                'chat' => [
                    'canSendMessage' => $canSendMessage,
                    'conversation' => $chat?->toArray(),
                ]
            ]);
        }catch (\Exception $e) {
            $this->write('API: PresentersController::preview()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5350', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
