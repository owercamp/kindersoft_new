<?php

namespace Database\Seeders;

use App\Models\TypeIdentification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeIdentificationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    TypeIdentification::create([
      'name' => 'Cédula de Ciudadanía',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    TypeIdentification::create([
      'name' => 'Tarjeta de Identidad',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    TypeIdentification::create([
      'name' => 'Pasaporte',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    TypeIdentification::create([
      'name' => 'Cédula de Extrajería',
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }
}
