@extends('layouts.main')

@section('container')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        @forelse ($fights as $fight)
            <div class="w-full bg-white p-4 mb-3 rounded-lg shadow-sm border border-slate-500/20">
                <p class="text-sm opacity-80 mb-4 text-center">{{ $fight->venue }} [Court {{ $fight->court }}] |
                    {{ \Carbon\Carbon::parse($fight->startdate)->format('H:i') }} WIB</p>
                <div class="grid grid-cols-3">
                    <div class="flex flex-col">
                        <div class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob">
                            <img src="{{ asset('storage/player/' . $fight->playerone->image) }}"
                                alt="{{ $fight->playerone->name }}" class="aspect-[3/4] w-3/4 mx-auto mb-1">
                        </div>
                        <p class="text-center font-medium">{{ $fight->playerone->name }}</p>
                        @if ($fight->setfight->skorplayerone > $fight->setfight->skorplayertwo)
                            <div
                                class="mx-auto mt-2 text-xs text-green-500 bg-green-500/20 py-1 px-2 border-2 border-green-500 rounded-full">
                                Menang</div>
                        @else
                            <div
                                class="mx-auto mt-2 text-xs text-red-500 bg-red-500/20 py-1 px-2 border-2 border-red-500 rounded-full">
                                Kalah</div>
                        @endif
                    </div>
                    <div>
                        <div class="text-center font-semibold text-blue-900 text-3xl py-2">
                            {{ $fight->setfight->skorplayerone }}
                            :
                            {{ $fight->setfight->skorplayertwo }}
                        </div>
                        @foreach ($fight->skors as $skor)
                            <div class="grid grid-cols-5 text-center text-sm border-y ">
                                <div class="col-span-1">{{ $skor->skorplayerone }}</div>
                                <div class="col-span-3 text-blue-900 font-semibold">SET {{ $skor->set }}</div>
                                <div class="col-span-1">{{ $skor->skorplayertwo }}</div>
                            </div>
                        @endforeach

                    </div>
                    <div class="flex flex-col">
                        <div class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob">
                            <img src="{{ asset('storage/player/' . $fight->playertwo->image) }}"
                                alt="{{ $fight->playertwo->name }}" class="aspect-[3/4] w-3/4 mx-auto mb-1">
                        </div>
                        <p class="text-center font-medium">{{ $fight->playertwo->name }}</p>
                        @if ($fight->setfight->skorplayertwo > $fight->setfight->skorplayerone)
                            <div
                                class="mx-auto mt-2 text-xs text-green-500 bg-green-500/20 py-1 px-2 border-2 border-green-500 rounded-full">
                                Menang</div>
                        @else
                            <div
                                class="mx-auto mt-2 text-xs text-red-500 bg-red-500/20 py-1 px-2 border-2 border-red-500 rounded-full">
                                Kalah</div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-sm col-span-3">Tidak ada histori pertandingan</div>
        @endforelse
    </div>
@endsection
