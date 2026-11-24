@props(['title' => 'Home'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Training Institute</title>
</head>
<body>
    <x-navbar />

    <x-alert />

    {{ $slot }}

    <x-footer />
</body>
</html>
