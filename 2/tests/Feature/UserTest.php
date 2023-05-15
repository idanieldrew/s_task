<?php

uses(\Tests\CustomTest::class, \Illuminate\Foundation\Testing\RefreshDatabase::class);

it('store_user', function () {
    $this->post(route('user.store'), [
        'name' => 'test',
        'email' => 'test@test.com',
        'password' => 'password'
    ])->assertCreated();
});

it('incorrect_store_user', function () {
    $this->post(route('user.store', [
            'name' => '',
            'email' => '',
            'password' => ''
        ])
    )->assertStatus(422);
});
