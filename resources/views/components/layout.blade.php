<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Loggher' }}</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-[#071013] min-h-screen flex flex-col">

    {{-- HEADER --}}
    <x-header />

    {{-- MAIN (canvas claro) --}}
    <main class="flex-1 bg-[#fde8e9] text-[#071013]">
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    <x-footer />

</body>
</html>
