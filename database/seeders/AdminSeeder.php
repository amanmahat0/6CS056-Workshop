<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrNew(['email' => 'admin@example.com']);

        $admin->forceFill([
            'name'     => 'Admin',
            'password' => 'Admin@123',   // hashed by the model cast
            'role'     => 'admin',
        ])->save();
    }
}