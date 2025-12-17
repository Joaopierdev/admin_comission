<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    // use HasFactory;
    protected $table = 'sellers';
    protected $fillable = [
        'name',
        'email',
        'comission',
    ];

       public function sale(): HasMany
    {
        return $this->HasMany(Sale::class);
    }

}
