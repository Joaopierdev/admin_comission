<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSaleRequest;
use App\Services\SaleService;

class SaleController extends Controller
{
    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = $this->saleService->getSales();

        return $sales;
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
    public function store(StoreSaleRequest $request)
    {
        $validatedRequest = $request->validated();
        $sale = $this->saleService->createSale($validatedRequest);

        return response()->json(['sale'=> $sale]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
