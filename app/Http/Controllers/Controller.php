<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{
    use AuthorizesRequests, ValidatesRequests;

    public function appTimePassed($date = null): bool{
        return Carbon::now() > Carbon::parse('2024-06-04 01:00:00');
    }
}
