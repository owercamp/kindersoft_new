<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxInformation extends Model
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
    protected $fillable = ['tax_liability_id', 'form_number', 'prefix_number', 'next_invoice', 'from_number', 'up_to_number', 'effective_from', 'validity_until', 'note_1', 'note_2', 'statement'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'tax_liability_id' => 'integer',
      'form_number' => 'string',
      'next_invoice' => 'string',
      'from_number' => 'string',
      'up_to_number' => 'string',
      'prefix_number' => 'string',
      'effective_from' => 'date',
      'validity_until' => 'date',
      'note_1'=> 'string',
      'note_2'=> 'string',
      'statement'=> 'string'
    ];

    public function taxLiability(): HasOne
    {
      return $this->hasOne(Regime::class, 'id', 'tax_liability_id');
    }
}
