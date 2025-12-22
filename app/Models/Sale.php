<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    // use HasFactory;
    protected $fillable = [
        'seller_id',
        'sale_date',
        'sale_price',
        'porcentage_comission',
        'value_comission',
    ];


    public function seller(): BelongsTo
    {

        return $this->belongsTo(Seller::class);
    }
}
