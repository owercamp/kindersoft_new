<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PotentialCustomer extends Model
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
  protected $fillable = ['register', 'date', 'name_attendant', 'phone', 'whatsapp', 'email', 'applicants', 'name_applicant', 'genre_id', 'birthdate'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'register' => 'integer',
    'date' => 'date',
    'name_attendant' => 'string',
    'phone' => 'integer',
    'whatsapp' => 'integer',
    'email' => 'string',
    'applicants' => 'integer',
    'name_applicant' => 'string',
    'genre_id' => 'integer',
    'birthdate' => 'date'
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * Interact with the name_attendant attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function name_attendant(): Attribute
  {
    return Attribute::make(
      get: fn($value) => trim(ucwords($value)),
      set: fn($value) => trim(ucwords(strtolower($value))),
    );
  }

  /**
   * Interact with the name_applicant attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function name_applicant(): Attribute
  {
    return Attribute::make(
      get: fn($value) => trim(ucwords($value)),
      set: fn($value) => trim(ucwords(strtolower($value))),
    );
  }

  /**
   * Get the genre record associated with the PotentialCustomer.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function genre(): HasOne
  {
    return $this->hasOne(Genre::class, 'id', 'genre_id');
  }
}
