<?php

namespace App\Http\Controllers\API\Common;

use App\Http\Controllers\Controller;
use App\Models\Other\SinglePage;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PagesController extends Controller{
    use ResponseTrait, LogTrait;

    /**
     * Get privacy page
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function privacy(Request $request): JsonResponse{
        try {
            return $this->apiResponse('0000', __('Success'), SinglePage::where('id', 5)->first()->toArray());
        } catch (\Exception $e) {
            $this->write('API: PagesController::privacy()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Get terms page
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function terms(Request $request): JsonResponse{
        try {
            return $this->apiResponse('0000', __('Success'), SinglePage::where('id', 6)->first()->toArray());
        } catch (\Exception $e) {
            $this->write('API: PagesController::terms()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Get cookies page
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function cookies(Request $request): JsonResponse{
        try {
            return $this->apiResponse('0000', __('Success'), SinglePage::where('id', 7)->first()->toArray());
        } catch (\Exception $e) {
            $this->write('API: PagesController::cookies()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Get important numbers page
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function importantNumbers(Request $request): JsonResponse{
        try {
            return $this->apiResponse('0000', __('Success'), SinglePage::where('id', 21)->first()->toArray());
        } catch (\Exception $e) {
            $this->write('API: PagesController::importantNumbers()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5010', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
