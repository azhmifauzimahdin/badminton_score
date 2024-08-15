<?php

namespace App\Http\Controllers;

use App\Models\Fight;
use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FightController extends Controller
{
    public function index(): View
    {
        $fights = Fight::orderby('startdate')->filter(request(['search']))->paginate(10)->withQueryString();
        $fights->map(
            function ($fight) {
                $now = Carbon::now();
                $fight->matchstatus = $fight->status == 1 ? 'Selesai' : ($fight->status == 0 && $fight->startdate < $now ? 'Berlangsung' : 'Belum Mulai');
                return $fight;
            }
        );
        return view('dashboard.fight.index', [
            'title' => 'Data Pertandingan',
            'fights' => $fights
        ]);
    }

    public function create(): View
    {
        $players = Player::get();
        return view('dashboard.fight.create', [
            'title' => 'Tambah Data Pertandingan',
            'players' => $players
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'playeroneid' => 'required',
            'playertwoid' => 'required|different:playeroneid',
            'venue' => 'required',
            'court' => 'required',
            'startdate' => 'required|date|after_or_equal:now'
        ]);
        Fight::create($data);

        return redirect()->route('fights.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id): View
    {
        $fight = Fight::findOrFail($id);
        $players = Player::get();

        return view('dashboard.fight.edit', [
            'title' => 'Edit Data Pertandingan',
            'fight' => $fight,
            'players' => $players
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = $request->validate([
            'playeroneid' => 'required',
            'playertwoid' => 'required|different:playeroneid',
            'venue' => 'required',
            'court' => 'required',
            'startdate' => 'required|date'
        ]);

        $fight = Fight::findOrFail($id);
        $fight->update($data);

        return redirect()->route('fights.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function destroy($id): RedirectResponse
    {
        $fight = Fight::findOrFail($id);

        $fight->delete();
        $fight->skor()->delete();
        $fight->setfight()->delete();

        return redirect()->route('fights.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
