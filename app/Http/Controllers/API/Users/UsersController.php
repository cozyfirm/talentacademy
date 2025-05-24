<?php

namespace App\Http\Controllers\API\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
}
