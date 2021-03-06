<?php

namespace Tests\Integrated;


use App\Models\Affiliate;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Product;
use App\Models\User;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChatTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected $user;
    protected $affiliate;
    protected $product;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->affiliate = factory(Affiliate::class)->create();
        $this->product = factory(Product::class)->create(['affiliate_id' => $this->affiliate->id]);
    }

    public function test_user_can_send_message()
    {

        $attributes = [
            'body' => $this->faker->text,
            'product_id' => $this->product->id,
            'affiliate_id' => $this->affiliate->id,
        ];
        $this->assertDatabaseMissing('conversations', [
            'affiliate_id' => $this->affiliate->id
        ]);
        $this->assertDatabaseMissing('messages', [
            'product_id' => $this->product->id,
        ]);

        $this->actingAs($this->user)->post(action('ChatsController@send'), $attributes)
            ->assertSessionHasNoErrors();
        $this->assertDatabaseHas('conversations', [
            'affiliate_id' => $this->affiliate->id
        ]);
        $this->assertDatabaseHas('messages', [
            'product_id' => $this->product->id,
        ]);

    }

    public function test_user_can_fetch_conversation()
    {
        $conversation = factory(Conversation::class)->create(['user_id' => $this->user->id, 'affiliate_id' => $this->affiliate->id]);
        $this->actingAs($this->user)->get(action('ChatsController@fetchConversations'))
            ->assertSee($conversation->affiliate_id);

    }


    public function test_user_can_retrieve_messages()
    {
        $conversation = factory(Conversation::class)->create(['affiliate_id' => $this->affiliate->id, 'user_id' => $this->user->id]);
        $message = factory(Message::class)->create(['conversation_id' => $conversation->id]);

        $this->actingAs($this->user)->get(action('ChatsController@fetchMessages', ['conversation_id' => $conversation->id]))
            ->assertSuccessful()
            ->assertSee($message->body);
    }
}
