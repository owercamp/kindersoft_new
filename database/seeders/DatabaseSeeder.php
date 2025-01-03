<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);

    $this->call(CountrySeeder::class);
    $this->call(DepartamentSeeder::class);
    $this->call(MunicipalitySeeder::class);
    $this->call(CitySeeder::class);
    $this->call(NeighborhoodSeeder::class);
    $this->call(PostalSeeder::class);
    $this->call(TypeIdentificationSeeder::class);
    $this->call(StatusSeeder::class);

    User::create([
      'name' => 'Ower A Campos Alfonso',
      'identification' => '1024500065',
      'email' => 'owerion22@gmail.com',
      'password' => bcrypt('LoreCamiJuli1'),
    ]);
  }
}
