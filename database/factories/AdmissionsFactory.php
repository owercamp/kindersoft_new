<?php

namespace Database\Factories;

use App\Models\StatesNames;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admissions>
 */
class AdmissionsFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'register' => $this->faker->numberBetween(1000, 9999),
      'description' => $this->faker->sentence(2),
      'price' => $this->faker->randomFloat(0, 9000, 10000),
      'status_id' => fn() => $this->faker->randomElement(StatesNames::pluck('id')->toArray()),
    ];
  }
}
