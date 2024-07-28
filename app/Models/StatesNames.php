<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\States;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatesNames extends Model
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
   * @var array<string>
   */
  protected $fillable = ['name'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'name' => 'string'
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  public function states(): HasOne
  {
    return $this->hasOne(States::class, 'state_id', 'id');
  }

  /**
   * A description of the entire PHP function.
   *
   * @return HasMany
   */
  public function attendant(): HasMany
  {
    return $this->hasMany(Attendant::class, 'status_id', 'id');
  }

  /**
   * A description of the entire PHP function.
   *
   * @return HasMany
   */
  public function student(): HasMany
  {
    return $this->hasMany(Student::class, 'status_id', 'id');
  }

  /**
   * Returns a HasMany relationship between the StatesNames model and the Providers model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function provider(): HasMany
  {
    return $this->hasMany(Providers::class, 'status_id', 'id');
  }

  /**
   * Returns a HasMany relationship between the StatesNames model and the
   * Admissions model, where the foreign key is 'status_id' and the local key is 'id'.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function admission(): HasMany
  {
    return $this->hasMany(Admissions::class, 'status_id', 'id');
  }

  /**
   * A description of the entire PHP function.
   *
   * @return HasMany
   */
  public function grade(): HasMany
  {
    return $this->hasMany(Grade::class, 'status', 'id');
  }

  /**
   * Returns a HasMany relationship between the StatesNames model and the Course model,
   * where the foreign key is 'status_id' and the local key is 'id'.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function course(): HasMany
  {
    return $this->hasMany(Course::class, 'status_id', 'id');
  }
}
