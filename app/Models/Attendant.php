<?php

namespace App\Models;

use App\Models\City;
use App\Models\Genre;
use App\Models\Postal;
use App\Models\Country;
use App\Models\Bloodtype;
use App\Models\Departament;
use App\Models\Municipality;
use App\Models\Neighborhood;
use App\Models\AcademicLevel;
use App\Models\DependentContract;
use App\Models\TypeIdentification;
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
   * Retrieve the full name attribute for the attendant.
   *
   * @return mixed
   */
  public function getFullNameAttribute()
  {
    return "$this->firstname $this->middlename $this->lastname $this->middlelastname
    ";
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
   * Retrieve the identification associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function identification(): HasOne
  {
    return $this->hasOne(TypeIdentification::class, 'id', 'type_identification_id');
  }


  /**
   * Retrieve the country associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function country(): HasOne
  {
    return $this->hasOne(Country::class, 'id', 'country_id');
  }

  /**
   * Retrieve the department associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function department(): HasOne
  {
    return $this->hasOne(Departament::class, 'id', 'department_id');
  }

  /**
   * Retrieve the municipality associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function municipality(): HasOne
  {
    return $this->hasOne(Municipality::class, 'id', 'municipality_id');
  }


  /**
   * Retrieve the city associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function city(): HasOne
  {
    return $this->hasOne(City::class, 'id', 'city_id');
  }


  /**
   * Retrieve the neighborhood associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function neighborhood(): HasOne
  {
    return $this->hasOne(Neighborhood::class, 'id', 'location_id');
  }

    /**
     * Retrieve the postal associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne The postal relation.
     */
  public function postal(): HasOne
  {
    return $this->hasOne(Postal::class, 'id', 'postal_id');
  }


  /**
   * Retrieve the nationality associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The nationality relation.
   */
  public function nationality(): HasOne
  {
    return $this->hasOne(Country::class, 'id', 'nationality_id');
  }

  /**
   * Retrieve the genre associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The genre relation.
   */
  public function genre(): HasOne
  {
    return $this->hasOne(Genre::class, 'id', 'genre_id');
  }

  /**
   * Retrieve the academic level associated with this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The academic level relation.
   */
  public function academic(): HasOne
  {
    return $this->hasOne(AcademicLevel::class, 'id', 'academic_id');
  }

  /**
   * Retrieve the blood type associated with this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The blood type relation.
   */
  public function bloodtype(): HasOne
  {
    return $this->hasOne(Bloodtype::class, 'id', 'bloodtype_id');
  }


  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;
}
