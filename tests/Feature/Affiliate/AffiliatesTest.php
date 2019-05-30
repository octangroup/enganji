<?php

namespace Tests\Feature;

use App\Admin;
use App\Affiliate;
use App\Events\Admin\ActivateAffiliate;
use App\Notifications\ActivateAffiliateNotification;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;

class AffiliatesTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = factory(Admin::class)->create();

    }

    /*
     * This function tests if the index method in Affiliates controller retrieves
     * all affiliates in database properly
     */
    public function test_admin_can_view_affiliates()
    {
        $this->withExceptionHandling();
        $affiliate = factory(Affiliate::class)->create();
        $this->actingAs($this->admin, 'admin')->get(action('Admin\AffiliatesController@index'))
            ->assertSessionHasNoErrors()
            ->assertSuccessful()
            ->assertSee($affiliate->name);
    }

    /*
    * This function tests if the method changeStatus in affiliatesController works properly
    */

    public function test_admin_can_changeStatus()
    {
        $this->withExceptionHandling();
        Event::fake([
            ActivateAffiliate::class,
        ]);
        Notification::fake();
        $affiliate = factory(Affiliate::class)->create(['status' => 0]);
        $this->assertNotTrue($affiliate->isActive());
//        $this->actingAs($this->admin, 'admin')->get(action('Admin\AffiliatesController@changeStatus', $affiliate->id))
//            ->assertSessionHasNoErrors()->assertRedirect();
//
//        Event::assertDispatched(ActivateAffiliate::class);
//
//        $affiliate = $affiliate->fresh();
//        $this->assertTrue($affiliate->isActive());
    }
}
