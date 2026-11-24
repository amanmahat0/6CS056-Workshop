<x-layouts.app title="My Account">
    <h1>My Account</h1>

    <h2>Login Details</h2>

    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ $user->role }}</p>

    <h2>Student Profile</h2>

    @if($student)
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Phone:</strong> {{ $student->phone }}</p>
        <p><strong>Address:</strong> {{ $student->address }}</p>
        <p><strong>Date of Birth:</strong> {{ $student->date_of_birth?->format('d M Y') }}</p>
        <p><strong>Age:</strong> {{ $student->age ?? 'Not available' }}</p>
    @else
        <p>No student profile is linked to this account.</p>
    @endif
</x-layouts.app>