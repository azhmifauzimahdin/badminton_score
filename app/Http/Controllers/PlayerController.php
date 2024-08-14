<?php

namespace App\Http\Controllers;

use App\Models\Fight;
use App\Models\Player;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PlayerController extends Controller
{
    public function index(): View
    {
        $players =  Player::filter(request(['search']))->latest()->paginate(10)->withQueryString();

        return view('dashboard.player.index', [
            'title' => 'Pemain',
            'players' => $players
        ]);
    }

    public function create(): View
    {
        return view('dashboard.player.create', [
            'title' => 'Tambah Pemain'
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'max:100',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/player', $image->hashName());

        Player::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image->hashName()
        ]);

        return redirect()->route('players.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id): View
    {
        $player = Player::findOrFail($id);

        return view('dashboard.player.edit', [
            'title' => 'Edit Pemain',
            'player' => $player
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'max:100',
            'image' => 'image|mimes:png,jpg,jpeg'
        ]);

        $player = Player::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/player/', $image->hashName());

            if ($player->image != 'playerdefault0.png' && $player->image != 'playerdefault1.png' && $player->image != 'playerdoubledefault.png') {
                Storage::delete('public/player/' . $player->image);
            }
            $player->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image->hashName()
            ]);
        } else {
            $player->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
        }

        return redirect()->route('players.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function destroy($id): RedirectResponse
    {
        $player = Player::findOrFail($id);

        $fight = Fight::where('playeroneid', $id)->orwhere('playertwoid', $id)->get();
        if ($fight->count() > 0) {
            return redirect()->route('players.index')->with(['failed' => 'Data tidak bisa dihapus karena sudah terjadwal pertandingan']);
        }

        if ($player->image != 'playerdefault0.png' && $player->image != 'playerdefault1.png' && $player->image != 'playerdoubledefault.png') {
            Storage::delete('public/player/' . $player->image);
        }

        $player->delete();

        return redirect()->route('players.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
