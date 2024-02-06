<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\OrderShipped;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_orders_can_be_shipped() {
        Event::fake();

        Event::assertDispatched(OrderShipped::class);
    }
}
