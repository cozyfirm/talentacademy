<?php

namespace App\Http\Controllers\API\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Other\Inbox\InboxTo;
use App\Models\User;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller{
    use ResponseTrait, UserBaseTrait, LogTrait;

    protected int $_msg_number = 10;

    /**
     * Fetch info about user inbox (notification)
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request): JsonResponse{
        try{
            $inbox = InboxTo::where('to', $request->user_id)
                ->with('messageRel.fromRel:id,name,role,photo_uri')
                ->with('messageRel:id,title,from')
                ->orderBy('id', 'DESC')
                ->select('id', 'inbox_id', 'to', 'read', 'read_at', 'created_at');

            $inbox = Filters::filter($inbox, $this->_msg_number);

            return $this->apiResponse('0000', __('Success'), [
                'inbox' => $inbox->toArray()
            ]);
        }catch (\Exception $e){
            $this->write('API: InboxController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Preview single post
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function preview(Request $request): JsonResponse{
        try{
            $inbox = InboxTo::where('to', $request->user_id)
                ->where('id', $request->id)
                ->with('messageRel.fromRel:id,name,role,photo_uri')
                ->with('messageRel:id,title,from,content')
                ->orderBy('id', 'DESC')
                ->first(['id', 'inbox_id', 'to', 'read', 'read_at', 'created_at']);

            /** Mark it as read */
            $inbox->update(['read_at' => Carbon::now(), 'read' => 1]);

            return $this->apiResponse('0000', __('Success'), [
                'inbox' => $inbox->toArray()
            ]);
        }catch (\Exception $e){
            $this->write('API: InboxController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
