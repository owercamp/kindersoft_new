<?php

namespace Database\Factories;

use App\Models\AcademicLevel;
use App\Models\Bloodtype;
use App\Models\City;
use App\Models\Country;
use App\Models\Departament;
use App\Models\Genre;
use App\Models\Municipality;
use App\Models\Neighborhood;
use App\Models\Postal;
use App\Models\StatesNames;
use App\Models\TypeIdentification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendant>
 */
class AttendantFactory extends Factory
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
      'firstname' => $this->faker->firstName,
      'middlename' => $this->faker->firstName,
      'lastname' => $this->faker->lastName,
      'middlelastname' => $this->faker->lastName,
      'number_document' => $this->faker->numberBetween(1000000, 9999999),
      'email' => $this->faker->unique()->safeEmail,
      'address' => $this->faker->address,
      'phone' => $this->faker->phoneNumber,
      'city_id' => fn() => $this->faker->randomElement(City::pluck('id')->toArray()),
      'country_id' => fn() => $this->faker->randomElement(Country::pluck('id')->toArray()),
      'department_id' => fn() => $this->faker->randomElement(Departament::pluck('id')->toArray()),
      'municipality_id' => fn() => $this->faker->randomElement(Municipality::pluck('id')->toArray()),
      'location_id' => fn() => $this->faker->randomElement(Neighborhood::pluck('id')->toArray()),
      'postal_id' => fn() => $this->faker->randomElement(Postal::pluck('id')->toArray()),
      'nationality_id' => fn() => $this->faker->randomElement(Country::pluck('id')->toArray()),
      'genre_id' => fn() => $this->faker->randomElement(Genre::pluck('id')->toArray()),
      'bloodtype_id' => fn() => $this->faker->randomElement(Bloodtype::pluck('id')->toArray()),
      'academic_id' => fn() => $this->faker->randomElement(AcademicLevel::pluck('id')->toArray()),
      'status_id' => fn() => $this->faker->randomElement(StatesNames::pluck('id')->toArray()),
      'type_identification_id' => fn() => $this->faker->randomElement(TypeIdentification::pluck('id')->toArray()),
      'contract' => $this->faker->randomElement(['DEPENDIENTE', 'INDEPENDIENTE']),
    ];
  }
}
