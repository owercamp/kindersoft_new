<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
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
    protected $fillable = ['headquarters', 'country_id', 'department_id', 'municipality_id', 'city_id', 'neighborhood_id', 'postal_id', 'address', 'phone'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'id' => 'integer',
      'headquarters' => 'string',
      'country_id' => 'integer',
      'department_id' => 'integer',
      'municipality_id' => 'integer',
      'city_id' => 'integer',
      'neighborhood_id' => 'integer',
      'postal_id' => 'integer',
      'address' => 'string',
      'phone' => 'string'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function company()
    {
      return $this->hasOne(GeneralInformation::class, 'id', 'company_id');
    }
}
