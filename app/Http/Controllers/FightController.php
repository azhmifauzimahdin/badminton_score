<?php

namespace App\Http\Controllers;

use App\Models\Fight;
use App\Models\Player;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FightController extends Controller
{
    public function index(): View
    {
        $fights = Fight::latest()->paginate(10);
        return view('dashboard.fight.index', [
            'title' => 'Pertandingan',
            'fights' => $fights
        ]);
    }

    public function create(): View
    {
        $players = Player::get();
        return view('dashboard.fight.create', [
            'title' => 'Tambah Pertandingan',
            'players' => $players
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'playeroneid' => 'required',
            'playertwoid' => 'required|different:playeroneid',
            'startdate' => 'required|date|after_or_equal:now',
            'enddate' => 'required|date|after:startdate'
        ]);
        Fight::create($data);

        return redirect()->route('fights.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id): View
    {
        $fight = Fight::findOrFail($id);
        $players = Player::get();

        return view('dashboard.fight.edit', [
            'title' => 'Edit Pertandingan',
            'fight' => $fight,
            'players' => $players
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = $request->validate([
            'playeroneid' => 'required',
            'playertwoid' => 'required|different:playeroneid',
            'startdate' => 'required|date',
            'enddate' => 'required|date|after:startdate'
        ]);

        $fight = Fight::findOrFail($id);
        $fight->update($data);

        return redirect()->route('fights.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function destroy($id): RedirectResponse
    {
        $fight = Fight::findOrFail($id);

        $fight->delete();

        return redirect()->route('fights.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
