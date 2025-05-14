<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tables')->insert([
            [
                'table_number' => 'T1',
                'capacity' => 4,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table_number' => 'T2',
                'capacity' => 2,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table_number' => 'T3',
                'capacity' => 6,
                'status' => 'reserved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table_number' => 'T4',
                'capacity' => 8,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
