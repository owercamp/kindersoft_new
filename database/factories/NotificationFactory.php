<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'email' => $this->faker->email,
      'content' => $this->faker->text,
      'type' => $this->faker->randomElement(['administrative', 'admission', 'academic', 'logistic', 'finance'])
    ];
  }
}
