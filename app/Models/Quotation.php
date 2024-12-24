<?php

namespace App\Models;

use App\Models\Admissions;
use App\Models\Extracurricular;
use App\Models\ExtraTime;
use App\Models\Feeding;
use App\Models\Journays;
use App\Models\Scheduling;
use App\Models\Transport;
use App\Models\Uniform;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Quotation extends Model
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
  protected $fillable = ['register', 'date', 'scheduling_id', 'admission_id', 'journal_id', 'feeding_id', 'uniform_id', 'extra_time_id', 'extra_curricular_id', 'transport_id'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'register' => 'integer',
    'date' => 'date',
    'scheduling_id' => 'integer',
    'admission_id' => 'integer',
    'journal_id' => 'integer',
    'feeding_id' => 'integer',
    'uniform_id' => 'integer',
    'extra_time_id' => 'integer',
    'extra_curricular_id' => 'integer',
    'transport_id' => 'integer'
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   *
   * RelationShips
   *
   */
  public function scheduling(): HasOne
  {
    return $this->hasOne(Scheduling::class, 'id', 'scheduling_id');
  }

  public function admission(): HasOne
  {
    return $this->hasOne(Admissions::class, 'id', 'admission_id');
  }

  public function journal(): HasOne
  {
    return $this->hasOne(Journays::class, 'id', 'journal_id');
  }

  public function feeding(): HasMany
  {
    return $this->hasMany(Feeding::class, 'id', 'feeding_id');
  }

  public function uniform(): HasMany
  {
    return $this->hasMany(Uniform::class, 'id', 'uniform_id');
  }

  public function extra_time(): HasMany
  {
    return $this->hasMany(ExtraTime::class, 'id', 'extra_time_id');
  }

  public function extra_curricular(): HasMany
  {
    return $this->hasMany(Extracurricular::class, 'id', 'extra_curricular_id');
  }

  public function transport(): HasMany
  {
    return $this->hasMany(Transport::class, 'id', 'transport_id');
  }
}
