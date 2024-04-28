<?php

namespace App\Models;

use App\Models\DependentContract;
use App\Models\IndependentContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendant extends Model
{
  use HasFactory;

  /**
   * The primary key associated with the table.
   *
   * @var string
   */
  protected $primaryKey = 'id';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'register',
    'type_identification_id',
    'number_document',
    'firstname',
    'middlename',
    'lastname',
    'middlelastname',
    'country_id',
    'department_id',
    'municipality_id',
    'city_id',
    'location_id',
    'postal_id',
    'address',
    'phone',
    'email',
    'nationality_id',
    'genre_id',
    'genre_text',
    'academic_id',
    'academic_text',
    'bloodtype_id',
    'contract'
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'register' => 'integer',
    'type_identification_id' => 'integer',
    'number_document' => 'string',
    'firstname' => 'string',
    'middlename' => 'string',
    'lastname' => 'string',
    'middlelastname' => 'string',
    'country_id' => 'integer',
    'department_id' => 'integer',
    'municipality_id' => 'integer',
    'city_id' => 'integer',
    'location_id' => 'integer',
    'postal_id' => 'integer',
    'address' => 'string',
    'phone' => 'string',
    'email' => 'string',
    'nationality_id' => 'integer',
    'genre_id' => 'integer',
    'genre_text' => 'string',
    'academic_id' => 'integer',
    'academic_text' => 'string',
    'bloodtype_id' => 'integer',
    'contract' => 'string'
  ];

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
   * Interact with the firstname attribute.
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
   * Retrieve the dependent contract associated with the attendant.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function contract_dependent(): HasOne
  {
    return $this->hasOne(DependentContract::class, 'attendant_id', 'id');
  }

  /**
   * Retrieve the independent contract associated with the attendant.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function contract_independent(): HasOne
  {
    return $this->hasOne(IndependentContract::class, 'attendant_id', 'id');
  }

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;
}
