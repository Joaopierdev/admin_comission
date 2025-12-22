<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;

class SaleRepository{

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }


    public function createSale(Sale $sale)
    {
        $sale->save();
        
        return $sale;
        
    }

    public function getSales()
    {
        $sales = Sale::get();

        return $sales;
    }
}