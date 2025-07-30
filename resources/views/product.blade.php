@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('category', $product->category->slug) }}" class="ml-1 text-gray-700 hover:text-gray-900 md:ml-2">{{ $product->category->name }}</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-gray-500 md:ml-2">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Images -->
            <div>
                <div class="relative">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-lg">
                    @else
                        <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                            <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                    @if($product->discount_percentage > 0)
                        <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            -{{ $product->discount_percentage }}%
                        </div>
                    @endif
                </div>

                @if($product->gallery && count($product->gallery) > 0)
                    <div class="grid grid-cols-4 gap-4 mt-4">
                        @foreach($product->gallery as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}" class="w-full h-24 object-cover rounded-lg cursor-pointer hover:opacity-75 transition duration-300">
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Product Details -->
            <div>
                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                    <p class="text-gray-600 mb-4">{{ $product->short_description }}</p>
                    
                    <!-- Rating -->
                    @if($product->rating > 0)
                        <div class="flex items-center mb-4">
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $product->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                            <span class="ml-2 text-gray-600">({{ $product->review_count }} reviews)</span>
                        </div>
                    @endif

                    <!-- Price -->
                    <div class="flex items-center space-x-4 mb-6">
                        <span class="text-3xl font-bold text-gray-900">{{ $product->formatted_price }}</span>
                        @if($product->compare_price)
                            <span class="text-xl text-gray-500 line-through">{{ $product->formatted_compare_price }}</span>
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="space-y-4 mb-6">
                        @if($product->size)
                            <div class="flex items-center">
                                <span class="font-medium text-gray-700 w-24">Size:</span>
                                <span class="text-gray-600">{{ $product->size }}</span>
                            </div>
                        @endif
                        @if($product->skin_type)
                            <div class="flex items-center">
                                <span class="font-medium text-gray-700 w-24">Skin Type:</span>
                                <span class="text-gray-600">{{ $product->skin_type }}</span>
                            </div>
                        @endif
                        @if($product->concern)
                            <div class="flex items-center">
                                <span class="font-medium text-gray-700 w-24">Concern:</span>
                                <span class="text-gray-600">{{ $product->concern }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Add to Cart -->
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <button class="px-4 py-2 text-gray-600 hover:text-gray-900">-</button>
                            <input type="number" value="1" min="1" class="w-16 text-center border-0 focus:ring-0">
                            <button class="px-4 py-2 text-gray-600 hover:text-gray-900">+</button>
                        </div>
                        <button class="flex-1 bg-pink-600 text-white py-3 px-6 rounded-lg hover:bg-pink-700 transition duration-300 font-semibold">
                            Add to Cart
                        </button>
                    </div>

                    <!-- Stock Status -->
                    <div class="mb-6">
                        @if($product->stock_quantity > 0)
                            <span class="text-green-600 font-medium">In Stock ({{ $product->stock_quantity }} available)</span>
                        @else
                            <span class="text-red-600 font-medium">Out of Stock</span>
                        @endif
                    </div>
                </div>

                <!-- Product Description -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Description</h3>
                    <div class="prose prose-gray max-w-none">
                        {!! $product->description !!}
                    </div>
                </div>

                <!-- Ingredients -->
                @if($product->ingredients && count($product->ingredients) > 0)
                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Key Ingredients</h3>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach($product->ingredients as $ingredient)
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">{{ $ingredient['ingredient'] }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Benefits -->
                @if($product->benefits && count($product->benefits) > 0)
                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Benefits</h3>
                        <ul class="space-y-2">
                            @foreach($product->benefits as $benefit)
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ $benefit['benefit'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">You might also like</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $relatedProduct)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                            <div class="relative">
                                @if($relatedProduct->image)
                                    <img src="{{ asset('storage/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 mb-2">{{ $relatedProduct->name }}</h3>
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-bold text-gray-900">{{ $relatedProduct->formatted_price }}</span>
                                    <button class="bg-pink-600 text-white px-3 py-1 rounded text-sm hover:bg-pink-700 transition duration-300">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection 