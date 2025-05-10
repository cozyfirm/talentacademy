<?php

namespace App\Http\Controllers;

use App\Traits\Common\CommonTrait;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{
    use AuthorizesRequests, ValidatesRequests, CommonTrait;

    public function appTimePassed($date = null): bool{
        return Carbon::now() > Carbon::parse($this->getSeasonData('app_date') . ' 06:00:00');
    }
}
