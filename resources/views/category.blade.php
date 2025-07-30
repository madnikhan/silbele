@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Category Header -->
        <div class="mb-8">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900">Home</a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-gray-500 md:ml-2">{{ $category->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $category->name }}</h1>
                @if($category->description)
                    <p class="text-gray-600 max-w-2xl mx-auto">{{ $category->description }}</p>
                @endif
            </div>
        </div>

        <!-- Products Grid -->
        @if($products->count() > 0)
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <p class="text-gray-600">{{ $products->total() }} products found</p>
                    <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                        <option>Sort by: Newest</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Name: A to Z</option>
                        <option>Rating: High to Low</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                            <div class="relative">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                                @else
                                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                @if($product->discount_percentage > 0)
                                    <div class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded text-sm font-semibold">
                                        -{{ $product->discount_percentage }}%
                                    </div>
                                @endif
                                @if($product->is_featured)
                                    <div class="absolute top-2 right-2 bg-yellow-500 text-white px-2 py-1 rounded text-sm font-semibold">
                                        Featured
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

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No products found in this category</h3>
                <p class="text-gray-600 mb-6">We're working on adding more products to this category.</p>
                <a href="{{ route('shop') }}" class="bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition duration-300">
                    Browse All Products
                </a>
            </div>
        @endif
    </div>
</div>
@endsection 