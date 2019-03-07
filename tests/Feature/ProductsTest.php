<?php

namespace Tests\Feature;

use App\Currency;
use App\SubCategory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
//
use WithFaker,RefreshDatabase;
public function test_affiliate_upload_product(){

    $attributes=[
      'affiliate_id'=>$this->faker->randomNumber(2),
       'name'=>$this->faker->name,
       'quantity'=>$this->faker->randomNumber(2),
       'subcategory_id'=>factory(SubCategory::class)->create()->id,
       'currency_id'=>factory(Currency::class)->create()->id,
        ''
    ];
}

}
