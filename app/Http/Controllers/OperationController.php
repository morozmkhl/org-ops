<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Operation::with(['seller', 'buyer'])->paginate(25);
    }


    public function statistics(Request $request, Organization $organization = null)
    {
        $result = Organization::withSum('sales as total_sales', 'sum')
            ->withSum('purchases as total_purchases', 'sum')
            ->when($organization, function ($query) use ($organization) {
                return $query->where('id', $organization->id);
            })
            ->get();

        return response()->json($organization ? $result->first() : $result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
