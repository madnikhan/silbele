@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Debug Info -->
    @if(app()->environment('local'))
        <div style="background: yellow; padding: 10px; margin: 10px;">
            Debug: Categories: {{ $categories->count() }}, Products: {{ $bestsellers->count() }}, Banners: {{ $banners->count() }}
        </div>
    @endif
    <!-- Hero Banner -->
    <div class="relative bg-gradient-to-r from-pink-50 to-purple-50 min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                            {{ $banners->first()->title ?? 'Discover Your Perfect Skincare Routine' }}
                        </h1>
                        <p class="text-xl text-gray-600 mb-8">
                            {{ $banners->first()->description ?? 'Premium cosmetics formulated for every skin type. Transform your skin with our scientifically-backed products.' }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('shop') }}" class="btn-primary text-center">
                                Shop Now
                            </a>
                            <a href="#" class="btn-secondary text-center">
                                Take Skin Quiz
                            </a>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="bg-gradient-to-br from-pink-200 to-purple-200 rounded-lg h-96 flex items-center justify-center shadow-xl">
                            <div class="text-center">
                                <svg class="w-24 h-24 text-pink-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <p class="text-pink-600 font-semibold text-lg">Premium Skincare</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories -->
        <div class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Shop by Category</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    @foreach($categories as $category)
                        <a href="{{ route('category', $category->slug) }}" class="group">
                            <div class="bg-gray-50 rounded-lg p-6 text-center hover:bg-orange-50 transition duration-300 border border-gray-200">
                                <div class="w-16 h-16 mx-auto mb-4 bg-orange-100 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-gray-900 group-hover:text-orange-600 transition duration-300">{{ $category->name }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Bestsellers -->
        <div class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Bestsellers</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($bestsellers as $product)
                        <div class="card">
                            <div class="relative">
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                @if($product->discount_percentage > 0)
                                    <div class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded text-sm font-semibold">
                                        -{{ $product->discount_percentage }}%
                                    </div>
                                @endif
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
                                    <button class="cart-btn">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-12">
                    <a href="{{ route('shop') }}" class="cart-btn">
                        View All Products
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- Featured Products -->
    @if($featured->count() > 0)
        <div class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Featured Products</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($featured as $product)
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->
    <div class="py-16" style="background-color: #fef3e2;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Stay Updated</h2>
            <p class="text-gray-600 mb-8">Get the latest skincare tips and exclusive offers delivered to your inbox.</p>
            <div class="max-w-md mx-auto">
                <div class="flex">
                    <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    <button class="cart-btn rounded-r-lg">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection 