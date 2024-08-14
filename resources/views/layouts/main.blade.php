<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('head')
    <link rel="shortcut icon" href="{{ asset('storage/assets/logo.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
    <style>
        .bg-blob {
            background-image: url({{ asset('storage/assets/blob.svg') }});
            background-size: 100% 100%;
        }

        .bg-blob-white {
            background-image: url({{ asset('storage/assets/blobWhite.svg') }});
            background-size: 100% 100%;
        }
    </style>
</head>

<body class="h-full">
    @include('layouts.navbar')
    <div class="container mx-auto p-4 min-h-screen text-gray-800 bg-[#f0f0f0]">
        @yield('container')
    </div>
    @stack('script')
</body>

</html>
