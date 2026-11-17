@extends('layouts.app')

@section('title', 'Course Details')

@section('content')
    <x-page-header title="Course Details">
        <a href="{{ route('courses.edit', $course) }}" class="btn">Edit Course</a>
    </x-page-header>

    <x-detail-row label="ID">{{ $course->id }}</x-detail-row>
    <x-detail-row label="Name">{{ $course->name }}</x-detail-row>
    <x-detail-row label="Description">{{ $course->description }}</x-detail-row>
    <x-detail-row label="Duration">{{ $course->duration }} weeks</x-detail-row>
    <x-detail-row label="Fee">{{ number_format((float) $course->fee, 2) }}</x-detail-row>
    <x-detail-row label="Difficulty">{{ $course->difficulty }}</x-detail-row>
    <x-detail-row label="Active">{{ $course->is_active ? 'Yes' : 'No' }}</x-detail-row>

    <a href="{{ route('courses.index') }}">Back to Courses</a>
@endsection
