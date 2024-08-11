@extends('layouts/main')

@section('container')
    <div class="grid grid-cols-3 md:grid-cols-6 gap-3">
        @forelse ($galleries as $index => $gallery)
            <div>
                <div>
                    <div class="relative shadow-md shadow-blue-900/50">
                        <img src="{{ asset('/storage/galleries/' . $gallery->image) }}" alt="{{ $gallery->description }}"
                            class="w-full">
                        <div class="ms-1 p-1 text-white rounded-sm drop-shadow-lg absolute bottom-0 text-xs">
                            <h1>{{ $gallery->description }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-sm">Tidak ada foto</div>
        @endforelse
    </div>
@endsection
