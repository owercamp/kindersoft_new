<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TypeIdentification extends Model
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
   * Set the name
   *
   * @param  string  $value
   * @return void
   */
  public function setNameAttribute($value)
  {
    return $this->attributes['name'] = trim(ucwords(strtolower($value)));
  }

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * Retrieve the associated Person model for this TypeIdentification model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function person(): HasOne
  {
    return $this->hasOne(Person::class, 'type_identification_id', 'id');
  }
}
