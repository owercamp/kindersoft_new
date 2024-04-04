<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmploymentPosition extends Model
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
  protected $fillable = ['register', 'name'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'register' => 'integer',
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
    return $this->attributes['name'] = trim(ucfirst(strtolower($value)));
  }

  /**
   * Set the register
   *
   * @param  string  $value
   * @return void
   */
  public function setRegisterAttribute($value)
  {
    return $this->attributes['register'] = trim($value);
  }

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;
}
