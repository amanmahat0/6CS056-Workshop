@props(['title'])

<div class="page-header">
    <h1>{{ $title }}</h1>
    <div>{{ $slot }}</div>
</div>