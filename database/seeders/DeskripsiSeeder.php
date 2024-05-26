<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeskripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('deskripsis')->insert([
            'nama' => 'Gudang A',
            'kapasitas' => '10 barang',
            'deskripsi' => 'barat',
            

        ]);
    }
}
