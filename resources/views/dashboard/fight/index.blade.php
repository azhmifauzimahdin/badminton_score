@extends('dashboard/layouts/main')

@section('container')
    <div class="rounded shadow-sm bg-white overflow-hidden">
        <div class="border-b border-slate-800/15 px-4 py-3 text-lg">
            Data Pertandingan
        </div>
        <div class="p-4">
            @if (session()->has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex justify-between mb-2">
                <div>
                    <a href="{{ route('fights.create') }}">
                        <button class="text-white text-nowrap bg-blue-700 font-medium rounded-lg px-5 py-2 me-2 mb-2">
                            Tambah
                            Data</button>
                    </a>
                </div>
                <form class="md:w-1/4">
                    <label for="search" class="sr-only">Search</label>
                    <div>
                        <input type="search" id="search" name="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5"
                            placeholder="Cari" autocomplete="off" value="{{ request('search') }}" />
                    </div>
                </form>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full bg-gray-100">
                    <thead class="text-left">
                        <tr>
                            <th>NO</th>
                            <th class="text-nowrap">PEMAIN A</th>
                            <th class="text-nowrap">PEMAIN B</th>
                            <th>VENUE</th>
                            <th>COURT</th>
                            <th>JADWAL</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fights as $index => $fight)
                            <tr class="odd:bg-gray-50 even:bg-gray-100">
                                <td>{{ $index + $fights->firstItem() }}</td>
                                <td class="text-nowrap">{{ $fight->playerone->name }}</td>
                                <td class="text-nowrap">{{ $fight->playertwo->name }}</td>
                                <td>{{ $fight->venue }}</td>
                                <td class="text-center">{{ $fight->court }}</td>
                                <td class="text-nowrap">{{ \Carbon\Carbon::parse($fight->startdate)->format('d/m/Y H:i') }}
                                </td>
                                <td class="text-center">
                                    @if ($fight->matchstatus == 'Belum Mulai')
                                        <span
                                            class="text-xs text-nowrap font-medium border border-red-500 bg-red-500/15 text-red-500 rounded-full py-1 px-2">
                                            {{ $fight->matchstatus }}
                                        </span>
                                    @elseif ($fight->matchstatus == 'Berlangsung')
                                        <span
                                            class="text-xs font-medium border border-yellow-300 bg-yellow-300/15 text-yellow-300 rounded-full py-1 px-2">
                                            {{ $fight->matchstatus }}
                                        </span>
                                    @else
                                        <span
                                            class="text-xs font-medium border border-green-500 bg-green-500/15 text-green-500 rounded-full py-1 px-2">
                                            {{ $fight->matchstatus }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('fights.edit', $fight->id) }}"
                                        class="{{ $fight->matchstatus != 'Belum Mulai' ? 'hidden' : '' }}">
                                        <button id="check" class="text-white bg-yellow-400 rounded-lg px-2.5 py-1 me-1">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('fights.destroy', $fight->id) }}" method="POST" class="inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="delete_fight text-white bg-red-700 rounded-lg px-2.5 py-1 me-1">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr class="odd:bg-gray-50 even:bg-gray-100">
                                <td colspan="8" class="text-center">Data masih kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $fights->onEachSide(0)->links() }}
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.delete_fight').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data Anda tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>
@endpush
