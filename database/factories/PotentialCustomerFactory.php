<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PotentialCustomer>
 */
class PotentialCustomerFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $number = $this->faker->phoneNumber();
    return [
      'register' => $this->faker->numberBetween(1000, 9999),
      'date' => $this->faker->date('Y-m-d', 'now'),
      'name_attendant' => $this->faker->name(),
      'phone' => $number,
      'whatsapp' => $number,
      'email' => $this->faker->email(),
      'aplicants' => $this->faker->numberBetween(1, 9),
      'name_applicant' => $this->faker->name(),
      'gende_id' => fn() => $this->faker->randomElement(Genre::pluck('id')->toArray()),
      'birthdate' => $this->faker->date('Y-m-d', 'now')
    ];
  }
}
