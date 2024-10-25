<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Scheduling;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
    'phone' => 'string',
    'whatsapp' => 'string',
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

  /**
   * Get the Scheduling record associated with the PotentialCustomer
   * that is registered.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function asigned(): hasOne
  {
    return $this->hasOne(Scheduling::class, 'potential_customer_id', 'id');
  }

  /**
   * Get the birthdate attribute.
   *
   * @param  date  $value
   * @return string
   */
  public function getBirthdateAttribute($value)
  {
    $message = '';
    $birthday = Carbon::parse($value);
    $now = Carbon::now();

    $diffYears = $now->diffInYears($birthday);
    $diffMonths = $now->diffInMonths($birthday) % 12;
    $diffDays = $now->diffInDays($birthday) % 30;
    if ($diffYears == 0) {
      if ($diffMonths == 0) {
        $message = str_pad($diffDays, 2, '0', STR_PAD_LEFT) . ' dias';
      } else {
        $message = str_pad($diffMonths, 2, '0', STR_PAD_LEFT) . ' meses';
      }
    } else {
      $message = str_pad($diffYears, 2, '0', STR_PAD_LEFT) . ' años y ' . str_pad($diffMonths, 2, '0', STR_PAD_LEFT) . ' meses';
    }
    return $message;
  }
}
