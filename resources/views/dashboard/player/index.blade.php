@extends('dashboard/layouts/main')

@section('container')
    <div class="rounded shadow-sm bg-white overflow-hidden">
        <div class="border-b border-slate-800/15 px-4 py-3 text-lg">
            Data Pemain
        </div>
        <div class="p-4">
            @if (session()->has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    {{ session('failed') }}
                </div>
            @endif
            <div class="mb-2">
                <a href="{{ route('players.create') }}">
                    <button class="text-white bg-blue-700 font-medium rounded-lg px-5 py-2.5 me-2 mb-2">
                        Tambah
                        Data</button>
                </a>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full bg-gray-100">
                    <thead class="text-left">
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>KETERANGAN</th>
                            <th>FOTO</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($players as $index => $player)
                            <tr class="odd:bg-gray-50 even:bg-gray-100">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $player->name }}</td>
                                <td>{{ $player->description }}</td>
                                <td>
                                    <img src="{{ asset('/storage/player/' . $player->image) }}" alt="{{ $player->name }}"
                                        width="80">
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('players.edit', $player->id) }}">
                                        <button id="check" class="text-white bg-yellow-400 rounded-lg px-2.5 py-1 me-1">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('players.destroy', $player->id) }}" method="POST"
                                        class="inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="delete_player text-white bg-red-700 rounded-lg px-2.5 py-1 me-1">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr class="odd:bg-gray-50 even:bg-gray-100">
                                <td colspan="5" class="text-center">Data masih kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.delete_player').click(function(event) {
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
