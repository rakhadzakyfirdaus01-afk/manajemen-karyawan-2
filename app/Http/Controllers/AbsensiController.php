<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $absensis = Absensi::with('user')
                ->latest()
                ->get();
        } else {
            $absensis = Absensi::where('user_id', Auth::id())
                ->latest()
                ->get();
        }

        return view('absensi.index', compact('absensis'));
    }

    public function create()
    {
        $absensiHariIni = Absensi::where('user_id', Auth::id())
            ->whereDate('tanggal', now()->toDateString())
            ->first();

        return view('absensi.create', compact('absensiHariIni'));
    }

    public function store(Request $request)
    {
        $absensiHariIni = Absensi::where('user_id', Auth::id())
            ->whereDate('tanggal', now()->toDateString())
            ->first();

        if ($absensiHariIni) {

            if (
                $absensiHariIni->status === 'hadir' &&
                !$absensiHariIni->jam_pulang
            ) {
                $absensiHariIni->update([
                    'jam_pulang' => now()->format('H:i:s'),
                ]);

                return redirect()->route('absensi.index')
                    ->with('success', 'Absen pulang berhasil.');
            }

            return back()->with('error', 'Anda sudah menyelesaikan absensi hari ini.');
        }

        $request->validate([
            'status' => 'required|in:hadir,izin,sakit',
        ]);

        if ($request->status === 'hadir') {

            Absensi::create([
                'user_id' => Auth::id(),
                'tanggal' => now()->toDateString(),
                'jam_masuk' => now()->format('H:i:s'),
                'status' => 'hadir',
            ]);

        } else {

            Absensi::create([
                'user_id' => Auth::id(),
                'tanggal' => now()->toDateString(),
                'status' => $request->status,
            ]);
        }

        return redirect()->route('absensi.index')
            ->with('success', 'Absensi berhasil disimpan.');
    }
}