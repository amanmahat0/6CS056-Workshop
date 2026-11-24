<x-layouts.app title="Register">
    <h1>Register</h1>

    <p>Who are you registering as?</p>

    <ul>
        <li><a href="{{ route('register.student') }}">I am a Student</a></li>
        <li><a href="{{ route('register.institution') }}">I am an Institution</a></li>
    </ul>

    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
</x-layouts.app>