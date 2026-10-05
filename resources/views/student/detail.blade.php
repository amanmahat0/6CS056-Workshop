@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
    <x-page-header title="Student Details">
        <a href="{{ route('students.edit', $student) }}" class="btn">Edit Student</a>
    </x-page-header>

    <x-detail-row label="ID">{{ $student->id }}</x-detail-row>
    <x-detail-row label="Name">{{ $student->name }}</x-detail-row>
    <x-detail-row label="Email">{{ $student->email }}</x-detail-row>
    <x-detail-row label="Phone">{{ $student->phone }}</x-detail-row>
    <x-detail-row label="Address">{{ $student->address }}</x-detail-row>
    <x-detail-row label="Date of Birth">{{ $student->date_of_birth?->format('d M Y') }}</x-detail-row>
    <x-detail-row label="Age">{{ $student->age ?? 'Not available' }}</x-detail-row>

    <a href="{{ route('students.index') }}">Back to Students</a>
@endsection