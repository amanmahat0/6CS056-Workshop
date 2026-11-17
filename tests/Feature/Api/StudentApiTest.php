<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('supports the student API resource lifecycle', function () {
    $this->getJson('/api/students')
        ->assertOk()
        ->assertJsonPath('data', []);

    $this->postJson('/api/students', [
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.test',
        'phone' => '1234567890',
        'address' => 'London',
        'date_of_birth' => '1815-12-10',
    ])
        ->assertCreated()
        ->assertJsonPath('data.name', 'Ada Lovelace')
        ->assertJsonPath('data.age', now()->year - 1815 - (now()->format('md') < '1210' ? 1 : 0));

    $this->getJson('/api/students')
        ->assertOk()
        ->assertJsonCount(1, 'data');

    $this->getJson('/api/students/1')
        ->assertOk()
        ->assertJsonPath('data.email', 'ada@example.test');

    $this->putJson('/api/students/1', [
        'name' => 'Ada Byron',
        'email' => 'ada@example.test',
        'phone' => '1234567890',
        'address' => 'London',
        'date_of_birth' => '1815-12-10',
    ])
        ->assertOk()
        ->assertJsonPath('data.name', 'Ada Byron');

    $this->deleteJson('/api/students/1')->assertNoContent();
    $this->getJson('/api/students/1')->assertNotFound();
});

it('returns validation errors for invalid student input', function () {
    $this->postJson('/api/students', [])
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['name', 'email', 'phone']);
});
