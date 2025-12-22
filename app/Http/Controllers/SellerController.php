<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Services\UserAdminService;
use App\Http\Requests\StoreSellerRequest;

class SellerController extends Controller
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
        //
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
    public function store(StoreSellerRequest $request)
    {
        $requestValidated = $request->validated();
        $requestValidated['comission'] = (float) $requestValidated['comission'];
        $seller = $this->userAdminService->createSeller($requestValidated);

        return response()->json('Seller',  $seller);
    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
