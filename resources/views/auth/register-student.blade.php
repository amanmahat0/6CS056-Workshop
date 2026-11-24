<x-layouts.app title="Student Registration">
    <h1>Student Registration</h1>

    <form action="{{ route('register.student.store') }}" method="POST">
        @csrf

        <x-form-input name="name" label="Full Name" />

        <x-form-input name="email" label="Email" type="email" />

        <x-form-input name="phone" label="Phone" />

        <x-form-textarea name="address" label="Address" />

        <x-form-input name="date_of_birth" label="Date of Birth" type="date" />

        <x-form-input name="password" label="Password" type="password" />

        <x-form-input name="password_confirmation" label="Confirm Password" type="password" />

        <button type="submit">Register as Student</button>
    </form>

    <p><a href="{{ route('register') }}">Back</a></p>
</x-layouts.app>