<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $institutionA = new User([
            'name'     => 'Himalayan Training Institute',
            'email'    => 'institution1@institute.test',
            'password' => 'password123',
            'phone'    => '9800000001',
            'address'  => 'Kathmandu',
        ]);
        $institutionA->role = 'institution';
        $institutionA->save();

        $institutionB = new User([
            'name'     => 'Everest Academy',
            'email'    => 'institution2@institute.test',
            'password' => 'password123',
            'phone'    => '9800000002',
            'address'  => 'Pokhara',
        ]);
        $institutionB->role = 'institution';
        $institutionB->save();

        $studentUser = User::create([
            'name'     => 'Test Student',
            'email'    => 'student1@institute.test',
            'password' => 'password123',
        ]);

        $studentUser->student()->create([
            'name'  => 'Test Student',
            'email' => 'student1@institute.test',
            'phone' => '9800000003',
        ]);

        Course::whereNull('user_id')->update(['user_id' => $institutionA->id]);
    }
}