@extends('dashboard/layouts/main')

@push('head')
    <style>
        .bg-blob {
            background - image: url('storage/assets/blob.svg');
            background - size: 100 % 100 %;
        }
    </style>
@endpush

@section('container')
    <div class="grid gap-2 md:w-8/12 mx-auto">
        @forelse ($fightsNow as $fightNow)
            <div class="bg-white rounded-xl p-3 gap-6">
                <div class="text-xs text-center text-slate-800">{{ $fightNow->venue }} [Court {{ $fightNow->court }}]</div>
                <div class="grid grid-cols-7">
                    <div class="col-span-2">
                        <div class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob mb-1">
                            <img src="{{ asset('storage/player/' . $fightNow->playerone->image) }}" alt="Player 1"
                                class="aspect-[10/12] h-full mx-auto">
                        </div>
                        <p class="text-center font-medium text-sm text-gray-700">{{ $fightNow->playerone->name }}</p>
                    </div>
                    <div class="flex flex-col items-center justify-center col-span-3">
                        <div class="text-xs text-gray-600 mb-1">
                            {{ \Carbon\Carbon::parse($fightNow->startdate)->isoFormat('D MMMM Y') }}
                        </div>
                        <div class="text-sm font-medium mb-1">
                            {{ \Carbon\Carbon::parse($fightNow->startdate)->format('H:i') }}
                            WIB
                        </div>
                        <div>
                            <a href="{{ route('skors.edit', $fightNow->id) }}"
                                class="text-xs py-1 px-3 border-2 border-green-600 rounded-full text-green-600 hover:bg-green-600 hover:text-white">
                                @if ($fightNow->skor->count() > 0)
                                    Edit Skor
                                @else
                                    Start
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob mb-1">
                            <img src="{{ asset('storage/player/' . $fightNow->playertwo->image) }}" alt="Player 1"
                                class="aspect-[10/12] mx-auto">
                        </div>
                        <p class="text-center font-medium text-sm text-gray-700">{{ $fightNow->playertwo->name }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-sm">Tidak ada pertandingan berlangsung</div>
        @endforelse
    </div>
@endsection
