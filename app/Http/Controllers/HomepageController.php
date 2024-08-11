<?php

namespace App\Http\Controllers;

use App\Models\Fight;
use App\Models\Skor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomepageController extends Controller
{
    public function index(): View
    {
        $now = Carbon::now();
        $fights = Fight::orderBy('startdate')->get();

        return view('user.homepage', [
            'title' => 'Homepage',
            'fights' => $fights->where('startdate', '>', $now),
            'fightsLive' => $fights->where('startdate', '<', $now)->where('status', false)
        ]);
    }

    public function show($id): View
    {
        $fight = Fight::where('id', $id)->first();
        return view('user.detailFight', [
            'title' => 'Detail Pertandingan',
            'fight' => $fight
        ]);
    }

    public function historyFight(): View
    {
        $fights = Fight::where('status', true)->orderBy('startdate', 'desc')->get();
        return view('user.historyFight', [
            'title' => 'Histori Pertandingan',
            'fights' => $fights
        ]);
    }

    public function liveSkor(Request $request, $id)
    {
        $skor = Skor::where('fightid', $id)->latest()->first();
        if ($request->ajax()) {
            return response()->json(array('skor' => $skor, 'set' => $skor->setfight));
        }
        return view('user.historyFight', compact('skor'));
    }

    public function liveskorNow(Request $request)
    {
        $now = Carbon::now();
        $fights = Fight::where('startdate', '<', $now)->where('status', false)->get();
        $result = [];
        $set = [];
        foreach ($fights as $fight) {
            $result[] = $fight->finalSkor;
            $set[] = $fight->setfight;
        }
        if ($request->ajax()) {
            return response()->json(array('fights' => $result, 'set' => $set));
        }
        return view('user.homepage', compact('fights'));
    }
}
