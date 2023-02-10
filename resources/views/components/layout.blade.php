<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title ?? 'Thich Hoc' }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <header>
        <livewire:navbar />
    </header>
    <main class="main">{{ $slot }}</main>
    <footer class="text-center p-4 text-gray-600">
        Copyright &copy; {{ now()->year }} Thich Hoc. All rights reversed.
    </footer>
    @livewireScripts
</body>

</html>
