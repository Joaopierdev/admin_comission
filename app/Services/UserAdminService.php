<?php

namespace App\Services;

use App\Models\AdminUser;
use App\Models\Seller;
use App\Models\Sale;
use App\Repositories\SellerRepository;


use Illuminate\Support\Facades\Auth;

class UserAdminService{

    public function __construct(SellerRepository $sellerRepository){
        $this->sellerRepository = $sellerRepository;
    }

    public function getAdminUsers()
    {
        $users = AdminUser::get();

        return $users;
    }


    public function createSeller(Array $request)
    {
        if(/*Auth::AdminUser()->isAdmin()*/true){
            $seller = $this->sellerRepository->createModel($request);
    
        }
        return $seller;
    }
}