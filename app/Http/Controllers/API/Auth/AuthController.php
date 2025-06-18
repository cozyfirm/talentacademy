<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    use ResponseTrait, UserBaseTrait, LogTrait;

    /**
     * Authenticate and return all user data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function auth(Request $request): JsonResponse{
        try{
            if(empty($request->email)) return $this->apiResponse('5001', __('Molimo da unesete Vaš email'));
            if(empty($request->password)) return $this->apiResponse('5002', __('Molimo da unesete Vašu šifru'));

            $user = User::where('email', '=', $request->email)->first();
            if(!$user) return $this->apiResponse('5003', __('Nepoznat email'));

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();

                /** ToDo:: Update FCM token when logged */
                // User::where('email', '=', $request->email)->update(['fcm_token' => $request->fcm_token]);

                return $this->apiResponse('0000', __('Success'), $this->getUserData($user, true) );
            }else {
                return $this->apiResponse('5004', __('You have entered wrong password'));
            }
        }catch (\Exception $e){
            $this->write('API: AuthController::auth()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5000', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
