<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Budi Santoso',
                'nip' => 'EMP001',
                'jabatan' => 'Manager',
                'departemen' => 'IT',
                'email' => 'budi@company.com',
                'no_telepon' => '081234567890',
                'tanggal_masuk' => '2020-01-15',
                'status' => 'aktif',
                'gaji' => 8000000,
                'alamat' => 'Jakarta'
            ],
            [
                'nama' => 'Siti Rahayu',
                'nip' => 'EMP002',
                'jabatan' => 'Developer',
                'departemen' => 'IT',
                'email' => 'siti@company.com',
                'no_telepon' => '081234567891',
                'tanggal_masuk' => '2021-03-10',
                'status' => 'aktif',
                'gaji' => 6000000,
                'alamat' => 'Bandung'
            ],
            [
                'nama' => 'Ahmad Fauzi',
                'nip' => 'EMP003',
                'jabatan' => 'HRD',
                'departemen' => 'HR',
                'email' => 'ahmad@company.com',
                'no_telepon' => '081234567892',
                'tanggal_masuk' => '2019-07-20',
                'status' => 'aktif',
                'gaji' => 5500000,
                'alamat' => 'Surabaya'
            ],
            [
                'nama' => 'Dewi Lestari',
                'nip' => 'EMP004',
                'jabatan' => 'Akuntan',
                'departemen' => 'Finance',
                'email' => 'dewi@company.com',
                'no_telepon' => '081234567893',
                'tanggal_masuk' => '2022-05-01',
                'status' => 'aktif',
                'gaji' => 5000000,
                'alamat' => 'Yogyakarta'
            ],
            [
                'nama' => 'Riko Pratama',
                'nip' => 'EMP005',
                'jabatan' => 'Marketing',
                'departemen' => 'Marketing',
                'email' => 'riko@company.com',
                'no_telepon' => '081234567894',
                'tanggal_masuk' => '2023-02-14',
                'status' => 'nonaktif',
                'gaji' => 4500000,
                'alamat' => 'Semarang'
            ],
        ];

        foreach ($data as $d) {
            Karyawan::create($d);
        }
    }
}