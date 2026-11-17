@php
    $course = $course ?? new \App\Models\Course();
    $difficulties = ['Beginner', 'Intermediate', 'Advanced'];
@endphp

<x-form-input name="name" label="Course Name" :value="$course->name" />

<x-form-textarea name="description" label="Description" :value="$course->description" />

<x-form-input name="duration" label="Duration (weeks)" type="number" min="1" :value="$course->duration" />

<x-form-input name="fee" label="Fee" type="number" min="0" step="0.01" :value="$course->fee" />

<x-form-select name="difficulty" label="Difficulty" :options="$difficulties" :selected="$course->difficulty" />

<x-form-checkbox name="is_active" label="Active" :checked="(bool) $course->is_active" />
