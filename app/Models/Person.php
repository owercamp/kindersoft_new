<?php

namespace App\Models;

use App\Models\City;
use App\Models\Postal;
use App\Models\Country;
use App\Models\Departament;
use App\Models\Municipality;
use App\Models\Neighborhood;
use App\Models\TypeIdentification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
  use HasFactory;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'people';

  /**
   * The primary key for the model.
   *
   * @var string
   */
  protected $primaryKey = 'id';

  /**
   * The attributes that are mass assignable.
   *
   * @var array<string>
   */
  protected $fillable = [
    'type_identification_id',
    'document_number',
    'first_name',
    'middle_name',
    'last_name',
    'middle_last_name',
    'address',
    'phone',
    'country_id',
    'department_id',
    'municipality_id',
    'city_id',
    'neighborhood_id',
    'postal_id',
    'email',
    'provider_id'
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'type_identification_id' => 'integer',
    'document_number' => 'string',
    'first_name' => 'string',
    'middle_name' => 'string',
    'last_name' => 'string',
    'middle_last_name' => 'string',
    'address' => 'string',
    'phone' => 'string',
    'country_id' => 'integer',
    'department_id' => 'integer',
    'municipality_id' => 'integer',
    'city_id' => 'integer',
    'neighborhood_id' => 'integer',
    'postal_id' => 'integer',
    'email' => 'string',
    'provider_id' => 'integer'
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * Interact with the first_name attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function first_name(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(ucfirst(strtolower($value))),
    );
  }

  /**
   * Interact with the middle_name attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function middle_name(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(ucfirst(strtolower($value))),
    );
  }

  /**
   * Interact with the last_name attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function last_name(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(ucfirst(strtolower($value))),
    );
  }

  /**
   * Interact with the middle_last_name attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function middle_last_name(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(ucfirst(strtolower($value))),
    );
  }

  /**
   * Retrieves the associated TypeIdentification model for this Person model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  function identification(): HasOne
  {
    return $this->hasOne(TypeIdentification::class, 'id', 'type_identification_id');
  }

  /**
   * Retrieve the country associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The country relation.
   */
  function country(): HasOne
  {
    return $this->hasOne(Country::class, 'id', 'country_id');
  }

  /**
   * Retrieve the department associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The department relation.
   */
  function department(): HasOne
  {
    return $this->hasOne(Departament::class, 'id', 'department_id');
  }

  /**
   * Retrieve the municipality associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The municipality relation.
   */
  function municipality(): HasOne
  {
    return $this->hasOne(Municipality::class, 'id', 'municipality_id');
  }

  /**
   * Retrieve the city associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The city relation.
   */
  function city(): HasOne
  {
    return $this->hasOne(City::class, 'id', 'city_id');
  }

  /**
   * Retrieve the neighborhood associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The neighborhood relation.
   */
  function neighborhood(): HasOne
  {
    return $this->hasOne(Neighborhood::class, 'id', 'neighborhood_id');
  }

  /**
   * Retrieve the postal associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The postal relation.
   */
  function postal(): HasOne
  {
    return $this->hasOne(Postal::class, 'id', 'postal_id');
  }

  /**
   * Retrieve the provider associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The provider relation.
   */
  public function provider(): HasOne
  {
    return $this->hasOne(Provider::class, 'id', 'provider_id');
  }

    /**
     * Retrieves the full name of the person.
     *
     * @return string The full name of the person, including the first name, middle name, last name, and middle last name.
     */
  public function getFullNameAttribute()
  {
    return "$this->first_name $this->middle_name $this->last_name $this->middle_last_name";
  }
}
