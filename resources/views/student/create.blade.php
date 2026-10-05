@extends('layouts.app')

@section('title', 'Create Student')

@section('content')
    <x-page-header title="Create Student" />

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        @include('student._form')

        <button type="submit" class="btn">Create Student</button>
        <a href="{{ route('students.index') }}">Cancel</a>
    </form>
@endsection