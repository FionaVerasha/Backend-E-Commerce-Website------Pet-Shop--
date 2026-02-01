<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-900 leading-tight uppercase tracking-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Admin Header -->
            <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-black text-gray-900 tracking-tighter">Store Overview</h1>
                    <p class="text-gray-500 mt-1 font-medium">Manage Whisker Cart store operations and monitor live
                        activity.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button
                        class="px-6 py-3 bg-white border border-gray-200 text-gray-700 font-black rounded-xl text-xs uppercase tracking-widest hover:bg-gray-50 transition-all shadow-sm">
                        Download Report
                    </button>
                    <a href="{{ route('admin.products.create') }}"
                        class="px-6 py-3 bg-green-600 text-white font-black rounded-xl text-xs uppercase tracking-widest hover:bg-green-700 transition-all shadow-lg shadow-green-200 no-underline inline-block">
                        + Add New Product
                    </a>
                </div>
            </div>

            <!-- KPI Stats Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Total Orders -->
                <div
                    class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 transition-all hover:shadow-md group">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 transition-transform group-hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">All Time</span>
                    </div>
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-widest mb-1">Total Orders</h3>
                    <p class="text-3xl font-black text-gray-900 tracking-tighter">{{ $totalOrders }}</p>
                </div>

                <!-- Pending Orders -->
                <div
                    class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 transition-all hover:shadow-md group relative overflow-hidden">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-500 transition-transform group-hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div
                            class="flex items-center gap-1.5 px-2 py-1 bg-orange-100 text-[10px] font-black text-orange-600 rounded-full uppercase tracking-tighter">
                            <span class="w-1.5 h-1.5 bg-orange-500 rounded-full animate-pulse"></span>
                            Live
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-widest mb-1">Pending</h3>
                    <p class="text-3xl font-black text-gray-900 tracking-tighter">{{ $pendingOrders }}</p>
                </div>

                <!-- Total Products -->
                <div
                    class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 transition-all hover:shadow-md group">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 transition-transform group-hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-widest mb-1">Total Products</h3>
                    <p class="text-3xl font-black text-gray-900 tracking-tighter">{{ $totalProducts }}</p>
                </div>

                <!-- Total Revenue -->
                <div
                    class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 transition-all hover:shadow-md group bg-gradient-to-br from-white to-green-50/20">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-green-600 rounded-2xl flex items-center justify-center text-white transition-transform group-hover:scale-110 shadow-lg shadow-green-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-widest mb-1">Total Revenue</h3>
                    <p class="text-2xl font-black text-gray-900 tracking-tighter">LKR {{ number_format($totalRevenue) }}
                    </p>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                <!-- Left: Recent Orders Table -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-8 border-b border-gray-50 flex items-center justify-between bg-gray-50/30">
                            <div>
                                <h2 class="text-xl font-black text-gray-900 uppercase tracking-tight">Recent Orders</h2>
                                <p class="text-xs font-bold text-gray-400 mt-1 italic">Showing latest 10 transactions
                                </p>
                            </div>
                            <a href="#"
                                class="px-5 py-2 bg-white border border-gray-200 text-[10px] font-black text-gray-400 uppercase tracking-widest rounded-xl hover:text-green-600 hover:border-green-200 transition-all no-underline shadow-sm">View
                                All Orders</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr
                                        class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-50">
                                        <th class="px-8 py-5">Order ID</th>
                                        <th class="px-8 py-5">Customer</th>
                                        <th class="px-8 py-5">Date</th>
                                        <th class="px-8 py-5 text-center">Status</th>
                                        <th class="px-8 py-5 text-right">Total</th>
                                        <th class="px-8 py-5 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @forelse($recentOrders as $order)
                                        <tr class="hover:bg-gray-50/50 transition-colors group">
                                            <td class="px-8 py-6">
                                                <span
                                                    class="text-xs font-black text-gray-900 italic tracking-tighter">#{{ $order->order_number }}</span>
                                            </td>
                                            <td class="px-8 py-6">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-[10px] font-black text-gray-400 uppercase">
                                                        {{ substr($order->user ? $order->user->name : ($order->address['first_name'] ?? 'G'), 0, 1) }}{{ substr($order->user ? '' : ($order->address['last_name'] ?? 'U'), 0, 1) }}
                                                    </div>
                                                    <div>
                                                        <p class="text-xs font-black text-gray-900">
                                                            {{ $order->user ? $order->user->name : (($order->address['first_name'] ?? 'Guest') . ' ' . ($order->address['last_name'] ?? '')) }}
                                                        </p>
                                                        <p class="text-[10px] font-bold text-gray-400">
                                                            {{ $order->user ? 'Member' : 'Guest Customer' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-8 py-6">
                                                <span
                                                    class="text-xs font-bold text-gray-500">{{ $order->created_at->format('M d, Y') }}</span>
                                            </td>
                                            <td class="px-8 py-6 text-center">
                                                @php
                                                    $statusClass = match ($order->payment_status) {
                                                        'pending' => 'bg-orange-100 text-orange-600',
                                                        'paid' => 'bg-green-100 text-green-600',
                                                        'delivered' => 'bg-blue-100 text-blue-600',
                                                        'cancelled' => 'bg-red-100 text-red-600',
                                                        default => 'bg-gray-100 text-gray-600',
                                                    };
                                                @endphp
                                                <span
                                                    class="px-3 py-1 {{ $statusClass }} text-[10px] font-black rounded-full uppercase tracking-widest">
                                                    {{ $order->payment_status }}
                                                </span>
                                            </td>
                                            <td class="px-8 py-6 text-right whitespace-nowrap">
                                                <span class="text-xs font-black text-gray-900">LKR
                                                    {{ number_format($order->total_amount) }}</span>
                                            </td>
                                            <td class="px-8 py-6 text-center">
                                                <div
                                                    class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                    <button title="View Details"
                                                        class="w-8 h-8 rounded-lg bg-white border border-gray-100 text-gray-400 hover:text-green-600 hover:border-green-200 transition-all flex items-center justify-center shadow-sm">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                            </path>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <button title="Mark Paid"
                                                        class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-600 hover:text-white transition-all flex items-center justify-center shadow-sm">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-8 py-20 text-center">
                                                <div class="flex flex-col items-center gap-4">
                                                    <div
                                                        class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center text-gray-200">
                                                        <svg class="w-10 h-10" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0l-8 4-8-4">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <p class="text-sm font-black text-gray-400 uppercase tracking-widest">No
                                                        orders to display yet.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Sidebar Sections -->
                <div class="space-y-8">

                    <!-- Low Stock Alerts -->
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8">
                        <div class="flex items-center justify-between mb-8">
                            <h2 class="text-lg font-black text-gray-900 uppercase tracking-tight">Inventory</h2>
                            <span
                                class="px-2 py-1 bg-red-50 text-[10px] font-black text-red-600 rounded-md uppercase tracking-tighter animate-pulse">Low
                                Stock</span>
                        </div>
                        <div class="space-y-4">
                            @foreach($lowStockAlerts as $alert)
                                <div
                                    class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl border border-transparent hover:border-gray-200 transition-all group">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-white border border-gray-100 flex items-center justify-center text-gray-400 group-hover:text-red-500 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-black text-gray-900">{{ $alert['name'] }}</p>
                                            <p class="text-[10px] font-bold text-red-500 uppercase tracking-tighter">
                                                {{ $alert['stock'] }} units left
                                            </p>
                                        </div>
                                    </div>
                                    <button
                                        class="w-8 h-8 rounded-lg bg-white border border-gray-100 text-gray-400 hover:text-green-600 hover:border-green-200 hover:shadow-sm transition-all flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('admin.products.index') }}"
                            class="w-full mt-6 py-4 border-2 border-dashed border-gray-100 rounded-2xl text-[10px] font-black text-gray-400 uppercase tracking-widest hover:border-green-200 hover:text-green-600 transition-all text-center inline-block no-underline">
                            View Full Inventory
                        </a>
                    </div>

                    <!-- Quick Admin Actions -->
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8">
                        <h2 class="text-lg font-black text-gray-900 uppercase tracking-tight mb-8">Admin Actions</h2>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('admin.products.index') }}"
                                class="p-4 bg-gray-50 rounded-2xl border border-transparent hover:bg-green-600 hover:text-white transition-all text-center group no-underline">
                                <span
                                    class="block text-xs font-black uppercase tracking-tight text-gray-900 group-hover:text-white">Products</span>
                                <span
                                    class="text-[10px] font-bold text-gray-400 group-hover:text-white/70">Manage</span>
                            </a>
                            <button
                                class="p-4 bg-gray-50 rounded-2xl border border-transparent hover:bg-green-600 hover:text-white transition-all text-center group">
                                <span class="block text-xs font-black uppercase tracking-tight">Orders</span>
                                <span
                                    class="text-[10px] font-bold text-gray-400 group-hover:text-white/70">Review</span>
                            </button>
                            <button
                                class="p-4 bg-gray-50 rounded-2xl border border-transparent hover:bg-green-600 hover:text-white transition-all text-center group">
                                <span class="block text-xs font-black uppercase tracking-tight">Customers</span>
                                <span
                                    class="text-[10px] font-bold text-gray-400 group-hover:text-white/70">Database</span>
                            </button>
                            <button
                                class="p-4 bg-gray-50 rounded-2xl border border-transparent hover:bg-green-600 hover:text-white transition-all text-center group">
                                <span class="block text-xs font-black uppercase tracking-tight">Reports</span>
                                <span
                                    class="text-[10px] font-bold text-gray-400 group-hover:text-white/70">Analytics</span>
                            </button>
                        </div>
                    </div>

                    <!-- System Health -->
                    <div
                        class="bg-gray-900 rounded-[2.5rem] p-8 text-white relative overflow-hidden shadow-xl shadow-gray-200">
                        <div class="relative z-10 flex items-center justify-between mb-4">
                            <h3 class="text-sm font-black uppercase tracking-widest">System Health</h3>
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-ping"></div>
                        </div>
                        <div class="relative z-10">
                            <p class="text-xs font-bold text-gray-400 leading-relaxed mb-1">Server: Operational</p>
                            <p class="text-xs font-bold text-gray-400 leading-relaxed">Last Updated: Just now</p>
                        </div>
                        <div class="absolute -right-8 -bottom-8 w-24 h-24 bg-green-900/50 rounded-full blur-2xl"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>