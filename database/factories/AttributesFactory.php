<?php

use Faker\Generator as Faker;
/*
 * factory of category's class
 */
$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

/*
 * factory of subcategory's class
 */

$factory->define(\App\Models\SubCategory::class, function (Faker $faker) {
    return [
        'category_id'=> factory(\App\Models\Category::class)->create()->id,
        'name' => $faker->name,
    ];
});

/*
 * factory of currency's class
 */
$factory->define(\App\Models\Currency::class, function (Faker $faker){
   return [
       'name'=> $faker->name,
];
});

/*
 * factory of condition's class
 */
$factory->define(\App\Models\Condition::class, function (Faker $faker){
    return [
        'name'=> $faker->name,
    ];
});
/*
 * factory of brand's class
 */
$factory->define(\App\Models\Brand::class, function (Faker $faker){
    return [
        'name'=> $faker->name,
    ];
});
/*
 * factory of product's class
 */
$factory->define(\App\Models\Product::class, function (Faker $faker){
    return [
        'affiliate_id'=>factory(\App\Models\Affiliate::class)->create(),
        'subcategory_id'=>factory(\App\Models\SubCategory::class)->create(),
        'currency_id'=>factory(\App\Models\Currency::class)->create(),
        'brand_id'=>factory(\App\Models\Brand::class)->create(),
        'condition_id'=>factory(\App\Models\Condition::class)->create(),
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
$factory->define(\App\Models\Deal::class, function (Faker $faker) {
    return [
        'product_id'=>factory(\App\Models\Product::class)->create(),
        'price'=>$faker->randomNumber(3),
        'begin_on'=>$faker->dateTime,
        'end_at'=>$faker->dateTime,

    ];
});


//wish list factory
$factory->define(\App\Models\WishList::class, function (Faker $faker) {
    return [
        'user_id'=>factory(\App\Models\User::class)->create(),
        'product_id'=>factory(\App\Models\Product::class)->create(),

    ];
});

//reviews factory
$factory->define(\App\Models\Review::class, function (Faker $faker) {
    return [
        'user_id'=>factory(\App\Models\User::class)->create(),
        'product_id'=>factory(\App\Models\Product::class)->create(),
        'rating'=>$faker->randomNumber(3),
        'title'=>$faker->text,
        'body'=>$faker->text,

    ];
});



//cart's factory
$factory->define(\App\Models\Cart::class, function (Faker $faker) {
    return [
        'user_id'=>factory(\App\Models\User::class)->create(),
        'product_id'=>factory(\App\Models\Product::class)->create(),
        'quantity'=>1,

    ];
});


//conversation's factory
$factory->define(\App\Models\Conversation::class, function (Faker $faker) {
    return [
        'user_id'=>factory(\App\Models\User::class)->create(),
        'affiliate_id'=>factory(\App\Models\Affiliate::class)->create(),

    ];
});


//message"s factory
$factory->define(\App\Models\Message::class, function (Faker $faker) {
    return [
        'conversation_id'=>factory(\App\Models\Conversation::class)->create(),
        'product_id'=>factory(\App\Models\Product::class)->create(),
        'body'=>$faker->text,
        'from_affiliate'=>0,

    ];
});




/*
 * factory of condition's class
 */
$factory->define(\App\Models\Role::class, function (Faker $faker){
    return [
        'name'=> $faker->name,
        'slug'=>$faker->slug,
    ];
});
