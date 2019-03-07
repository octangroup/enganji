<?php

use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});


$factory->define(\App\SubCategory::class, function (Faker $faker) {
    return [
        'category_id'=> factory(\App\Category::class)->create()->id,
        'name' => $faker->name,
    ];
});

//$factory->define()

$factory->define(\App\Currency::class, function (Faker $faker){
   return [
       'name'=> $faker->name,
];
});

$factory->define(\App\Condition::class, function (Faker $faker){
    return [
        'name'=> $faker->name,
    ];
});
