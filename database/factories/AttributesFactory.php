<?php

use Faker\Generator as Faker;
/*
 * factory of category's class
 */
$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

/*
 * factory of subcategory's class
 */

$factory->define(\App\SubCategory::class, function (Faker $faker) {
    return [
        'category_id'=> factory(\App\Category::class)->create()->id,
        'name' => $faker->name,
    ];
});

/*
 * factory of currency's class
 */
$factory->define(\App\Currency::class, function (Faker $faker){
   return [
       'name'=> $faker->name,
];
});

/*
 * factory of condition's class
 */
$factory->define(\App\Condition::class, function (Faker $faker){
    return [
        'name'=> $faker->name,
    ];
});
/*
 * factory of brand's class
 */
$factory->define(\App\Brand::class, function (Faker $faker){
    return [
        'name'=> $faker->name,
    ];
});
