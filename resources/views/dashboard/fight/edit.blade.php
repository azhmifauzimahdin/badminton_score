@extends('dashboard/layouts/main')

@section('container')
    <div class="rounded shadow-sm bg-white overflow-hidden">
        <div class="border-b border-slate-800/15 px-4 py-3 text-lg">
            Edit Data Pertandingan
        </div>
        <div class="p-4">
            <form action="{{ route('fights.update', $fight->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-3">
                    <div>
                        <label for="playeroneid" class="block mb-2">Pemain A</label>
                        <select class="select-search block w-full" id="playeroneid" name="playeroneid">
                            @foreach ($players as $player)
                                <option value="{{ $player->id }}"
                                    {{ old('playeroneid', $fight->playerone->id) == $player->id ? 'selected' : '' }}>
                                    {{ $player->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('playeroneid')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="playertwoid" class="block mb-2">Pemain B</label>
                        <select class="select-search block w-full" id="playertwoid" name="playertwoid">
                            @foreach ($players as $player)
                                <option value="{{ $player->id }}"
                                    {{ old('playertwoid', $fight->playertwo->id) == $player->id ? 'selected' : '' }}>
                                    {{ $player->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('playertwoid')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="startdate" class="block mb-2">Waktu Mulai</label>
                        <input type="datetime-local" name="startdate"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Waktu Mulai" value="{{ old('startdate', $fight->startdate) }}">
                        @error('startdate')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="enddate" class="block mb-2">Waktu Mulai</label>
                        <input type="datetime-local" name="enddate"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Waktu Mulai" value="{{ old('enddate', $fight->enddate) }}">
                        @error('enddate')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <button type="submit"
                            class="text-white bg-green-700 font-medium rounded-lg px-5 py-2.5 me-2 mb-2">Tambah</button>
                        <a href="/dashboard/players"
                            class="text-white bg-gray-500 font-medium rounded-lg px-5 py-2.5 me-2 mb-2">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.select-search').select2();
        });
    </script>
@endpush
