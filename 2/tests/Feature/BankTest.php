<?php

uses(\Tests\CustomTest::class, \Illuminate\Foundation\Testing\RefreshDatabase::class);

it('store_bank', function () {
    $this->post(route('bank.store'), [
        'name' => 'A'
    ])->assertCreated();

    $this->assertDatabaseHas('banks', [
        'slug' => 'a'
    ]);
});

it('incorrect_store_bank', function () {
    $this->post(route('bank.store'), [
        'name' => ''
    ])->assertStatus(422);

    $this->assertDatabaseMissing('banks', [
        'slug' => 'a'
    ]);
});

/*it('show_balance', function () {
    $this->withoutExceptionHandling();
    $this->post(route('bank.store'), [
        'name' => 'A'
    ]);

    $this->post(route('bank.store'), [
        'name' => 'B'
    ]);

    $this->post(route('bank.store'), [
        'name' => 'C'
    ]);

    $this->post(route('user.store'), [
        'name' => 'test',
        'email' => 'email@email.com',
        'password' => 'password'
    ]);

    \Laravel\Sanctum\Sanctum::actingAs(\App\Models\User::first());

    $this->get(route('bank.show', 'a'))
        ->assertSee('50');
});*/
