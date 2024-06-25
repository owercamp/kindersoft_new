<?php

namespace App\Models;

use App\Models\Legal;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Providers extends Model
{
  use HasFactory;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'providers';

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
  public function personal(): HasOne
  {
    return $this->hasOne(Person::class, 'provider_id', 'id');
  }

  /**
   * Retrieve the associated Legal model for this Providers model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function legal(): HasOne
  {
    return $this->hasOne(Legal::class, 'provider_id', 'id');
  }
}
