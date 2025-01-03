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
  protected $fillable = ['register', 'date', 'scheduling_id'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'register' => 'integer',
    'date' => 'date',
    'scheduling_id' => 'integer',
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

  public function quotationable()
  {
    return $this->morphedByMany(Admissions::class, 'quotationable');
  }

  public function loadQuotationable()
  {
    return $this->load([
      'quotationable' => function ($query) {
        $query->with([
          Journays::class,
          Feeding::class,
          Uniform::class,
          ExtraTime::class,
          Extracurricular::class,
          Transport::class
        ]);
      }
    ])->get();
  }
}
