<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $cutis = Cuti::latest()->get();
        } else {
            $cutis = Cuti::where('user_id', Auth::id())
                ->latest()
                ->get();
        }

        return view('cuti.index', compact('cutis'));
    }

    public function create()
    {
        return view('cuti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'alasan' => 'required',
        ]);

        Cuti::create([
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal,
            'alasan' => $request->alasan,
            'status' => 'menunggu',
        ]);

        return redirect()
            ->route('cuti.index')
            ->with('success', 'Pengajuan cuti berhasil dikirim.');
    }

    public function setujui(Cuti $cuti)
    {
        $cuti->update([
            'status' => 'disetujui'
        ]);

        return back()->with('success', 'Pengajuan cuti disetujui.');
    }

    public function tolak(Cuti $cuti)
    {
        $cuti->update([
            'status' => 'ditolak'
        ]);

        return back()->with('success', 'Pengajuan cuti ditolak.');
    }
}