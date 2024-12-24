<?php

namespace Database\Factories;

use App\Models\Admissions;
use App\Models\Extracurricular;
use App\Models\ExtraTime;
use App\Models\Feeding;
use App\Models\Journays;
use App\Models\Scheduling;
use App\Models\Transport;
use App\Models\Uniform;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quotation>
 */
class QuotationFactory extends Factory
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
      'date' => $this->faker->date('Y-m-d'),
      'scheduling_id' => fn() => $this->faker->randomElement(Scheduling::pluck('id')->toArray()),
      'admission_id' => fn() => $this->faker->randomElement(Admissions::pluck('id')->toArray()),
      'journal_id' => fn() => $this->faker->randomElement(Journays::pluck('id')->toArray()),
      'feeding_id' => fn() => $this->faker->randomElement(Feeding::pluck('id')->toArray()),
      'uniform_id' => fn() => $this->faker->randomElement(Uniform::pluck('id')->toArray()),
      'extra_time_id' => fn() => $this->faker->randomElement(ExtraTime::pluck('id')->toArray()),
      'extra_curricular_id' => fn() => $this->faker->randomElement(Extracurricular::pluck('id')->toArray()),
      'transport_id' => fn() => $this->faker->randomElement(Transport::pluck('id')->toArray())
    ];
  }
}
