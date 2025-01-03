<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotationable extends Model
{
    use HasFactory;

    /**
    * The primary key for the model.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quotationables';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<string>
    */
    protected $fillable = [
      'quotation_id',
      'quotationable_id',
      'quotationable_type',
    ];

    /**
    * The attributes that should be cast.
    *
    * @var array
    */
    protected $casts = [
      'id' => 'integer',
      'quotation_id' => 'integer',
      'quotationable_id' => 'integer',
      'quotationable_type' => 'string',
    ];

    /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
    public $timestamps = true;
}
