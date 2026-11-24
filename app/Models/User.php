<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    public function isInstitution(): bool
    {
        return $this->role === 'institution';
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }
}