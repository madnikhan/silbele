<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Silbele') }} - @yield('title', 'Premium Cosmetics')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fallback CSS for production -->
    @if(!app()->environment('local'))
        <link rel="stylesheet" href="{{ asset('build/assets/app-DKWS0HXk.css') }}">
    @endif
    
    <!-- Complete inline CSS for Railway -->
    <style>
        /* Tailwind CSS Base */
        *, *::before, *::after { box-sizing: border-box; }
        body { margin: 0; font-family: ui-sans-serif, system-ui, sans-serif; line-height: 1.5; }
        
        /* Layout */
        .max-w-7xl { max-width: 80rem; }
        .mx-auto { margin-left: auto; margin-right: auto; }
        .px-4 { padding-left: 1rem; padding-right: 1rem; }
        .py-16 { padding-top: 4rem; padding-bottom: 4rem; }
        .py-8 { padding-top: 2rem; padding-bottom: 2rem; }
        .py-6 { padding-top: 1.5rem; padding-bottom: 1.5rem; }
        .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
        .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .px-4 { padding-left: 1rem; padding-right: 1rem; }
        .px-3 { padding-left: 0.75rem; padding-right: 0.75rem; }
        .px-2 { padding-left: 0.5rem; padding-right: 0.5rem; }
        .mb-12 { margin-bottom: 3rem; }
        .mb-8 { margin-bottom: 2rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mt-8 { margin-top: 2rem; }
        .mt-4 { margin-top: 1rem; }
        .mt-2 { margin-top: 0.5rem; }
        
        /* Colors */
        .bg-white { background-color: white; }
        .bg-gray-50 { background-color: #f9fafb; }
        .bg-gray-100 { background-color: #f3f4f6; }
        .bg-gray-200 { background-color: #e5e7eb; }
        .bg-orange-50 { background-color: #fff7ed; }
        .bg-orange-100 { background-color: #ffedd5; }
        .bg-orange-500 { background-color: #f97316; }
        .bg-orange-600 { background-color: #ea580c; }
        .bg-pink-50 { background-color: #fdf2f8; }
        .bg-pink-200 { background-color: #fbcfe8; }
        .bg-purple-50 { background-color: #faf5ff; }
        .bg-purple-200 { background-color: #e9d5ff; }
        .bg-red-500 { background-color: #ef4444; }
        
        .text-white { color: white; }
        .text-gray-600 { color: #4b5563; }
        .text-gray-700 { color: #374151; }
        .text-gray-900 { color: #111827; }
        .text-orange-600 { color: #ea580c; }
        .text-pink-400 { color: #f472b6; }
        .text-pink-600 { color: #db2777; }
        
        /* Typography */
        .text-4xl { font-size: 2.25rem; line-height: 2.5rem; }
        .text-3xl { font-size: 1.875rem; line-height: 2.25rem; }
        .text-xl { font-size: 1.25rem; line-height: 1.75rem; }
        .text-lg { font-size: 1.125rem; line-height: 1.75rem; }
        .text-sm { font-size: 0.875rem; line-height: 1.25rem; }
        .text-xs { font-size: 0.75rem; line-height: 1rem; }
        .font-bold { font-weight: 700; }
        .font-semibold { font-weight: 600; }
        .font-medium { font-weight: 500; }
        
        /* Layout Components */
        .flex { display: flex; }
        .grid { display: grid; }
        .hidden { display: none; }
        .block { display: block; }
        .relative { position: relative; }
        .absolute { position: absolute; }
        .sticky { position: sticky; }
        .top-0 { top: 0; }
        .z-50 { z-index: 50; }
        
        /* Flexbox */
        .flex-col { flex-direction: column; }
        .flex-row { flex-direction: row; }
        .items-center { align-items: center; }
        .justify-center { justify-content: center; }
        .justify-between { justify-content: space-between; }
        .space-x-4 > * + * { margin-left: 1rem; }
        .space-x-8 > * + * { margin-left: 2rem; }
        .space-y-1 > * + * { margin-top: 0.25rem; }
        .space-y-4 > * + * { margin-top: 1rem; }
        .space-y-8 > * + * { margin-top: 2rem; }
        
        /* Grid */
        .grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
        .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        .grid-cols-6 { grid-template-columns: repeat(6, minmax(0, 1fr)); }
        .gap-4 { gap: 1rem; }
        .gap-6 { gap: 1.5rem; }
        .gap-8 { gap: 2rem; }
        
        /* Responsive */
        @media (min-width: 768px) {
            .md\\:flex { display: flex; }
            .md\\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .md\\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .md\\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
            .md\\:hidden { display: none; }
            .md\\:block { display: block; }
            .md\\:text-6xl { font-size: 3.75rem; line-height: 1; }
        }
        
        @media (min-width: 1024px) {
            .lg\\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .lg\\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
            .lg\\:grid-cols-6 { grid-template-columns: repeat(6, minmax(0, 1fr)); }
            .lg\\:px-8 { padding-left: 2rem; padding-right: 2rem; }
        }
        
        /* Components */
        .btn-primary { background-color: #f97316; color: white; padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: 600; transition: background-color 0.3s; text-decoration: none; display: inline-block; }
        .btn-primary:hover { background-color: #ea580c; }
        .btn-secondary { border: 1px solid #d1d5db; color: #374151; padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: 600; transition: background-color 0.3s; text-decoration: none; display: inline-block; }
        .btn-secondary:hover { background-color: #f9fafb; }
        .card { background-color: white; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); overflow: hidden; transition: box-shadow 0.3s; }
        .card:hover { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
        .cart-btn { background-color: #E99459; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; transition: background-color 0.3s; border: none; cursor: pointer; }
        .cart-btn:hover { background-color: #ea580c; }
        .cart-counter { background-color: #E99459; color: white; font-size: 0.75rem; border-radius: 9999px; height: 1.25rem; width: 1.25rem; display: flex; align-items: center; justify-content: center; position: absolute; top: -0.5rem; right: -0.5rem; }
        .category-hover { background-color: #fef3e2; }
        .category-hover:hover { background-color: #fef3e2; }
        .category-text-hover:hover { color: #E99459; }
        .gradient-bg { background: linear-gradient(to right, #fdf2f8, #faf5ff); }
        
        /* Header */
        .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
        .border-b { border-bottom-width: 1px; }
        .border-gray-100 { border-color: #f3f4f6; }
        .h-16 { height: 4rem; }
        .h-12 { height: 3rem; }
        .h-64 { height: 16rem; }
        .h-96 { height: 24rem; }
        .w-auto { width: auto; }
        .w-6 { width: 1.5rem; }
        .w-8 { width: 2rem; }
        .w-16 { width: 4rem; }
        .w-24 { width: 6rem; }
        .w-64 { width: 16rem; }
        .w-full { width: 100%; }
        
        /* Forms */
        input[type="text"], input[type="email"] { width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; }
        input:focus { outline: none; border-color: #f472b6; box-shadow: 0 0 0 3px rgba(244, 114, 182, 0.1); }
        
        /* Utilities */
        .rounded-lg { border-radius: 0.5rem; }
        .rounded-full { border-radius: 9999px; }
        .text-center { text-align: center; }
        .overflow-hidden { overflow: hidden; }
        .transition { transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
        .duration-300 { transition-duration: 300ms; }
        
        /* Newsletter section */
        .bg-gradient-to-r { background-image: linear-gradient(to right, var(--tw-gradient-stops)); }
        .from-pink-50 { --tw-gradient-from: #fdf2f8; --tw-gradient-to: rgba(253, 242, 248, 0); --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to); }
        .to-purple-50 { --tw-gradient-to: #faf5ff; }
        
        /* Hero section */
        .min-h-screen { min-height: 100vh; }
        
        /* Product cards */
        .group:hover .group-hover\\:text-orange-600 { color: #ea580c; }
        .group:hover .group-hover\\:bg-orange-50 { background-color: #fff7ed; }
        
        /* Mobile menu */
        #mobile-menu { display: none; }
        #mobile-menu.show { display: block; }
        
        /* Navigation styles */
        .hidden { display: none; }
        .md\\:flex { display: flex; }
        .md\\:hidden { display: none; }
        .space-x-8 > * + * { margin-left: 2rem; }
        .space-x-4 > * + * { margin-left: 1rem; }
        .text-gray-700 { color: #374151; }
        .hover\\:text-orange-600:hover { color: #ea580c; }
        .text-orange-600 { color: #ea580c; }
        .border-b-2 { border-bottom-width: 2px; }
        .border-orange-600 { border-color: #ea580c; }
        .px-3 { padding-left: 0.75rem; padding-right: 0.75rem; }
        .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .text-sm { font-size: 0.875rem; line-height: 1.25rem; }
        .font-medium { font-weight: 500; }
        .transition { transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
        .duration-300 { transition-duration: 300ms; }
        
        /* Mobile navigation */
        .block { display: block; }
        .text-base { font-size: 1rem; line-height: 1.5rem; }
        .hover\\:bg-orange-50:hover { background-color: #fff7ed; }
        .rounded-md { border-radius: 0.375rem; }
        .border-t { border-top-width: 1px; }
        .border-gray-200 { border-color: #e5e7eb; }
        .pt-4 { padding-top: 1rem; }
        .mr-3 { margin-right: 0.75rem; }
    </style>
</head>
<body class="font-sans antialiased bg-white">
    <!-- Header - INKEY List Style -->
    <header class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <!-- Logo Image -->
                        <img src="{{ asset('images/logo.jpg') }}" alt="SILBELE" class="h-12 w-auto">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium transition duration-300 {{ request()->routeIs('home') ? 'text-orange-600 border-b-2 border-orange-600' : '' }}">Home</a>
                    <a href="{{ route('shop') }}" class="text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium transition duration-300 {{ request()->routeIs('shop') ? 'text-orange-600 border-b-2 border-orange-600' : '' }}">Shop</a>
                    <a href="#" class="text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium transition duration-300">About</a>
                    <a href="#" class="text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium transition duration-300">Contact</a>
                </nav>

                <!-- Right side -->
                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Search products..." class="w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-300">
                        <button class="absolute right-3 top-2.5">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Wishlist -->
                    <a href="#" class="relative p-2 text-gray-700 hover:text-orange-600 transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </a>

                    <!-- Cart -->
                    <a href="#" class="relative p-2 text-gray-700 hover:text-orange-600 transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                        </svg>
                        <span class="cart-counter">0</span>
                    </a>

                    <!-- User Menu -->
                    <div class="relative hidden md:block">
                        <button class="flex items-center text-gray-700 hover:text-orange-600 transition duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="md:hidden p-2 text-gray-700 hover:text-orange-600 transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-200">
                    <!-- Mobile Search -->
                    <div class="relative mb-4">
                        <input type="text" placeholder="Search products..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-300">
                        <button class="absolute right-3 top-2.5">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Mobile Navigation Links -->
                    <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-md transition duration-300 {{ request()->routeIs('home') ? 'text-orange-600 bg-orange-50' : '' }}">Home</a>
                    <a href="{{ route('shop') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-md transition duration-300 {{ request()->routeIs('shop') ? 'text-orange-600 bg-orange-50' : '' }}">Shop</a>
                    <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-md transition duration-300">About</a>
                    <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-md transition duration-300">Contact</a>
                    
                    <!-- Mobile User Menu -->
                    <div class="pt-4 border-t border-gray-200">
                        <a href="#" class="flex items-center px-3 py-2 text-base font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-md transition duration-300">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Account
                        </a>
                        <a href="#" class="flex items-center px-3 py-2 text-base font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-md transition duration-300">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            Wishlist
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer - INKEY List Style -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('images/logo.jpg') }}" alt="SILBELE" class="h-10 w-auto mr-4">
                        <h3 class="text-2xl font-bold">SILBELE</h3>
                    </div>
                    <p class="text-gray-400 text-lg mb-6 max-w-md">
                        Premium cosmetics for every skin type. Discover your perfect routine with scientifically-backed products.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-orange-500 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-500 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-500 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Shop</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="{{ route('shop') }}" class="hover:text-orange-500 transition duration-300">All Products</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition duration-300">Skincare</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition duration-300">Makeup</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition duration-300">Bestsellers</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition duration-300">New Arrivals</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Support</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="#" class="hover:text-orange-500 transition duration-300">Contact Us</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition duration-300">Shipping Info</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition duration-300">Returns & Exchanges</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition duration-300">FAQ</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition duration-300">Size Guide</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">&copy; 2024 SILBELE. All rights reserved. | <a href="#" class="hover:text-orange-500 transition duration-300">Privacy Policy</a> | <a href="#" class="hover:text-orange-500 transition duration-300">Terms of Service</a></p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
            
            // Close mobile menu when window is resized to desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html> 