<x-layouts.app title="Login">
    <h1>Login</h1>

    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <x-form-input name="email" label="Email" type="email" />

        <x-form-input name="password" label="Password" type="password" />

        <button type="submit">Login</button>
    </form>

    <p>No account yet? <a href="{{ route('register') }}">Register</a></p>
</x-layouts.app>