<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\Seller;
use App\Repositories\SaleRepository;

use Illuminate\Support\Facades\Auth;

class SaleService{

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }


    public function createSale(Array $request)
    {
        $sellerCommission = Seller::where('id', $request['seller_id'])->value('comission');
        $salePrice = $request['sale_price'];

        $valueComission = $this->getSaleComission($salePrice, $sellerCommission);

        $sale = new Sale([
            'seller_id' => $request['seller_id'],
            'sale_price' => $salePrice,
            'sale_date'=> $request['sale_date'],
            'porcentage_comission' => $sellerCommission,
            'value_comission' => $valueComission
        ]);

        $sale = $this->saleRepository->createSale($sale);

        return $sale;
    }

    public function getSaleComission($salePrice, $sellerCommission)
    {
        $valueComission = ($salePrice * $sellerCommission)/100;

        return $valueComission;
    }

    public function getSales()
    {
        $sales = $this->saleRepository->getSales();

        return $sales;
    }
}


