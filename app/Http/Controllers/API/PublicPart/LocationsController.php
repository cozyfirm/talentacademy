<?php

namespace App\Http\Controllers\API\PublicPart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Other\Location;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationsController extends Controller{
    use ResponseTrait, LogTrait;

    /* Number of samples returned with query */
    protected int $_number_of_samples = 10;

    /**
     * Fetch all locations
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request): JsonResponse{
        try{
            if(isset($request->number)) $this->_number_of_samples = $request->number;

            $locations = Location::where('active', '=', 1)
                ->with('countryRel:id,name_ba,code,flag')
                ->select('id', 'title', 'address', 'city', 'country', 'location', 'public');
            $locations = Filters::filter($locations, $this->_number_of_samples);

            return $this->apiResponse('0000', 'Success', [
                'locations' => $locations->toArray()
            ]);
        }catch (\Exception $e) {
            $this->write('API: LocationsController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5300', __('Desila se greška. Molimo da kontaktirate administratore'));
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
            if(!isset($request->id)) return $this->apiResponse('5311', __('Nepoznata lokacija'));

            $location = Location::where('id', '=', $request->id)
                ->with('countryRel:id,name_ba,code,flag')
                ->first(['id', 'title', 'address', 'city', 'country', 'location', 'map_img', 'main_img', 'cover_img', 'description', 'public']);

            return $this->apiResponse('0000', 'Success', [
                'location' => $location->toArray()
            ]);
        }catch (\Exception $e) {
            $this->write('API: LocationsController::preview()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5310', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
