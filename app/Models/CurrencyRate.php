<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyRate extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'currency_rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'currency_id', 'exchange_currency_id', 'rate', 'created_at', 'updated_at', 'deleted_at',
    ];

    public function exchangeCurrency()
    {
        return $this->belongsTo(Currency::class, 'exchange_currency_id');
    }
}
