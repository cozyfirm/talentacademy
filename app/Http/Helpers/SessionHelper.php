<?php

use App\Models\Programs\SessionPresenter;

class SessionHelper{
    public static function isPresenterSelected($session_id, $presenter_id): bool | int{
        return  SessionPresenter::where('session_id', '=', $session_id)->where('presenter_id', '=', $presenter_id)->count();
    }
}
