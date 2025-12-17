<?php

namespace App\Services;

use App\Models\AdminUser;
use App\Models\Seller;
use App\Models\Sale;
use App\Http\Requests\StoreSellerRequest;

use Illuminate\Support\Facades\Auth;

class UserAdminService{
    protected $Seller;

    public function __construct(Seller $seller){
        $this->seller = $seller;
    }


    public function createSeller(StoreSellerRequest $request)
    {
        if(/*Auth::AdminUser()->isAdmin()*/true){

            $seller = $this->seller->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'comission' => $request->get('comission')]);

            return $seller;
        }
    }
}