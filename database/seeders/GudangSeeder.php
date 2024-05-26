<?php

namespace Database\Seeders;

use App\Models\Gudang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'gudang' => 'Gudang-A'
            ],
            [
                'gudang' => 'Gudang-B'
            ],
            [
                'gudang' => 'Gudang-C'
            ],
            [
                'gudang' => 'Gudang-D'
            ],

            ];

            foreach ($classes as $gudangclass) {
                $class = new Gudang();

                $class->gudang = $gudangclass['gudang'];

                $class->save();  
            }
     }
}
