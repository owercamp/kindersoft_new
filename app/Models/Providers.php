<?php

namespace App\Models;

use App\Models\Legal;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Providers extends Model
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
  protected $fillable = ['register', 'person'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'register' => 'integer',
    'person' => 'string'
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * Retrieve the associated Person model for this Providers model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function person(): BelongsTo
  {
    return $this->belongsTo(Person::class, 'id', 'provider_id');
  }

  /**
   * Retrieve the associated Legal model for this Providers model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function legal(): BelongsTo
  {
    return $this->belongsTo(Legal::class, 'id', 'provider_id');
  }
}
