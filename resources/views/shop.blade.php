@php
    if (!function_exists('renderProductGrid')) {
        function renderProductGrid($products, $cols = 3, $imgBg = 'bg-white', $hoverBg = 'group-hover:bg-white')
        {
            $gridCols = $cols == 4 ? 'lg:grid-cols-4 md:grid-cols-2' : ($cols == 2 ? 'md:grid-cols-2' : 'md:grid-cols-3');
            $maxWidth = $cols == 2 ? 'max-w-5xl' : 'max-w-full';

            echo '<div class="' . $maxWidth . ' mx-auto grid grid-cols-1 sm:grid-cols-2 ' . $gridCols . ' gap-6">';
            foreach ($products as $p) {
                $id = $p->slug ?? $p->id ?? '#';
                $image = $p->image ? asset($p->image) : null;
                $name = $p->name ?? 'Product';
                $description = $p->description ?? $p->desc ?? '';
                $price = $p->price ?? 0;
                $badge = $p->badge ?? null;

                $csrf = csrf_token();
                $cartUrl = route('cart.add');
                $detailUrl = route('product.show', ['id' => $id]);

                echo '
                                                                                                                                                        <div class="group bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col h-full">
                                                                                                                                                        <div class="relative h-64 md:h-72 ' . $imgBg . ' flex items-center justify-center p-8 overflow-hidden rounded-t-3xl border-b border-gray-50/50">
                                                                                                                                                            <a href="' . $detailUrl . '" class="absolute inset-0 z-20"></a>';

                if ($image) {
                    echo '<img src="' . $image . '" alt="' . $name . '" class="max-w-full max-h-full w-auto h-auto object-contain group-hover:scale-105 transition-transform duration-700 relative z-10 antialiased drop-shadow-sm">';
                } else {
                    echo '<div class="relative z-10 flex flex-col items-center justify-center text-slate-200">
                                                                                                                                                            <svg class="w-20 h-20 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                                                                                                                                          </div>';
                }

                if ($badge) {
                    echo '<div class="absolute inset-0 flex items-center justify-center p-6 pointer-events-none">
                                                                                                                                                                <span class="bg-white/90 backdrop-blur-md text-gray-950 text-xs font-black px-5 py-2.5 rounded-xl uppercase tracking-widest shadow-sm border border-white/50">' . $badge . '</span>
                                                                                                                                                              </div>';
                }

                echo '
                                                                                                                                                            </div>
                                                                                                                                                            <div class="p-6 flex flex-col flex-grow bg-green-50 rounded-b-3xl transition-all duration-500 group-hover:bg-green-100/50">
                                                                                                                                                        <div class="flex-grow">
                                                                                                                                                            <div class="flex items-center justify-between mb-2">
                                                                                                                                                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-brand transition-colors uppercase tracking-tight truncate flex-grow">' . $name . '</h3>
                                                                                                                                                </div>
                                                                                                                                                            <p class="mt-2 text-sm text-slate-500 leading-relaxed line-clamp-2 h-10">' . $description . '</p>
                                                                                                                                                        </div>

                                                                                                                                                                <div class="mt-auto pt-6 flex items-center justify-between gap-4">
                                                                                                                                                                    <form action="' . $cartUrl . '" method="POST" class="m-0 flex-grow">
                                                                                                                                                                        <input type="hidden" name="_token" value="' . $csrf . '">
                                                                                                                                                                        <input type="hidden" name="product_id" value="' . $id . '">
                                                                                                                                                                        <input type="hidden" name="name" value="' . $name . '">
                                                                                                                                                                        <input type="hidden" name="price" value="' . $price . '">
                                                                                                                                                                        <input type="hidden" name="image" value="' . $image . '">
                                                                                                                                                                        <button type="submit" class="w-full bg-brand hover:bg-brand-dark text-white font-black py-3 px-6 rounded-xl transition-all duration-300 shadow-md hover:shadow-brand/20 flex items-center justify-center gap-2 active:scale-[0.98] text-xs uppercase tracking-widest group/btn no-underline whitespace-nowrap cursor-pointer">
                                                                                                                                                                            <svg class="w-4 h-4 transition-transform duration-300 group-hover/btn:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                                                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                                                                                                                                            </svg>
                                                                                                                                                                            <span>Add to Cart</span>
                                                                                                                                                                        </button>
                                                                                                                                                                    </form>
                                                                                                                                                                    <div class="text-xl font-black text-brand text-right whitespace-nowrap">
                                                                                                                                                                        <span class="text-[10px] font-bold text-gray-400 mr-0.5">LKR</span>' . number_format($price) . '
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div>';
            }
            echo '</div>';
        }
    }
@endphp

<x-guest-store-layout title="Shop Whisker Cart - Quality Pet Supplies">
    <style>
        @media (min-width: 1024px) {
            .hero-container {
                display: flex !important;
                flex-direction: row !important;
                align-items: center !important;
                justify-content: space-between !important;
            }

            .hero-text {
                text-align: left !important;
                width: 50% !important;
            }

            .hero-image {
                width: 50% !important;
                display: flex !important;
                justify-content: flex-end !important;
            }
        }
    </style>

    <div class="bg-white min-h-screen">
        <!-- Section: Hero -->
        <header class="relative pt-12 pb-20 overflow-hidden bg-green-50/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="hero-container flex flex-col items-center gap-12">
                    <!-- Left Content -->
                    <div class="hero-text w-full text-center">
                        <span
                            class="inline-block px-4 py-2 bg-white text-brand text-xs font-black uppercase tracking-[0.2em] rounded-full mb-6 shadow-sm border border-green-50">
                            Premium Pet Store
                        </span>
                        <h1 class="text-5xl md:text-7xl font-black text-gray-900 leading-[1.1] mb-10">
                            Everything Your <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-brand to-green-400">Pet</span>
                            Needs
                        </h1>
                        <p class="text-2xl text-slate-600 mb-12 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                            Explore our curated selection of high-quality food, treats, and essentials for your beloved
                            pets.
                        </p>
                        <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                            <a href="#premium"
                                class="px-10 py-5 bg-brand text-white font-black rounded-2xl shadow-xl hover:bg-brand-dark transition-all duration-300 transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest text-sm no-underline">
                                Shop Now
                            </a>
                        </div>
                    </div>

                    <!-- Right Image -->
                    <div class="hero-image w-full flex justify-center lg:justify-end">
                        <div class="relative w-full max-w-[580px]">
                            <div
                                class="absolute inset-0 bg-green-500/20 rounded-full blur-[80px] -z-10 transform scale-125">
                            </div>
                            <img src="{{ asset('images/shop/hero/hero-cat.png') }}" alt="Cute Cat Hero"
                                class="w-full h-auto object-cover rounded-[3rem] shadow-2xl transition duration-1000 transform hover:scale-105 border-4 border-white">
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Section: Premium Products -->
        <section id="premium" class="pt-24 pb-12 md:pt-32 md:pb-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">PREMIUM <span
                            class="text-brand">PRODUCTS</span></h2>
                    <div class="mt-4 w-16 h-1.5 bg-brand mx-auto rounded-full opacity-30"></div>
                    <p class="mt-6 text-slate-600 max-w-2xl mx-auto">Experience the gold standard in pet nutrition
                        with our exclusively curated premium range.</p>
                </div>
                @php renderProductGrid($premium_products, 3); @endphp
            </div>
        </section>

        <!-- Section: Cat Food -->
        <section id="cat-food" class="pt-12 pb-12 md:pt-16 md:pb-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">CAT <span
                            class="text-brand">FOOD</span></h2>
                    <div class="mt-4 w-16 h-1.5 bg-brand mx-auto rounded-full opacity-30"></div>
                    <p class="mt-6 text-slate-600 max-w-2xl mx-auto">Specialized nutrition for your feline family
                        members.</p>
                </div>

                @php renderProductGrid($cat_food_products, 3); @endphp
            </div>
        </section>

        <!-- Section: Dog Food -->
        <section id="dog-food" class="pt-12 pb-16 md:pt-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">DOG <span
                            class="text-brand">FOOD</span></h2>
                    <div class="mt-4 w-16 h-1.5 bg-brand mx-auto rounded-full opacity-30"></div>
                    <p class="mt-6 text-slate-600 max-w-2xl mx-auto">The perfect protein balance for man's best friend.
                    </p>
                </div>

                @php renderProductGrid($dog_food_products, 3, 'bg-slate-50'); @endphp
            </div>
        </section>

        <!-- Section: Pet Essentials -->
        <section id="essentials" class="pt-12 pb-32 md:pt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">PET <span
                            class="text-brand">ESSENTIALS</span></h2>
                    <div class="mt-4 w-16 h-1.5 bg-brand mx-auto rounded-full opacity-30"></div>
                    <p class="mt-6 text-slate-600 max-w-2xl mx-auto">Everything your pets need for a happy and healthy
                        life.</p>
                </div>

                @php renderProductGrid($pet_essentials_products, 3); @endphp
            </div>
        </section>
    </div>
</x-guest-store-layout>