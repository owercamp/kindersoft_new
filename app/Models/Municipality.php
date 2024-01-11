<?php

namespace App\Models;

use App\Models\City;
use App\Models\Departament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipality extends Model
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
  protected $fillable = ['name', 'departament_id'];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'departament_id' => 'integer',
    'name' => 'string',
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * Retrieves the department associated with this model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne The department relation.
   */
  public function departament(): HasOne
  {
    return $this->hasOne(Departament::class, 'id', 'departament_id');
  }

  /**
   * Retrieves the cities associated with this municipality.
   *
   * @return HasMany The relationship between the municipality and its cities.
   */
  public function city(): HasMany
  {
    return $this->hasMany(City::class, 'municipality_id', 'id');
  }
}
