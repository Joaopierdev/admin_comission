<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Seller;

class SellerRepository
{
    public function __construct(Seller $model){
        $this->model = $model;
    }

    public function createModel(Array $model){
        $seller = Seller::create([
        'name' => $model['name'],
        'email' => $model['email'],
        'comission' => $model['comission']
        ]);

        return $seller;
    }
}
