<?php

namespace App\Http\Controllers;

use App\Models\Fight;
use App\Models\Gallery;
use App\Models\Player;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::get();
        return view('dashboard.gallery.index', [
            'title' => 'Foto',
            'galleries' => $galleries
        ]);
    }

    public function create(): View
    {
        return view('dashboard.gallery.create', [
            'title' => 'Tambah Foto'
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'description' => 'max:100',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/galleries', $image->hashName());

        Gallery::create([
            'description' => $request->description,
            'image' => $image->hashName()
        ]);

        return redirect()->route('galleries.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id): View
    {
        $gallery = Gallery::findOrFail($id);

        return view('dashboard.gallery.edit', [
            'title' => 'Edit Foto',
            'gallery' => $gallery
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'description' => 'max:100',
            'image' => 'image|mimes:png,jpg,jpeg'
        ]);

        $gallery = Gallery::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/galleries/', $image->hashName());

            Storage::delete('public/galleries/' . $gallery->image);
            $gallery->update([
                'description' => $request->description,
                'image' => $image->hashName()
            ]);
        } else {
            $gallery->update([
                'description' => $request->description
            ]);
        }

        return redirect()->route('galleries.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function destroy($id): RedirectResponse
    {
        $gallery = Gallery::findOrFail($id);

        Storage::delete('public/galleries/' . $gallery->image);

        $gallery->delete();

        return redirect()->route('galleries.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function galleries(): View
    {
        $galleries = Gallery::get();
        return view('user.foto', [
            'title' => 'Foto',
            'galleries' => $galleries,
            'lengthGalleries' => $galleries->count(),
        ]);
    }
}
