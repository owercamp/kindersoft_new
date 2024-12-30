<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Genre::create(['name' => 'Masculino', 'created_at' => now(), 'updated_at' => now()]);
    Genre::create(['name' => 'Femenino', 'created_at' => now(), 'updated_at' => now()]);
  }
}
