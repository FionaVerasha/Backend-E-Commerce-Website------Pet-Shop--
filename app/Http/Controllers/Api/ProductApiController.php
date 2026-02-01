<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */

    public function index(Request $request): JsonResponse
    {
        $query = Product::query();

        if ($request->filled('name')) {
            $name = $request->input('name');

            // Optional: block obvious SQLi patterns (good for demos/tests)
            if (preg_match("/('|--|;|\\bor\\b|\\band\\b|\\bunion\\b)/i", $name)) {
                return response()->json([
                    'success' => true,
                    'message' => 'Products retrieved successfully.',
                    'data' => []
                ], 200);
            }

            $query->where('name', 'like', "%{$name}%"); // safe
        }

        $products = $query->get();

        return response()->json([
            'success' => true,
            'message' => 'Products retrieved successfully.',
            'data' => $products
        ], 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return JsonResponse
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product retrieved successfully.',
            'data' => $product
        ], 200);
    }
}
