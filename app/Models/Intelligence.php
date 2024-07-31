<?php

namespace App\Models;

use App\Models\StatesNames;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Intelligence extends Model
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
  protected $fillable = ['name', 'register', 'status_id'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'status_id' => 'integer',
    'register' => 'integer',
    'name' => 'string'
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * Interact with the name attribute.
   *
   * return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function name(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => trim($value),
      set: fn ($value) => trim(ucfirst(strtolower($value))),
    );
  }
  /**
   * Retrieve the status associated with this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function status(): HasOne
  {
    return $this->hasOne(StatesNames::class, 'id', 'status_id');
  }
}
