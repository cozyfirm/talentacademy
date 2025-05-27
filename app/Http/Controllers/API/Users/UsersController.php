<?php

namespace App\Http\Controllers\API\Users;

use App\Http\Controllers\Controller;
use App\Models\Chat\Message;
use App\Models\Chat\Participant;
use App\Models\Other\Inbox\InboxTo;
use App\Models\Programs\ProgramApplication;
use App\Models\Programs\ProgramSessionEvaluation;
use App\Models\Programs\ProgramSessionNote;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller{
    use ResponseTrait, UserBaseTrait;

    /**
     * Fetch basic user info (without sensitive data)
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function fetchInfo(Request $request): JsonResponse{
        try{
            if(empty($request->username)) return $this->apiResponse('5011', __('Username nije validan'));

            $user = User::where('username', '=', $request->username)->first();
            if(!$user) return $this->apiResponse('5012', __('Nepoznat korisnik'));

            return $this->apiResponse('0000', __('Success'), $this->getUserData($user, false) );
        }catch (\Exception $e){
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Update basic info about user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateBasicData(Request $request): JsonResponse{
        try{
            /** Change date format */
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');

            /** Update user info */
            User::where('id', '=', $request->user_id)->update(
                $request->except(['user_id', 'api_token'])
            );

            return $this->apiResponse('0000', __('Success'), $this->getUserData(User::where('id', '=', $request->user_id)->first(), false) );
        }catch (\Exception $e){
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Change password; Password check included
     * @param Request $request
     * @return JsonResponse
     */
    public function changePassword(Request $request): JsonResponse{
        try{
            if($request->password != $request->repeat) return $this->apiResponse('5031', __('Lozinke se ne podudaraju'));

            /**
             *  Check password (Defined in UserBaseTrait)
             */
            try{
                $passwordCheck = $this->passwordCheck($request);

                if($passwordCheck['code'] != '0000'){
                    return $this->apiResponse($passwordCheck['code'], $passwordCheck['message']);
                }
            }catch (\Exception $e){ return $this->apiResponse('5033', __('Error while processing your request. Please contact an administrator')); }

            $request['password'] = Hash::make($request->password);

            /** Update user info */
            User::where('id', '=', $request->user_id)->update(['password' => $request->password ]);

            return $this->apiResponse('0000', __('Success'), $this->getUserData(User::where('id', '=', $request->user_id)->first(), false) );
        }catch (\Exception $e){
            return $this->apiResponse('5030', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Upload photo; Change profile image of user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function uploadPhoto (Request $request): JsonResponse{
        try{
            $file = $request->file('photo');
            $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);

            if($ext != 'png' and $ext != 'jpg' and $ext != 'jpeg') return $this->apiResponse('5041', __('Format fotografije nije podržan'));

            $name = md5($file->getClientOriginalName().time()).'.'.$ext;
            $file->move(public_path('files/images/public-part/users'), $name);

            /* Update file name */
            User::where('id', '=', $request->user_id)->update(['photo_uri' => $name ]);

            return $this->apiResponse('0000', __('Success'), $this->getUserData(User::where('id', '=', $request->user_id)->first(), false) );
        }catch (\Exception $e){
            return $this->apiResponse('5040', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Delete profile and all other data (if user), such as:
     *      1. Applications
     *      2. Evaluations
     *      3. Notes
     *      4. Chat messages
     *      5. Inbox data
     *
     *  else just do soft delete
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteProfile(Request $request): JsonResponse{
        try{
            if(Auth::user()->role == 'user'){
                /**
                 *  Lets delete all relationships from user
                 */
                $application = ProgramApplication::where('attendee_id', '=', $request->user_id)->delete();

                $evaluations = ProgramSessionEvaluation::where('attendee_id', '=', $request->user_id)->delete();

                $notes = ProgramSessionNote::where('attendee_id', '=', $request->user_id)->delete();

                $participants = Participant::where('user_id', '=', $request->user_id)->delete();
                $messages     = Message::where('sender_id', '=', $request->user_id)->delete();

                $inbox        = InboxTo::where('to', '=', $request->user_id)->delete();

                /** Update user info */
                User::where('id', '=', $request->user_id)->forceDelete();
            }else{
                User::where('id', '=', $request->user_id)->delete();
            }

            return $this->apiResponse('0000', __('Success'));
        }catch (\Exception $e){
            return $this->apiResponse('5030', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
