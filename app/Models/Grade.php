<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
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
  protected $fillable = ['register', 'description', 'status'];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  public function status()
  {
    return $this->hasOne(StatesNames::class, 'id', 'status');
  }
}
