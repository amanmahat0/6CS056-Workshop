<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AccountController extends Controller
{
    public function show(Request $request)
    {
        Gate::authorize('student-only');

        $user = $request->user();

        return view('account.show', [
            'user'    => $user,
            'student' => $user->student,
        ]);
    }
}