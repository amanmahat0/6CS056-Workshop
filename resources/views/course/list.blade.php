<x-layouts.app title="Courses">
    <h1>Browse Courses</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Institution</th>
                <th>Duration</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->institution?->name ?? 'Unknown' }}</td>
                    <td>{{ $course->duration }} weeks</td>
                    <td>{{ number_format($course->fee, 2) }}</td>
                    <td>{{ $course->difficulty }}</td>
                    <td>
                        <a href="{{ route('courses.show', $course) }}">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layouts.app>