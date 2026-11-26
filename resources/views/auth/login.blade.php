@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <x-form-input name="email" label="Email" type="email" required />
        <x-form-input name="password" label="Password" type="password" required />

        <button type="submit" class="btn">Login</button>
        <a href="{{ route('register') }}">Create an account</a>
    </form>
@endsection
