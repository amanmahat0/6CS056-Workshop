@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <x-page-header title="Edit Course" />

    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')

        @include('course._form')

        <button type="submit" class="btn">Update Course</button>
        <a href="{{ route('courses.show', $course) }}">Cancel</a>
    </form>
@endsection
