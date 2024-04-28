<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DependentContract extends Model
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
   * @var array
   * */
  protected $fillable = ['attendant_id', 'company', 'nit', 'position_id', 'date_entry'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'attendant_id' => 'integer',
    'position_id' => 'integer',
    'date_entry' => 'date',
    'company' => 'string',
    'nit' => 'string'
  ];

  /**
   * Interact with the company attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function company(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(strtoupper(strtolower($value))),
    );
  }

  public function attendant(): HasOne
  {
    return $this->hasOne(Attendant::class, 'id', 'attendant_id');
  }

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;
}
