@extends('layouts.main')

@section('container')
    <div class="md:mx-48">
        <div class="w-full bg-white p-4 mb-3 rounded-lg shadow-sm border border-slate-500/20">
            <p class="text-sm opacity-80 mb-4 text-center">{{ $fight->venue }} [Court {{ $fight->court }}] |
                {{ \Carbon\Carbon::parse($fight->startdate)->format('H:i') }} WIB</p>
            <div class="grid grid-cols-3">
                <div>
                    <div class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob mb-1">
                        <img src="{{ asset('storage/player/' . $fight->playerone->image) }}"
                            alt="{{ $fight->playerone->name }}" class="aspect-[3/4] w-3/4 mx-auto mb-1">
                    </div>
                    <p class="text-center text-sm font-medium">{{ $fight->playerone->name }}</p>
                </div>
                <div class="p-3">
                    <div class="text-center mb-1">
                        <span id="set"
                            class="border-solid border-2 border-blue-900 font-medium rounded-full text-center px-3 text-sm ">{{ $fight->finalSkor ? $fight->finalSkor->set : 1 }}</span>
                    </div>
                    <div class="text-xs flex justify-between px-2">
                        <span id="setplayerone">{{ $fight->setfight ? $fight->setfight->skorplayerone : 0 }}</span>
                        <span>SET</span>
                        <span id="setplayertwo">{{ $fight->setfight ? $fight->setfight->skorplayertwo : 0 }}</span>
                    </div>
                    <div class="text-2xl font-medium text-center grid grid-cols-3">
                        <div id="skorplayerone">{{ $fight->finalskor ? $fight->finalskor->skorplayerone : 0 }}</div>
                        <div>:</div>
                        <div id="skorplayertwo">{{ $fight->finalskor ? $fight->finalskor->skorplayertwo : 0 }}</div>
                    </div>
                    @if ($fight->finalskor)
                        <div class="flex justify-center text-center text-xs mt-2 font-semibold text-white">
                            <div id="jam" class="bg-blue-900 p-1 rounded-sm">
                                00
                            </div>
                            <div class="text-blue-900 px-0.5 flex items-center justify-center">
                                :
                            </div>
                            <div id="menit" class="bg-blue-900 p-1 rounded-sm">
                                00
                            </div>
                            <div class="text-blue-900 px-0.5 flex items-center justify-center">
                                :
                            </div>
                            <div id="detik" class="bg-blue-900 p-1 rounded-sm">
                                00
                            </div>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob mb-1">
                        <img src="{{ asset('storage/player/' . $fight->playertwo->image) }}"
                            alt="{{ $fight->playertwo->name }}" class="aspect-[3/4] w-3/4 mx-auto mb-1">
                    </div>
                    <p class="text-center text-sm font-medium">{{ $fight->playertwo->name }}</p>
                </div>
            </div>
        </div>
        @foreach ($fight->skors as $skor)
            <div class="grid grid-cols-5 w-full bg-white p-4 mb-2 rounded-lg shadow-sm border border-slate-500/20">
                <div class="text-center col-span-1 flex justify-center items-center">{{ $skor->skorplayerone }}</div>
                <div class="text-center font-medium  col-span-3">
                    <div class="text-blue-900 font-semibold">SET {{ $skor->set }}</div>
                    <div class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($skor->startdate)->diff($skor->enddate) }}
                    </div>
                </div>
                <div class="text-center col-span-1 flex justify-center items-center">{{ $skor->skorplayertwo }}</div>
            </div>
        @endforeach
    </div>
    <ul id="tasklist"></ul>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            var end = new Date('{{ $fight->finalskor?->startdate }}');
            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;

            function showRemaining() {
                var now = new Date();
                var distance = now - end;
                if (distance < 0) {
                    clearInterval(timer);
                    return;
                }
                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);

                $("#jam").html(String("0" + hours).slice(-2));
                $("#menit").html(String("0" + minutes).slice(-2));
                $("#detik").html(String("0" + seconds).slice(-2));
            }

            timer = setInterval(showRemaining, 1000);

            setInterval(function() {
                $.ajax({
                    url: '/liveskor/{{ $fight->id }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.set) {
                            $("#setplayerone").html(response.set.skorplayerone);
                            $("#setplayertwo").html(response.set.skorplayertwo);
                        }
                        if (response.skor) {
                            $("#set").html(response.skor.set);
                            $("#skorplayerone").html(response.skor.skorplayerone);
                            $("#skorplayertwo").html(response.skor.skorplayertwo);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            }, 10000);
        });
    </script>
@endpush
