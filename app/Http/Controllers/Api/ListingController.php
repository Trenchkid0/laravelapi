<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(): JsonResponse
    {
        $listing = Listing::withCount('transaction')
            ->orderBy('transaction_count', 'desc')
            ->paginate();
        return response()->json([
            'success' => true,
            'data' => $listing,
        ]);
    }

    public function show(Listing $listing): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $listing,
        ]);
    }
}
