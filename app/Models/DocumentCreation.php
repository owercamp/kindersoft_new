<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCreation extends Model
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
  protected $fillable = ['name', 'register'];

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
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;
}
