<?php

namespace Database\Seeders;

use App\Models\Meteran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeteranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meteran::factory(50)->create();
    }
}
