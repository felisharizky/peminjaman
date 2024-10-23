<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PC;

class PCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data PC yang akan dimasukkan
        $pcs = [
            'PC Acer 1',
            'PC Acer 2',
            'PC Acer 4',
            'PC Acer 17',
            'PC Hp 2',
            'PC Hp 3',
            'PC Hp 4',
            'PC Hp 5',
            'PC Hp 6',
            'PC Hp 7',
            'PC Hp 8',
            'PC Hp 9'
        ];

        // Loop untuk memasukkan data ke tabel pcs
        foreach ($pcs as $pcName) {
            PC::create([
                'nama' => $pcName,
                'available' => true, // PC akan ditandai tersedia secara default
            ]);
        }
    }
}
