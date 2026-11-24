<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::define('student-only', function (User $user) {
            return $user->isStudent();
        });

        Gate::define('institution-only', function (User $user) {
            return $user->isInstitution();
        });

        Gate::define('modify-course', function (User $user, Course $course) {
            return $user->isInstitution() && $user->id === $course->user_id;
        });
    }
}