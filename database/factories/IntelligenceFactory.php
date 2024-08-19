<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Intelligence>
 */
class IntelligenceFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'name' => $this->faker->word(),
      'register' => $this->faker->numberBetween(1000, 9999),
      'status_id' => round($this->faker->numberBetween(1, 2)),
    ];
  }
}
