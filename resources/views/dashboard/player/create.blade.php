@extends('dashboard/layouts/main')

@section('container')
    <div class="rounded shadow-sm bg-white overflow-hidden md:w-8/12 mx-auto">
        <div class="border-b border-slate-800/15 px-4 py-3 text-lg">
            Tambah Data Pemain
        </div>
        <div class="p-4">
            <form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-3">
                    <div>
                        <label for="name" class="block mb-2">Nama*</label>
                        <input type="text" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Nama" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="block mb-2">Keterangan</label>
                        <input type="text" name="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Keterangan" value="{{ old('description') }}">
                        @error('description')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="image" class="block mb-2">Foto*</label>
                        <img id="img-preview" class="w-40 mb-2">
                        <input type="file" id="image" name="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            onchange="previewImage()">
                        @error('image')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <button type="submit"
                            class="text-white bg-green-700 font-medium rounded-lg px-5 py-2.5 me-2 mb-2">Tambah</button>
                        <a href="{{ route('players.index') }}"
                            class="text-white bg-gray-500 font-medium rounded-lg px-5 py-2.5 me-2 mb-2">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('#img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        };
    </script>
@endpush
