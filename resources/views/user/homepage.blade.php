@extends('layouts.main')

@push('head')
    <style>
        .bg-image {
            position: relative;
        }

        .bg-image::after {
            content: "";
            position: absolute;
            top: -26px;
            right: -6px;
            width: 0;
            height: 0;
            border-top: 30px solid transparent;
            border-bottom: 30px solid transparent;
            border-right: 30px solid #f0f0f0;
            transform: rotate(135deg)
        }

        .bg-image::before {
            content: "";
            background-image: url('storage/assets/badminton.png');
            background-size: 60%;
            background-repeat: no-repeat;
            background-position: center center;
            position: absolute;
            top: 15px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            opacity: 0.15;
        }
    </style>
@endpush

@section('container')
    @if ($fightsLive->count() > 0)
        <h1 class="text-xl font-medium mb-3">Live Match</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">
            @foreach ($fightsLive as $index => $fightLive)
                <a href="{{ route('fight.detail', $fightLive->id) }}">
                    <div
                        class="w-full bg-blue-900 text-white p-4 rounded-tl-xl rounded-br-xl rounded-tr-[40px] rounded-bl-[40px] bg-image shadow-lg">
                        <h2 class="text-base">Badminton</h2>
                        <p class="text-sm opacity-80 mb-4">{{ $fightLive->venue }} [Court {{ $fightLive->court }}] |
                            {{ \Carbon\Carbon::parse($fightLive->startdate)->format('H:i') }} WIB</p>
                        <div class="grid grid-cols-3">
                            <div>
                                <div
                                    class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob-white mb-1">
                                    <img src="{{ asset('storage/player/' . $fightLive->playerone->image) }}"
                                        alt="{{ $fightLive->playerone->name }}" class="aspect-[3/4] w-3/4 mx-auto mb-1">
                                </div>
                                <p class="text-center text-sm font-medium">{{ $fightLive->playerone->name }}</p>
                            </div>
                            <div class="p-3">

                                <div class="text-center mb-1">
                                    <span id="setid{{ $fightLive->id }}"
                                        class="border-solid border-2 border-white rounded-full text-center px-3 text-sm font-medium">{{ $fightLive->finalskor ? $fightLive->finalskor->set : 1 }}</span>
                                </div>
                                <div class="text-xs flex justify-between px-2">
                                    <span
                                        id="setplayeroneid{{ $fightLive->id }}">{{ $fightLive->setfight ? $fightLive->setfight->skorplayerone : 0 }}</span>
                                    <span>SET</span>
                                    <span
                                        id="setplayertwoid{{ $fightLive->id }}">{{ $fightLive->setfight ? $fightLive->setfight->skorplayertwo : 0 }}</span>
                                </div>
                                <div class="text-2xl font-medium text-center grid grid-cols-3">
                                    <div id="skorplayeroneid{{ $fightLive->id }}">
                                        {{ $fightLive->finalskor ? $fightLive->finalskor->skorplayerone : 0 }}</div>
                                    <div>:</div>
                                    <div id="skorplayertwoid{{ $fightLive->id }}">
                                        {{ $fightLive->finalskor ? $fightLive->finalskor->skorplayertwo : 0 }}</div>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob-white mb-1">
                                    <img src="{{ asset('storage/player/' . $fightLive->playertwo->image) }}"
                                        alt="{{ $fightLive->playertwo->name }}" class="aspect-[3/4] w-3/4 mx-auto mb-1">
                                </div>
                                <p class="text-center text-sm font-medium">{{ $fightLive->playertwo->name }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
    <h1 class="text-xl font-medium mb-3">Upcoming Match</h1>
    <div class="grid md:grid-cols-3 gap-2">
        @foreach ($fights as $fight)
            <div class="bg-white rounded-xl p-3 gap-6 shadow-sm border border-slate-500/20">
                <div class="text-xs text-center text-slate-800">{{ $fight->venue }} [Court {{ $fight->court }}]</div>
                <div class="grid grid-cols-7">
                    <div class="col-span-2">
                        <div class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob mb-1">
                            <img src="{{ asset('storage/player/' . $fight->playerone->image) }}" alt="Player 1"
                                class="aspect-[10/12] h-full mx-auto">
                        </div>
                        <p class="text-center font-medium text-xs text-gray-700">{{ $fight->playerone->name }}</p>
                    </div>
                    <div class="flex flex-col items-center justify-center col-span-3">
                        <div class="text-xs text-gray-600 mb-1">
                            {{ \Carbon\Carbon::parse($fight->startdate)->isoFormat('D MMMM Y') }}
                        </div>
                        <div class="text-sm font-medium">{{ \Carbon\Carbon::parse($fight->startdate)->format('H:i') }} WIB
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="aspect-square w-3/4 mx-auto overflow-hidden rounded-full pt-1 bg-blob mb-1">
                            <img src="{{ asset('storage/player/' . $fight->playertwo->image) }}" alt="Player 1"
                                class="aspect-[10/12] mx-auto">
                        </div>
                        <p class="text-center font-medium text-xs text-gray-700">{{ $fight->playertwo->name }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('script')
    <script>
        setInterval(function() {
            $.ajax({
                url: '/liveskor',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    for (var i = 0; i < response.set.length; i++) {
                        if (response.set[i]) {
                            $("#setplayeroneid" + response.set[i].fightid).html(response.set[i]
                                .skorplayerone);
                            $("#setplayertwoid" + response.set[i].fightid).html(response.set[i]
                                .skorplayertwo);
                        }
                    }
                    for (var i = 0; i < response.fights.length; i++) {
                        if (response.fights[i]) {
                            $("#setid" + response.fights[i].fightid).html(response.fights[i]
                                .set);
                            $("#skorplayeroneid" + response.fights[i].fightid).html(response.fights[i]
                                .skorplayerone);
                            $("#skorplayertwoid" + response.fights[i].fightid).html(response.fights[i]
                                .skorplayertwo);
                        }
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })
        }, 10000);
    </script>
@endpush
