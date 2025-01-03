<?php

namespace App\Models;

use App\Models\Quotation;
use App\Models\StatesNames;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Feeding extends Model
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
  protected $fillable = ['register', 'description', 'price', 'status'];

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

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * Retrieve the status associated with this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The status relation.
   */
  public function status(): HasOne
  {
    return $this->hasOne(StatesNames::class, 'id', 'status_id');
  }

  /**
   * Retrieve the quotations associated with this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\MorphToMany The quotations relation.
   */
  public function quotation(): MorphToMany
  {
    return $this->morphToMany(Quotation::class, 'quotationable');
  }
}
