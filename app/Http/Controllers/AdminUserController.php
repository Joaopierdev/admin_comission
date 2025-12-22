<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Services\UserAdminService;
use App\Http\Requests\StoreAdminRequest;



class AdminUserController extends Controller
{
    protected $userAdminService;
    public function __construct(UserAdminService $userAdminService)
    {
        $this->userAdminService = $userAdminService;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userAdminService->getAdminUsers();

        return $users;
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $requestValidated = $request->validated();
        $admin = $this->userAdminService->createAdminUser($requestValidated);

        return response()->json($admin, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminUser $adminUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminUser $adminUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminUser $adminUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminUser $adminUser)
    {
        //
    }
}
