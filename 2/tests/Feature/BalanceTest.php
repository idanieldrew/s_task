<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\CustomTest;

class BalanceTest extends CustomTest
{
    use RefreshDatabase;

    private function init()
    {
        $this->post(route('bank.store'), [
            'name' => 'A'
        ]);

        $this->post(route('user.store'), [
            'name' => 'test',
            'email' => 'email@email.com',
            'password' => 'password'
        ]);

        \Laravel\Sanctum\Sanctum::actingAs(\App\Models\User::first());
    }

    /** @test */
    public function show_balance()
    {
        $this->init();
        $this->get(route('bank.show', 'a'))
            ->assertSee('50')
            ->assertOk();
    }

    /** @test */
    public function show_balance_with_fake_request()
    {
        $this->init();

        Http::fake([
            route('bank.show', 'a') => Http::response(
                [
                    'status' => 'success',
                    'data' => '50',
                    'message' => 'success get val',
                    'code' => '200'
                ]
            )
        ]);
        $this->get(route('bank.show', 'a'))
            ->assertSee(50)
            ->assertOk();
    }
}
