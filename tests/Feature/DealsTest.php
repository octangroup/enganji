<?php

namespace Tests\Feature;

use App\Affiliate;
use App\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DealsTest extends TestCase
{
  Use RefreshDatabase,WithFaker;
  protected $affiliate;
   protected function setUp(): void
   {
       parent::setUp(); // TODO: Change the autogenerated stub
       $this->affiliate = factory(Affiliate::class)->create();
   }

   public function test_affiliate_can_add_deals(){

       $this->withoutExceptionHandling();
     $data = [
        'product_id'=>factory(Product::class)->create()->id,
        'price'=>$this->faker->randomNumber(),
        'begin_on'=>$this->faker->dateTime,
        'end_at'=>$this->faker->dateTime,
     ] ;
//
     $this->actingAs($this->affiliate,'affiliate')->post(action('Affiliate\DealsController@store'),$data)
         ->assertRedirect()->assertSessionHasNoErrors();
     $this->assertDatabaseHas('deals',$data);
   }


   public function test_affiliate_can_update_deals(){

   }

}
