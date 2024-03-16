<?php

namespace App\Models;

use App\Models\StatesNames;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class States extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['stateable_type', 'stateable_id', 'state_id'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'stateable_type' => 'string',
    'stateable_id' => 'integer',
    'state_id' => 'integer'
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  public function stateable() : MorphTo
  {
    return $this->morphTo();
  }

  public function state_name() : HasOne
  {
    return $this->hasOne(StatesNames::class, 'id', 'state_id');
  }
}
