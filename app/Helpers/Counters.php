<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/18/2019
 * Time: 4:58 PM
 */

namespace App\Helpers;


use App\View;
use Counter;

class Counters
{

    public static function count($identifier,$id)
    {
        $available = Counter::show($identifier, $id);
        $count = Counter::showAndCount($identifier, $id);
        if ($count > $available) {
            $add = new View();
            $add->viewable_type = Product::class;
            $add->viewable_id = $id;
            $add->save();
        }
        return $count;

    }

}
