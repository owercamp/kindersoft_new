<?php

namespace App\Models;

use App\Models\PotentialCustomer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Scheduling extends Model
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
  protected $fillable = ['date', 'time', 'potential_customer_id','attended','observations'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'date' => 'date',
    'time' => 'string',
    'potential_customer_id' => 'integer',
    'attended' => 'string',
    'observations' => 'string',
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * Get the PotentialCustomer record associated with the Scheduling.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function customer_client(): HasOne
  {
    return $this->hasOne(PotentialCustomer::class, 'id', 'potential_customer_id');
  }
}
