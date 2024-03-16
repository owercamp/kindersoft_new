<?php

namespace App\Models;

use App\Models\States;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StatesNames extends Model
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
     * @var array<string>
     */
    protected $fillable = ['name'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
      'id' => 'integer',
      'name' => 'string'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function states() : HasOne
    {
       return $this->hasOne(States::class, 'state_id', 'id');
    }
}
