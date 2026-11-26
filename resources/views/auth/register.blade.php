@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <h1>Register</h1>

    <form action="{{ route('register.submit') }}" method="POST">
        @csrf

        <x-form-input name="name" label="Name" required />
        <x-form-input name="email" label="Email" type="email" required />
        <x-form-input name="password" label="Password" type="password" required />
        <x-form-input name="password_confirmation" label="Confirm Password" type="password" required />

        <button type="submit" class="btn">Register</button>
        <a href="{{ route('login') }}">Already have an account?</a>
    </form>
@endsection
