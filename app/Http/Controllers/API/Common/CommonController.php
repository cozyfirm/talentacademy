<?php

namespace App\Http\Controllers\API\Common;

use App\Http\Controllers\Controller;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommonController extends Controller{
    use ResponseTrait, LogTrait;

    /**
     * Return app stage and app uri
     * @param Request $request
     * @return JsonResponse
     */
    public function appStage(Request $request): JsonResponse{
        try {
            return $this->apiResponse('0000', __('Success'), [
                'app_stage' => env('APP_STAGE'),
                'app_url' => env('APP_URL')
            ]);
        } catch (\Exception $e) {
            $this->write('API: CommonController::appStage()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
