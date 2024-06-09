<?php

namespace App\Models;

use App\Models\City;
use App\Models\Postal;
use App\Models\Country;
use App\Models\Departament;
use App\Models\Municipality;
use App\Models\Neighborhood;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Legal extends Model
{
  use HasFactory;

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
    'nit',
    'company_name',
    'address',
    'country_id',
    'department_id',
    'municipality_id',
    'city_id',
    'neighborhood_id',
    'postal_id',
    'phone',
    'email'
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'country_id' => 'integer',
    'department_id' => 'integer',
    'municipality_id' => 'integer',
    'city_id' => 'integer',
    'neighborhood_id' => 'integer',
    'postal_id' => 'integer',
    'company_name' => 'string',
    'address' => 'string',
    'phone' => 'string',
    'email' => 'string',
    'nit' => 'string'
  ];

  /**
   * Interact with the company_name attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function company_name(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(ucfirst(strtolower($value))),
    );
  }

  /**
   * Interact with the address attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function address(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(ucfirst(strtolower($value))),
    );
  }

  /**
   * Retrieve the associated country for this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The associated country.
   */
  public function country(): HasOne
  {
    return $this->hasOne(Country::class, 'id', 'country_id');
  }

  /**
   * Retrieve the associated department for this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The associated municipality.
   */
  public function department(): HasOne
  {
    return $this->hasOne(Departament::class, 'id', 'department_id');
  }

  /**
   * Retrieve the associated municipality for this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The associated municipality.
   */
  public function municipality(): HasOne
  {
    return $this->hasOne(Municipality::class, 'id', 'municipality_id');
  }

  /**
   * Retrieve the associated city for this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The associated city.
   */
  public function city(): HasOne
  {
    return $this->hasOne(City::class, 'id', 'city_id');
  }

  /**
   * Retrieve the associated neighborhood for this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The associated neighborhood.
   */
  public function neighborhood(): HasOne
  {
    return $this->hasOne(Neighborhood::class, 'id', 'neighborhood_id');
  }

  /**
   * Retrieve the associated postal for this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The associated postal.
   */
  public function postal(): HasOne
  {
    return $this->hasOne(Postal::class, 'id', 'postal_id');
  }
}
