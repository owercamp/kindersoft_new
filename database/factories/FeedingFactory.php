<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Feeding;
use App\Models\StatesNames;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feeding>
 */
class FeedingFactory extends Factory
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
      'price' => $this->faker->numberBetween(1000, 9999),
      'status_id' => fn () => $this->faker->randomElement(StatesNames::pluck('id')->toArray())
    ];
  }
}
