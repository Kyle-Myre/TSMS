<?php

namespace Database\Seeders;

use App\Models\Chip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChipSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chip::factory()->count(25)->create();
    }
}
