<?php

namespace Database\Seeders;

use App\Models\StatesNames;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    StatesNames::create([
      'name' => 'Active',
      'created_at' => now(),
      'updated_at' => now(),
    ]);

    StatesNames::create([
      'name' => 'Inactive',
      'created_at' => now(),
      'updated_at' => now(),
    ]);
  }
}
