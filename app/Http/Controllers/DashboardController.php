<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Cuti;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik karyawan
        $totalKaryawan = Karyawan::count();

        $karyawanAktif = Karyawan::where(
            'status',
            'aktif'
        )->count();

        $karyawanNonaktif = Karyawan::where(
            'status',
            'nonaktif'
        )->count();

        $departemen = Karyawan::select(
            'departemen'
        )->distinct()->count();

        // Cuti yang masih menunggu
        $cutiMenunggu = Cuti::where(
            'status',
            'menunggu'
        )->count();

        // Statistik absensi
        $jumlahHadir = Absensi::where(
            'status',
            'hadir'
        )->count();

        $jumlahIzin = Absensi::where(
            'status',
            'izin'
        )->count();

        $jumlahSakit = Absensi::where(
            'status',
            'sakit'
        )->count();

        return view(
            'dashboard',
            compact(
                'totalKaryawan',
                'karyawanAktif',
                'karyawanNonaktif',
                'departemen',
                'cutiMenunggu',
                'jumlahHadir',
                'jumlahIzin',
                'jumlahSakit'
            )
        );
    }
}