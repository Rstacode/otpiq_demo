<!DOCTYPE html>
<html lang="en">

<head>
    <x-meta :meta="$meta ?? null" />
    <meta http-equiv="Content-Security-Policy" content="">
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('img/logo.svg') }}" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="flex flex-col min-h-screen bg-gradient-to-t from-brand-400 to-white">
    <x-notifications position="bottom-start" z-index="z-[999999]" />
    <x-dialog z-index="z-[999999]" align='center' />
    <main class="flex-grow p-5 xl:p-8 container">@yield('content')</main>
    @livewireScripts
</body>

</html>
