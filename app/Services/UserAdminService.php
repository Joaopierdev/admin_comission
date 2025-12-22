<?php

namespace App\Services;

use App\Models\AdminUser;
use App\Models\Seller;
use App\Models\Sale;
use App\Repositories\SellerRepository;
use App\Repositories\AdminUserRepository;


use Illuminate\Support\Facades\Auth;

class UserAdminService{

    public function __construct(SellerRepository $sellerRepository, AdminUserRepository $adminUserRepository){
        $this->sellerRepository = $sellerRepository;
        $this->adminUserRepository = $adminUserRepository;
    }

    public function createSeller(Array $request)
    {
        $seller = new Seller([
        'name' => $request['name'],
        'email' => $request['email'],
        'comission' => $request['comission']
        ]);

        $seller = $this->sellerRepository->createModel($seller);
    
        return $seller;
    }

    public function getAdminUsers()
    {
        $users = AdminUser::get();

        return $users;
    }

    public function createAdminUser(Array $request)
    {
        $adminUser = new AdminUser([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password']
        ]);

        $adminUser = $this->adminUserRepository->createAdminUser($adminUser);

        return $adminUser;
    }
}