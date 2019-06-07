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
        'product_id'=>factory(\App\Product::class)->create(),
        'price'=>$faker->randomNumber(3),
        'begin_on'=>$faker->dateTime,
        'end_at'=>$faker->dateTime,

    ];
});


//wish list factory
$factory->define(\App\WishList::class, function (Faker $faker) {
    return [
        'user_id'=>factory(\App\User::class)->create(),
        'product_id'=>factory(\App\Product::class)->create(),

    ];
});

//reviews factory
$factory->define(\App\Review::class, function (Faker $faker) {
    return [
        'user_id'=>factory(\App\User::class)->create(),
        'product_id'=>factory(\App\Product::class)->create(),
        'rating'=>$faker->randomNumber(3),
        'title'=>$faker->text,
        'body'=>$faker->text,

    ];
});



//cart's factory
$factory->define(\App\Cart::class, function (Faker $faker) {
    return [
        'user_id'=>factory(\App\User::class)->create(),
        'product_id'=>factory(\App\Product::class)->create(),
        'quantity'=>1,

    ];
});


//conversation's factory
$factory->define(\App\Conversation::class, function (Faker $faker) {
    return [
        'user_id'=>factory(\App\User::class)->create(),
        'affiliate_id'=>factory(\App\Affiliate::class)->create(),

    ];
});


//message"s factory
$factory->define(\App\Message::class, function (Faker $faker) {
    return [
        'conversation_id'=>factory(\App\Conversation::class)->create(),
        'product_id'=>factory(\App\Product::class)->create(),
        'body'=>$faker->text,
        'from_affiliate'=>0,

    ];
});




/*
 * factory of condition's class
 */
$factory->define(\App\Role::class, function (Faker $faker){
    return [
        'name'=> $faker->name,
        'slug'=>$faker->slug,
    ];
});