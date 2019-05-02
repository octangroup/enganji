<?php


namespace App\Helpers;


class RatingCategoryCalculator
{

    public static function handle(float $rating)
    {
        if ($rating >= 4.5) {
            return 'Excellent';
        }
        if ($rating >= 4) {
            return 'Very Good';
        }
        if ($rating >= 3.5) {
            return 'Good';
        }
        if ($rating >= 3) {
            return 'Fair';
        }
        if ($rating >= 2) {
            return 'Bad';
        }
        if ($rating > 0) {
            return 'Worse';
        }
        return 'No Rating';
    }
}
