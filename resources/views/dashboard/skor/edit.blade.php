@extends('dashboard/layouts/main')

@section('container')
    <div class="bg-white p-4 rounded-lg md:w-8/12 mb-3 border border-slate-500/20">
        <p class="text-sm text-center opacity-80 mb-4">{{ $fight->venue }} [Court {{ $fight->court }}] |
            {{ \Carbon\Carbon::parse($fight->startdate)->format('H:i') }} WIB</p>
        <div class="grid grid-cols-3">
            <div>
                <div class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob mb-3">
                    <img src="{{ asset('storage/player/' . $fight->playerone->image) }}" alt="{{ $fight->playerone->name }}"
                        class="aspect-[3/4]">
                </div>
                <p class="text-center font-medium">{{ $fight->playerone->name }}</p>
            </div>
            <div class="p-3">
                <div class="text-center mb-1">
                    <span
                        class="border-solid border-2 border-green-600 rounded-full text-center px-3 text-sm bg-green-600/25 text-green-600">{{ $skorNow->set }}</span>
                </div>
                <div class="text-xs flex justify-between px-2">
                    <span>{{ $fight->setfight?->skorplayerone }}</span>
                    <span>SET</span>
                    <span>{{ $fight->setfight?->skorplayertwo }}</span>
                </div>
                <div class="text-2xl font-medium grid grid-cols-3">
                    <div class="justify-self-center">{{ $skorNow->skorplayerone }}</div>
                    <div class="justify-self-center">:</div>
                    <div class="justify-self-center">{{ $skorNow->skorplayertwo }}</div>
                </div>
            </div>
            <div>
                <div class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob mb-3">
                    <img src="{{ asset('storage/player/' . $fight->playertwo->image) }}"
                        alt="{{ $fight->playertwo->name }}" class="aspect-[3/4]">
                </div>
                <p class="text-center font-medium mb-4">{{ $fight->playertwo->name }}</p>
            </div>
            @if ($fight->status == 0)
                <div>
                    <div class="flex justify-center" role="group">
                        <form action="{{ route('skors.update', $skorNow->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="player" value="1">
                            <input type="hidden" name="description" value="0">
                            <button type="submit" class="py-2 px-3 text-white bg-red-700 rounded-l">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        </form>
                        <form action="{{ route('skors.update', $skorNow->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="player" value="1">
                            <input type="hidden" name="description" value="1">
                            <button type="submit" class="py-2 px-3 text-white bg-green-700 rounded-r">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <div>
                        <h4 class="font-bold text-center">SET</h4>
                    </div>
                    <div>
                        <form action="{{ route('skors.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="fightid" value="{{ $fight->id }}">
                            {{-- <button type="submit"
                                class="finish-fight text-white bg-blue-700 font-medium rounded-lg px-5 py-2.5 mb-2">
                                FINISH
                            </button>
                            @if ($finish)
                            @else
                            @endif --}}
                            <button type="submit"
                                class="next-fight text-white bg-blue-700 font-medium rounded-lg px-5 py-2.5 mb-2">
                                NEXT / FINISH
                            </button>
                        </form>
                    </div>
                </div>
                <div>
                    <div class="flex justify-center" role="group">
                        <form action="{{ route('skors.update', $skorNow->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="player" value="2">
                            <input type="hidden" name="description" value="0">
                            <button type="submit" class="py-2 px-3 text-white bg-red-700 rounded-l">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        </form>
                        <form action="{{ route('skors.update', $skorNow->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="player" value="2">
                            <input type="hidden" name="description" value="1">
                            <button type="submit" class="py-2 px-3 text-white bg-green-700 rounded-r">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @foreach ($fight->skors as $skor)
        <div
            class="grid grid-cols-5 w-full overflow-hidden bg-white mb-2 rounded-lg shadow-sm border border-slate-500/20 md:w-8/12 mx-auto">
            <div class="text-center col-span-1 flex justify-center items-center font-semibold">
                {{ $skor->skorplayerone }}
            </div>
            <div class="text-center font-medium col-span-3 border-x border-slate-500/20 py-1">
                <div class="font-semibold">SET {{ $skor->set }}</div>
                <div class="text-xs">{{ \Carbon\Carbon::parse($skor->startdate)->diff($skor->enddate) }}
                </div>
            </div>
            <div class="text-center col-span-1 flex justify-center items-center font-semibold">
                {{ $skor->skorplayertwo }}
            </div>
        </div>
    @endforeach
@endsection

@push('script')
    <script>
        $('.next-fight').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Skor set sebelumnya tidak dapat diubah lagi",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Next / Finish',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
        $('.finish-fight').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Jika pertandingan selesai skor tidak dapat diubah lagi",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Finish',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>
@endpush
