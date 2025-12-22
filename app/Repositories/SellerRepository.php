<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Seller;

class SellerRepository
{
    public function __construct(Seller $seller){
        $this->seller = $seller;
    }

    public function createModel(Seller $seller){
        $seller->save();
        
        return $seller;
    }
}
