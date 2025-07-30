@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section - INKEY List Style -->
    <section class="relative bg-white overflow-hidden">
        <!-- Hero Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-orange-50 via-pink-50 to-purple-50"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Hero Content -->
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                        Transform Your<br>
                        <span class="text-orange-500">Skincare Routine</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 max-w-lg">
                        Discover scientifically-backed products that work. Premium cosmetics for every skin type and concern.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('shop') }}" class="cart-btn text-center px-8 py-4 text-lg font-semibold">
                            Shop Now
                        </a>
                        <a href="#" class="btn-secondary text-center px-8 py-4 text-lg">
                            Take Skin Quiz
                        </a>
                    </div>
                </div>
                
                <!-- Hero Image -->
                <div class="relative">
                    <div class="bg-white rounded-2xl shadow-2xl p-8 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                        <div class="bg-gradient-to-br from-orange-100 to-pink-100 rounded-xl p-8 text-center">
                            <div class="w-32 h-32 bg-orange-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Premium Skincare</h3>
                            <p class="text-gray-600">Scientifically formulated for real results</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

        <!-- Categories Section - INKEY List Style -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Shop by Category</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Find the perfect products for your specific skin concerns and needs
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
                @forelse($categories as $category)
                    <a href="{{ route('category', $category->slug) }}" class="group">
                        <div class="bg-white rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                            <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-orange-100 to-pink-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 text-lg group-hover:text-orange-600 transition duration-300">{{ $category->name }}</h3>
                        </div>
                    </a>
                @empty
                    <div class="col-span-6 text-center py-12">
                        <p class="text-gray-500 text-lg">No categories available</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    </div>

        <!-- Bestsellers Section - INKEY List Style -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Bestsellers</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Our most loved products that deliver real results
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($bestsellers as $product)
                    <div class="group">
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="relative">
                                <div class="w-full h-80 bg-gradient-to-br from-orange-100 to-pink-100 flex items-center justify-center">
                                    <svg class="w-20 h-20 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                @if($product->discount_percentage > 0)
                                    <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                        -{{ $product->discount_percentage }}%
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <button class="bg-white rounded-full p-2 shadow-lg hover:shadow-xl">
                                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $product->name }}</h3>
                                <p class="text-gray-600 mb-4">{{ $product->short_description }}</p>
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xl font-bold text-gray-900">{{ $product->formatted_price }}</span>
                                        @if($product->compare_price)
                                            <span class="text-sm text-gray-500 line-through">{{ $product->formatted_compare_price }}</span>
                                        @endif
                                    </div>
                                </div>
                                <button class="w-full cart-btn py-3 text-lg font-semibold">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-12">
                        <p class="text-gray-500 text-lg">No products available</p>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-16">
                <a href="{{ route('shop') }}" class="cart-btn px-12 py-4 text-lg font-bold">
                    View All Products
                </a>
            </div>
        </div>
    </section>
    </div>

    <!-- Featured Products -->
        <div class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Featured Products</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @forelse($featured as $product)
                        <div class="card">
                            <div class="relative">
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="absolute top-2 right-2 bg-yellow-500 text-white px-2 py-1 rounded text-sm font-semibold">
                                    Featured
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="font-semibold text-gray-900 mb-2">{{ $product->name }}</h3>
                                <p class="text-gray-600 text-sm mb-4">{{ $product->short_description }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-lg font-bold text-gray-900">{{ $product->formatted_price }}</span>
                                        @if($product->compare_price)
                                            <span class="text-sm text-gray-500 line-through">{{ $product->formatted_compare_price }}</span>
                                        @endif
                                    </div>
                                    <button class="btn-primary text-sm px-4 py-2">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-4 text-center py-8">
                            <p class="text-gray-500">No featured products available</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section - INKEY List Style -->
    <section class="py-20" style="background: linear-gradient(135deg, #fef3e2 0%, #fdf2f8 100%);">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-white rounded-3xl shadow-2xl p-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Stay Updated</h2>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    Get the latest skincare tips, exclusive offers, and product launches delivered to your inbox.
                </p>
                <div class="max-w-md mx-auto">
                    <div class="flex bg-gray-50 rounded-2xl p-2 shadow-lg">
                        <input type="email" placeholder="Enter your email address" 
                               class="flex-1 px-6 py-4 bg-transparent border-0 focus:ring-0 focus:outline-none text-gray-700 placeholder-gray-500">
                        <button class="cart-btn px-8 py-4 rounded-xl font-bold text-lg">
                            Subscribe
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">
                        Join 10,000+ skincare enthusiasts
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection 