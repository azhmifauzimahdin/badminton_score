@extends('layouts.main')

@push('head')
    <style>
        .bg-image {
            position: relative;
        }

        .bg-image::before {
            content: "";
            background-image: url('storage/assets/badminton.png');
            background-size: 60%;
            background-repeat: no-repeat;
            background-position: center center;
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            opacity: 0.15;
        }
    </style>
@endpush

@section('container')
    <h1 class="text-lg font-medium mb-3">Live Match</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="bg-purple-950 text-white p-4 rounded-tl-lg rounded-br-lg rounded-tr-[30px] rounded-bl-[30px] bg-image">
            <h2 class="text-base">Badminton</h2>
            <p class="text-sm opacity-80 mb-4">Pertandingan 1 | Mertakanda Hall</p>
            <div class="grid grid-cols-3">
                <div>
                    <img src="{{ asset('storage/player/player1.png') }}" alt="Player 1"
                        class="aspect-[3/4] w-3/4 mx-auto mb-1">
                    <p class="text-center font-medium">ICA</p>
                </div>
                <div class="p-3">
                    <div class="text-center mb-1">
                        <span
                            class="border-solid border-2 border-green-600 rounded-full text-center px-3 text-sm bg-green-600/25 text-green-600">2</span>
                    </div>
                    <div class="text-xs flex justify-between px-2">
                        <span>1</span>
                        <span>SET</span>
                        <span>1</span>
                    </div>
                    <div class="text-2xl font-medium flex justify-between">
                        <div>23</div>
                        <div>:</div>
                        <div>18</div>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('storage/player/player2.png') }}" alt="Player 1"
                        class="aspect-[3/4] w-3/4 mx-auto mb-1">
                    <p class="text-center font-medium">Sidul</p>
                </div>
            </div>
        </div>
    </div>
@endsection
