@extends('auth.layouts.main')

@section('container')
    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        Reset Password
    </h1>
    @if (session()->has('loginFailed'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-800/25" role="alert">
            {{ session('loginFailed') }}
        </div>
    @endif
    <form action="{{ route('password.reset.post') }}" class="space-y-4 md:space-y-6" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="name@company.com" value="{{ old('email') }}">
            @error('email')
                <span class="text-red-600 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <div id="show_hide_password" class="relative">
                <input type="password" name="password" id="password" placeholder="••••••••"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <div class="absolute end-2.5 bottom-2.5">
                    <a class="cursor-pointer">
                        <i class="fa-regular fa-eye-slash"></i>
                    </a>
                </div>
            </div>
            @error('password')
                <span class="text-red-600 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password_confirmation"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
            <div id="show_hide_password_confirmation" class="relative">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <div class="absolute end-2.5 bottom-2.5">
                    <a class="cursor-pointer">
                        <i class="fa-regular fa-eye-slash"></i>
                    </a>
                </div>
            </div>
            @error('password_confirmation')
                <span class="text-red-600 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit"
            class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Reset Password
        </button>
        <div class="text-center">
            <a href="{{ route('login.index') }}" class="text-sm text-blue-600 underline">Kembali</a>
        </div>
    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
            $("#show_hide_password_confirmation a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password_confirmation input').attr("type") == "text") {
                    $('#show_hide_password_confirmation input').attr('type', 'password');
                    $('#show_hide_password_confirmation i').addClass("fa-eye-slash");
                    $('#show_hide_password_confirmation i').removeClass("fa-eye");
                } else if ($('#show_hide_password_confirmation input').attr("type") == "password") {
                    $('#show_hide_password_confirmation input').attr('type', 'text');
                    $('#show_hide_password_confirmation i').removeClass("fa-eye-slash");
                    $('#show_hide_password_confirmation i').addClass("fa-eye");
                }
            });
        });
    </script>
@endpush
