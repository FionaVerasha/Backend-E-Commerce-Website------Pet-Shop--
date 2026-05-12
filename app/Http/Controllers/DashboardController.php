<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Admin View: Fetch ALL store data
        $totalOrders = Order::count();
        $pendingOrders = Order::where('payment_status', 'pending')->count();
        $totalRevenue = Order::where('payment_status', 'paid')->sum('total_amount');
        $totalProducts = Product::count();

        $recentOrders = Order::latest()
            ->take(10)
            ->get();

        $lowStockAlerts = [
            ['name' => 'Whiskas Premium', 'stock' => 3],
            ['name' => 'Pedigree Adult Dog', 'stock' => 2],
            ['name' => 'Pet Bed', 'stock' => 1],
            ['name' => 'Royal Canin Puppy', 'stock' => 4],
        ];

        return view('dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'totalRevenue',
            'totalProducts',
            'recentOrders',
            'lowStockAlerts'
        ));
    }
}
