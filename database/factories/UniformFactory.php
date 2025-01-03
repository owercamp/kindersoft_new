<?php

namespace Database\Factories;

use App\Models\StatesNames;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Uniform>
 */
class UniformFactory extends Factory
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
      'description' => $this->faker->word(),
      'price' => $this->faker->randomNumber(5),
      'status_id' => fn() => $this->faker->randomElement(StatesNames::pluck('id')->toArray())
    ];
  }
}
