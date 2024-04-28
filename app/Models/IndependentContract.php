<?php

namespace App\Models;

use App\Models\Attendant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IndependentContract extends Model
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
  protected $fillable = ['attendant_id', 'description'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'attendant_id' => 'integer',
    'description' => 'string',
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * Get the attendant associated with the independent contract.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function attendant(): HasOne
  {
    return $this->hasOne(Attendant::class, 'id', 'attendant_id');
  }

  /**
   * Interact with the description attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function description(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(ucfirst(strtolower($value))),
    );
  }
}
