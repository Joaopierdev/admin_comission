<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdminUser;

class AdminUserRepository
{   
    public function __construct(AdminUser $admin)
    {
        $this->admin = $admin;
    }

    public function createAdminUser(AdminUser $admin)
    {
        $admin->save();
        return $admin;
    }



}