<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Collaborator extends Model
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
    'register',
    'type_identification_id',
    'document_number',
    'firstname',
    'middlename',
    'lastname',
    'middlelastname',
    'country_id',
    'department_id',
    'municipality_id',
    'city_id',
    'neighborhood_id',
    'postal_id',
    'address',
    'phone',
    'email',
    'curriculum',
    'photo'
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'register' => 'integer',
    'type_identification_id' => 'integer',
    'document_number' => 'string',
    'firstname' => 'string',
    'middlename' => 'string',
    'lastname' => 'string',
    'middlelastname' => 'string',
    'country_id' => 'integer',
    'department_id' => 'integer',
    'municipality_id' => 'integer',
    'city_id' => 'integer',
    'neighborhood_id' => 'integer',
    'postal_id' => 'integer',
    'address' => 'string',
    'phone' => 'string',
    'email' => 'string',
    'curriculum' => 'string',
    'photo' => 'string'
  ];

  /**
   * Interact with the firtname attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function firstname(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(ucfirst(strtolower($value))),
    );
  }

  /**
   * Interact with the middlename attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function middlename(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(ucfirst(strtolower($value))),
    );
  }

  /**
   * Interact with the lastname attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function lastname(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(ucfirst(strtolower($value))),
    );
  }

  /**
   * Interact with the middlelastname attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function middlelastname(): Attribute
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
      set: fn ($value) => trim(ucwords(strtolower($value))),
    );
  }

  /**
   * Interact with the email attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function email(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(strtolower($value)),
    );
  }

  /**
   * Get the FullName
   *
   * @return string
   */
  public function getFullNameAttribute()
  {
    return "$this->firstname $this->middlename $this->lastname $this->middlelastname";
  }

  /**
   * relations with the model country
   *
   * @return HasOne
   */
  public function country(): HasOne
  {
    return $this->hasOne(Country::class, 'id', 'country_id');
  }

  /**
   * relations with the model department
   *
   * @return HasOne
   */
  public function department(): HasOne
  {
    return $this->hasOne(Departament::class, 'id', 'department_id');
  }

  /**
   * relations with the model municipality
   *
   * @return HasOne
   */
  public function municipality(): HasOne
  {
    return $this->hasOne(Municipality::class, 'id', 'municipality_id');
  }

  /**
   * relations with the model city
   *
   * @return HasOne
   */
  public function city(): HasOne
  {
    return $this->hasOne(City::class, 'id', 'city_id');
  }

  /**
   * relations with the model neighborhood
   *
   * @return HasOne
   */
  public function neighborhood(): HasOne
  {
    return $this->hasOne(Neighborhood::class, 'id', 'neighborhood_id');
  }

  /**
   * relations with the model zip code
   *
   * @return HasOne
   */
  public function postal(): HasOne
  {
    return $this->hasOne(Postal::class, 'id', 'postal_id');
  }

  /**
   * relations with the model type identification
   *
   * @return HasOne
   */
  public function type_identification(): HasOne
  {
    return $this->hasOne(TypeIdentification::class, 'id', 'type_identification_id');
  }

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;
}
