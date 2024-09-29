<?php

namespace Database\Factories;

use App\Models\Intelligence;
use App\Models\StatesNames;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'intelligence_id' => fn() => $this->faker->randomElement(Intelligence::pluck('id')->toArray()),
      'register' => $this->faker->numberBetween(1000, 9999),
      'description' => $this->faker->sentence(5),
      'status_id' => fn() => $this->faker->randomElement(StatesNames::pluck('id')->toArray())
    ];
  }
}
