<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{

    use RefreshDatabase;


    public function testDeactivate()
    {
        $product = factory(Product::class)->create(['status' => 1]);
        $this->assertEquals(1, $product->status);
        $product->deactivate();
        $product->refresh();
        $this->assertEquals(0, $product->status);
    }

    public function testActivate()
    {
        $product = factory(Product::class)->create(['status' => 0]);
        $this->assertEquals(0, $product->status);
        $product->activate();
        $product->refresh();
        $this->assertEquals(1, $product->status);
    }

    public function testIsService()
    {
        $product = factory(Product::class)->create(['is_service' => 0]);
        $this->assertFalse($product->isService());
        $product->is_service = 1;
        $product->save();
        $product->refresh();
        $this->assertTrue($product->isService());
    }

    public function testIsActive()
    {
        $product = factory(Product::class)->create(['status' => 1]);
        $this->assertTrue($product->isActive());
        $product->status = 0;
        $product->save();
        $product->refresh();
        $this->assertFalse($product->isActive());
    }
}
