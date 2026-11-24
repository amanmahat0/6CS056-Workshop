<x-layouts.app title="Institution Registration">
    <h1>Institution Registration</h1>

    <form action="{{ route('register.institution.store') }}" method="POST">
        @csrf

        <x-form-input name="name" label="Institution Name" />

        <x-form-input name="email" label="Email" type="email" />

        <x-form-input name="phone" label="Phone" />

        <x-form-textarea name="address" label="Address" />

        <x-form-input name="password" label="Password" type="password" />

        <x-form-input name="password_confirmation" label="Confirm Password" type="password" />

        <button type="submit">Register as Institution</button>
    </form>

    <p><a href="{{ route('register') }}">Back</a></p>
</x-layouts.app>