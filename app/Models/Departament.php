<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departament extends Model
{
  use HasFactory;

  /**
   * The primary key associated with the table.
   *
   * @var string
   */
  protected $primaryKey = 'id';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'country_id'];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'country_id' => 'integer',
    'name' => 'string'
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * Retrieve the associated country for this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function country(): HasOne
  {
    return $this->hasOne(Country::class, 'id', 'country_id');
  }

  /**
   * Retrieves the municipalities associated with this departament.
   *
   * @return HasMany The municipalities associated with this departament.
   */
  public function municipality(): HasMany
  {
    return $this->hasMany(Municipality::class, 'departament_id', 'id');
  }
}
