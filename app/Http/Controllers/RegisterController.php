<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function choose()
    {
        return view('auth.register');
    }

    public function showStudentForm()
    {
        return view('auth.register-student');
    }

    public function registerStudent(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:users,email|unique:students,email',
            'password'      => 'required|string|min:8|confirmed',
            'phone'         => 'required|string|max:20',
            'address'       => 'nullable|string|max:500',
            'date_of_birth' => 'nullable|date',
        ]);

        $user = DB::transaction(function () use ($validated) {
            $user = new User([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => $validated['password'],
            ]);
            $user->role = 'student';
            $user->save();

            $user->student()->create([
                'name'          => $validated['name'],
                'email'         => $validated['email'],
                'phone'         => $validated['phone'],
                'address'       => $validated['address'] ?? null,
                'date_of_birth' => $validated['date_of_birth'] ?? null,
            ]);

            return $user;
        });

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('account.show')
            ->with('success', "Welcome, {$user->name}! Your student account has been created.");
    }

    public function showInstitutionForm()
    {
        return view('auth.register-institution');
    }

    public function registerInstitution(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone'    => 'required|string|max:20',
            'address'  => 'required|string|max:500',
        ]);

        $user = new User($validated);
        $user->role = 'institution';
        $user->save();

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('courses.index')
            ->with('success', "Welcome, {$user->name}! Your institution account has been created.");
    }
}