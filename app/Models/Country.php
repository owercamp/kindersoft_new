<?php

namespace App\Models;

use App\Models\Departament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
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
  protected $fillable = ['name', 'iso', 'capital', 'code_country'];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * Retrieve the associated departaments.
   *
   * @return HasMany The associated departaments.
   */
  public function departament(): HasMany
  {
    return $this->hasMany(Departament::class, 'country_id', 'id');
  }
}
