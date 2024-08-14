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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/0546d73a27.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    <div class="antialiased min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('dashboard.layouts.navbar')
        @include('dashboard.layouts.sidebar')
        <main class="p-4 md:ml-64 h-auto pt-16">
            <div class="flex flex-col gap-1 md:flex-row md:justify-between md:items-center mb-4">
                <div class="font-medium text-2xl text-gray-900">{{ $title }}</div>
                <div class="text-xs md:text-sm"><span class="text-blue-700">Home</span> / {{ $title }}</div>
            </div>
            @yield('container')
        </main>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    @stack('script')
</body>

</html>
