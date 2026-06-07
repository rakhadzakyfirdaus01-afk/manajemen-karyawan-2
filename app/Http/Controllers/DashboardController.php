<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKaryawan = Karyawan::count();
        $karyawanAktif = Karyawan::where('status', 'aktif')->count();
        $karyawanNonaktif = Karyawan::where('status', 'nonaktif')->count();
        $departemen = Karyawan::select('departemen')->distinct()->pluck('departemen')->count();

        return view('dashboard', compact(
            'totalKaryawan',
            'karyawanAktif',
            'karyawanNonaktif',
            'departemen'
        ));
    }
}