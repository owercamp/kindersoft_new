<?php

namespace App\Models;

use App\Models\States;
use App\Models\Calendar;
use App\Models\Headquarter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalendarHeadquarter extends Model
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
  protected $fillable = ['number_register', 'headquarter_id', 'calendar_id', 'start_date', 'end_date'];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'number_register' => 'integer',
    'headquarter_id' => 'integer',
    'calendar_id' => 'integer',
    'state_id' => 'integer',
    'start_date' => 'date',
    'end_date' => 'date'
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  public function state() : MorphOne
  {
    return $this->morphOne(States::class, 'stateable');
  }

  public function headquarter() : HasOne
  {
    return $this->hasOne(Headquarter::class, 'id', 'headquarter_id');
  }

  public function calendar() : HasOne
  {
    return $this->hasOne(Calendar::class, 'id', 'calendar_id');
  }
}
