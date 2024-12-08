<?php

namespace Database\Factories;

use App\Models\PotentialCustomer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scheduling>
 */
class SchedulingFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'date' => $this->faker->dateTimeBetween('2019-01-01','now')->format('Y-m-d'),
      'time' => $this->faker->time('H:i:s'),
      'potential_customer_id' => fn() => $this->faker->randomElement(PotentialCustomer::pluck('id')->toArray()),
      'attended' => fn() => $this->faker->randomElement(['attended', 'not attended']),
      'observations' => $this->faker->sentence(5)
    ];
  }
}
