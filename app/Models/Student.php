<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Country;
use App\Models\Bloodtype;
use App\Models\StatesNames;
use App\Models\HealthCareProvider;
use App\Models\TypeIdentification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
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
    'identification',
    'number_identification',
    'firstname',
    'middlename',
    'lastname',
    'middlelastname',
    'nationality_id',
    'blood_id',
    'genre_id',
    'other_genre',
    'gestation',
    'velivery',
    'sibling',
    'place',
    'allergy',
    'allergys',
    'therapy',
    'therapies',
    'prepaid',
    'prepaids',
    'special',
    'specials',
    'lives',
    'eps_id',
    'status_id'
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'register' => 'integer',
    'identification' => 'integer',
    'number_identification' => 'string',
    'firstname' => 'string',
    'middlename' => 'string',
    'lastname' => 'string',
    'middlelastname' => 'string',
    'nationality_id' => 'integer',
    'blood_id' => 'integer',
    'genre_id' => 'integer',
    'other_genre' => 'string',
    'gestation' => 'integer',
    'velivery' => 'string',
    'sibling' => 'integer',
    'place' => 'string',
    'allergy' => 'boolean',
    'allergys' => 'string',
    'therapy' => 'boolean',
    'therapies' => 'string',
    'prepaid' => 'boolean',
    'prepaids' => 'string',
    'special' => 'boolean',
    'specials' => 'string',
    'lives' => 'string',
    'eps_id' => 'integer',
    'status_id' => 'integer'
  ];

  /**
   * Get the fullname attribute.
   *
   * @param  string  $value
   * @return string
   */
  public function getFullNameAttribute()
  {
    return "$this->firstname $this->middlename $this->lastname $this->middlelastname";
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
   * A description of the type_identification function.
   *
   * @return HasOne
   */
  public function type_identification(): HasOne
  {
    return $this->hasOne(TypeIdentification::class, 'id', 'identification_id');
  }

  /**
   * A description of the bloodtype function.
   *
   * @return HasOne
   */
  public function bloodtype(): HasOne
  {
    return $this->hasOne(Bloodtype::class, 'id', 'blood_id');
  }

  /**
   * A description of the nationality function.
   *
   * @return HasOne
   */
  public function nationality(): HasOne
  {
    return $this->hasOne(Country::class, 'id', 'nationality_id');
  }

  /**
   * A description of the genre function.
   *
   * @return HasOne
   */
  public function genre(): HasOne
  {
    return $this->hasOne(Genre::class, 'id', 'genre_id');
  }

  /**
   * A description of the eps function.
   *
   * @return HasOne
   */
  public function eps(): HasOne
  {
    return $this->hasOne(HealthCareProvider::class, 'id', 'eps_id');
  }

    /**
     * Retrieve the status of the student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
  public function status(): HasOne
  {
    return $this->hasOne(StatesNames::class, 'id', 'status_id');
  }
}
