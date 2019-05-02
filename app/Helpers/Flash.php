<?php
/**
 * Copyright (c) 2018. TripperSteer. All Rights Reserved.
 * This code is proprietary and the property of TripperSteer.
 */

/**
 * Created by PhpStorm.
 * User: yannick
 * Date: 2018-12-17
 * Time: 13:07
 */

namespace App\Helpers;




use Illuminate\Support\Facades\Session;

class Flash
{
    public static function push($key, $value, $title = null)
    {
        $values = collect(Session::get($key, []));
        $values->push([
            'body' => $value,
            'title' => title_case($title)
        ]);
        Session::flash($key, $values);
    }

    public static function get($key)
    {
        return Session::get($key);
    }
}