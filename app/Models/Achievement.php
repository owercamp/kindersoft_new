<?php

namespace App\Models;

use App\Models\Intelligence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Achievement extends Model
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
  protected $fillable = ['intelligence_id', 'register', 'description', 'status_id'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'intelligence_id' => 'integer',
    'register' => 'integer',
    'status_id' => 'integer',
    'description' => 'string',
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;


  /**
   * Get the intelligence that owns the achievement.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function intelligence(): BelongsTo
  {
    return $this->belongsTo(Intelligence::class, 'id', 'intelligence_id');
  }

  /**
   * Retrieve the status associated with this achievement.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The status relation.
   */
  public function status(): HasOne
  {
    return $this->hasOne(StatesNames::class, 'id', 'status_id');
  }
}
