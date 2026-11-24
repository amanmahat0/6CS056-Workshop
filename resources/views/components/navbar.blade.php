<nav>
    <a href="{{ url('/') }}"><strong>Training Institute</strong></a>

    @auth
        |
        <a href="{{ route('courses.index') }}">Browse Courses</a>

        @can('student-only')
            |
            <a href="{{ route('account.show') }}">My Account</a>
        @endcan

        @can('institution-only')
            |
            <a href="{{ route('students.index') }}">Students</a>
        @endcan

        |
        {{ auth()->user()->name }} ({{ auth()->user()->role }})

        <form action="{{ route('logout') }}" method="POST" style="display:inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth

    @guest
        |
        <a href="{{ route('login') }}">Login</a>
        |
        <a href="{{ route('register') }}">Register</a>
    @endguest
</nav>
<hr>