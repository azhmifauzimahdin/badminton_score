<?php

namespace App\Http\Controllers;

use App\Models\Fight;
use App\Models\FinalSkor;
use App\Models\Skor;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkorController extends Controller
{
    public function index(): View
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $fightsNow = Fight::where('startdate', '<', $now)->where('status', false)->orderBy('startdate')->get();
        return view('dashboard.skor.index', [
            'title' => 'Skor',
            'fightsNow' => $fightsNow
        ]);
    }

    public function store(Request $request)
    {
        $now = Carbon::now();
        $skor = Skor::where('fightid', $request->fightid)->get();
        $skor->where('set', $skor->count())->first()->update(['status' => true, 'enddate' => $now]);
        if ($skor->count() < 3) {
            $finalskor = FinalSkor::where('fightid', $request->fightid);
            $result = Skor::where('fightid', $request->fightid)->latest()->first();
            $setplayer = $result->skorplayerone > $result->skorplayertwo ? 1 : 0;
            if ($finalskor->count() == 0) {
                FinalSkor::create([
                    'fightid' =>  $request->fightid,
                    'skorplayerone' => $setplayer,
                    'skorplayertwo' => !$setplayer,
                ]);
            } else {
                $setplayer == 1 ? $finalskor->increment('skorplayerone') : $finalskor->increment('skorplayertwo');
            }

            $cekskor = FinalSkor::where('fightid', $request->fightid)->first();
            if ($cekskor->skorplayerone < 2 && $cekskor->skorplayertwo < 2) {
                Skor::create([
                    'set' => $skor->count() + 1,
                    'fightid' => $request->fightid,
                    'startdate' => $now
                ]);
                return redirect()->route('skors.edit', $request->fightid);
            }
            Fight::findOrFail($request->fightid)->update(['status' => true]);
            return redirect()->route('fight.history');
        }

        $finalskor = FinalSkor::where('fightid', $request->fightid);
        $result = Skor::where('fightid', $request->fightid)->latest()->first();
        $setplayer = $result->skorplayerone > $result->skorplayertwo ? 1 : 0;
        $setplayer == 1 ? $finalskor->increment('skorplayerone') : $finalskor->increment('skorplayertwo');

        Fight::findOrFail($request->fightid)->update(['status' => true]);

        return redirect()->route('fight.history');
    }

    public function edit($id): View
    {
        $now = Carbon::now();
        $skorCheck = Skor::where('fightid', $id)->first();
        if (!$skorCheck) {
            Skor::create([
                'fightid' => $id,
                'startdate' => $now
            ]);
        }
        $skor = Skor::where('fightid', $id)->orderBy('set', 'desc')->get();
        $fight = Fight::findOrFail($id);

        return view('dashboard.skor.edit', [
            'title' => 'Edit Skor',
            'fight' => $fight,
            'skorNow' => $skor->first(),
            'finish' => $skor->count() == 3 ? true : false
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $skor = Skor::findOrFail($id);
        if ($request->description == 1) {
            if ($request->player == 1) $skor->increment('skorplayerone');
            if ($request->player == 2) $skor->increment('skorplayertwo');
        } else if ($request->description == 0) {
            if ($request->player == 1 && $skor->skorplayerone > 0) $skor->decrement('skorplayerone');
            if ($request->player == 2 && $skor->skorplayertwo > 0) $skor->decrement('skorplayertwo');
        }

        return redirect()->route('skors.edit', $skor->fightid);
    }
}
