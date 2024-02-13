<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GeneralInformation extends Model
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
  protected $fillable = ['company', 'commercial', 'nit', 'dv', 'email', 'website', 'number_locations'];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'company' => 'string',
    'commercial' => 'string',
    'nit' => 'integer',
    'dv' => 'integer',
    'email' => 'string',
    'website' => 'string',
    'number_locations' => 'integer'
  ];

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  public function headquarters(): HasMany
  {
    return $this->hasMany(Headquarter::class, 'company_id', 'id');
  }
}
