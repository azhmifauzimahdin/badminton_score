<!DOCTYPE html>
<html lang="en">

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

<body>
    @include('dashboard.layouts.navbar')
    <div class="container mx-auto p-4 min-h-screen text-gray-800 bg-[#f0f0f0]">
        @yield('container')
    </div>

    @stack('script')
</body>

</html>
