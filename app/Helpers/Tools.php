<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/6/2019
 * Time: 7:09 PM
 */

namespace App\Helpers;


class Tools
{
    public static function endDateCalculator(int $period, string $period_type)
    {
        switch ($period_type) {
            case 'month':
                return now()->addMonths($period);
            case 'days':
               return now()->addDays($period);
            case 'years':
                return now()->addYears($period);
            case 'weeks':
               return now()->addWeeks($period);
        }
        return null;
    }
}