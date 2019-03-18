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
/*
 * factory of product's class
 */
$factory->define(\App\Product::class, function (Faker $faker){
    return [
        'affiliate_id'=>factory(\App\Affiliate::class)->create(),
        'subcategory_id'=>factory(\App\SubCategory::class)->create(),
        'currency_id'=>factory(\App\Currency::class)->create(),
        'brand_id'=>factory(\App\Brand::class)->create(),
        'condition_id'=>factory(\App\Condition::class)->create(),
        'name'=> $faker->name,
        'quantity'=>$faker->randomNumber(2),
        'price'=>$faker->randomNumber(5),
        'color'=>$faker->word,
        'size'=>$faker->word,
        'status'=>$faker->boolean,
        'description'=>$faker->text,
    ];
});


//deals factory
$factory->define(\App\Deal::class, function (Faker $faker) {
    return [

    ];
});
