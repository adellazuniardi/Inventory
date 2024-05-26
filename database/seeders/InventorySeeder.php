<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $now = Carbon::now();

        DB::table('inventories')->insert([
            'namabarang' => 'Kabel',
            'tanggal_masuk' => '2022-04-04 10:30:00',
            'tanggal_keluar' => '2022-04-05 11:30:00',
            'namapic' => 'Rama',
            'kontakpic' => '081256891789',
            'unit' => 'WITEL'
        ]);
    }
}
