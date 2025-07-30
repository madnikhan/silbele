<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $bestsellers = Product::active()->bestseller()->with('category')->take(8)->get();
        $featured = Product::active()->featured()->with('category')->take(4)->get();
        $categories = Category::active()->ordered()->take(6)->get();
        $banners = Banner::active()->current()->ordered()->take(3)->get();

        return view('home', compact('bestsellers', 'featured', 'categories', 'banners'));
    }

    public function shop(Request $request)
    {
        $query = Product::active()->with('category');

        // Filter by category
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by price
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter by skin type
        if ($request->has('skin_type')) {
            $query->where('skin_type', $request->skin_type);
        }

        // Filter by concern
        if ($request->has('concern')) {
            $query->where('concern', $request->concern);
        }

        // Sort products
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(12);
        $categories = Category::active()->ordered()->get();

        return view('shop', compact('products', 'categories'));
    }

    public function product($slug)
    {
        $product = Product::active()->where('slug', $slug)->with('category')->firstOrFail();
        $relatedProducts = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('product', compact('product', 'relatedProducts'));
    }

    public function category($slug)
    {
        $category = Category::active()->where('slug', $slug)->firstOrFail();
        $products = Product::active()
            ->where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('category', compact('category', 'products'));
    }
}
