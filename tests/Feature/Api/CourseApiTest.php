<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('supports the course API resource lifecycle', function () {
    $this->getJson('/api/courses')
        ->assertOk()
        ->assertJsonPath('data', []);

    $this->postJson('/api/courses', [
        'name' => 'Laravel Fundamentals',
        'description' => 'Learn the Laravel framework',
        'duration' => 8,
        'fee' => 249.50,
        'difficulty' => 'Beginner',
        'is_active' => true,
    ])
        ->assertCreated()
        ->assertJsonPath('data.name', 'Laravel Fundamentals')
        ->assertJsonPath('data.is_active', true);

    $this->getJson('/api/courses')
        ->assertOk()
        ->assertJsonCount(1, 'data');

    $this->getJson('/api/courses/1')
        ->assertOk()
        ->assertJsonPath('data.difficulty', 'Beginner');

    $this->putJson('/api/courses/1', [
        'name' => 'Laravel Advanced',
        'description' => 'Build advanced Laravel applications',
        'duration' => 10,
        'fee' => 399.00,
        'difficulty' => 'Advanced',
        'is_active' => false,
    ])
        ->assertOk()
        ->assertJsonPath('data.name', 'Laravel Advanced')
        ->assertJsonPath('data.is_active', false);

    $this->deleteJson('/api/courses/1')->assertNoContent();
    $this->getJson('/api/courses/1')->assertNotFound();
});

it('returns validation errors for invalid course input', function () {
    $this->postJson('/api/courses', [])
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['name', 'description', 'duration', 'fee', 'difficulty', 'is_active']);
});
