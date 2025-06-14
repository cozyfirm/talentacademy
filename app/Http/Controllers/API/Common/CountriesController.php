<?php

namespace App\Http\Controllers\API\Common;

use App\Http\Controllers\Controller;
use App\Models\Models\Core\Country;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CountriesController extends Controller{
    use ResponseTrait, LogTrait;

    /**
     * Fetch all countries
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request): JsonResponse{
        try {
            return $this->apiResponse('0000', __('Success'), Country::get(['id', 'name', 'name_ba', 'code', 'flag'])->toArray());
        } catch (\Exception $e) {
            $this->write('API: CountriesController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    public function fetchByID(Request $request): JsonResponse{
        try {
            if(empty($request->country_id)) return $this->apiResponse('6001', __('ID države nije validan'));

            return $this->apiResponse('0000', __('Success'), Country::where('id', '=', $request->country_id)->first(['id', 'name', 'name_ba', 'code', 'flag'])->toArray());
        } catch (\Exception $e) {
            $this->write('API: CountriesController::fetchByID()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
