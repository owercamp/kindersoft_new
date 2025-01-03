<?php

namespace Database\Factories;

use App\Models\StatesNames;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Journays>
 */
class JournaysFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'description' => $this->faker->word(),
      'register' => $this->faker->numberBetween(1000, 9999),
      'price' => $this->faker->randomNumber(5),
      'status_id' => fn() => $this->faker->randomElement(StatesNames::pluck('id')->toArray()),
    ];
  }
}
