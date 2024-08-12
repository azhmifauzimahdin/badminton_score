@extends('layouts/main')

@push('head')
    <style>
        .bg-image {
            position: relative;
        }

        .bg-image::after {
            content: "";
            background-image: url('storage/assets/badminton.png');
            background-size: auto 50%;
            background-repeat: no-repeat;
            background-position: center center;
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
        }
    </style>
@endpush

@section('container')
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @for ($i = 0; $i < $lengthGalleries; $i += 3)
            <div class="flex flex-col gap-4">
                @if (($i / 3) % 2 != 1)
                    <div class="bg-gray-400 rounded-lg flex-1 bg-image"></div>
                @endif
                @for ($j = $i; $j < $i + 3; $j++)
                    @if ($j < $lengthGalleries)
                        <div>
                            <img class="h-auto w-full rounded-lg" src="{{ $galleries[$j]?->image }}"
                                alt="{{ $galleries[$j]->description }}">
                        </div>
                    @endif
                @endfor
                @if (($i / 3) % 2 == 1)
                    <div class=" bg-gray-400 rounded-lg flex-1 bg-image"></div>
                @endif
            </div>
        @endfor
    </div>
@endsection
