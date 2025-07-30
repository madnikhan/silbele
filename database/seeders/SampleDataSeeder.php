<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use Illuminate\Support\Str;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create Categories
        $categories = [
            [
                'name' => 'Cleansers',
                'slug' => 'cleansers',
                'description' => 'Gentle cleansers for all skin types',
                'sort_order' => 1,
            ],
            [
                'name' => 'Serums',
                'slug' => 'serums',
                'description' => 'Targeted treatments for specific concerns',
                'sort_order' => 2,
            ],
            [
                'name' => 'Moisturizers',
                'slug' => 'moisturizers',
                'description' => 'Hydrating creams and lotions',
                'sort_order' => 3,
            ],
            [
                'name' => 'Sunscreen',
                'slug' => 'sunscreen',
                'description' => 'Daily sun protection',
                'sort_order' => 4,
            ],
            [
                'name' => 'Exfoliants',
                'slug' => 'exfoliants',
                'description' => 'Gentle exfoliation for smooth skin',
                'sort_order' => 5,
            ],
            [
                'name' => 'Masks',
                'slug' => 'masks',
                'description' => 'Weekly treatments for glowing skin',
                'sort_order' => 6,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Create Products
        $products = [
            [
                'name' => 'Gentle Foaming Cleanser',
                'slug' => 'gentle-foaming-cleanser',
                'description' => 'A gentle, non-stripping cleanser that removes dirt, oil, and makeup without disrupting your skin barrier.',
                'short_description' => 'Gentle daily cleanser for all skin types',
                'price' => 12.00,
                'compare_price' => 15.00,
                'category_id' => 1,
                'size' => '150ml',
                'skin_type' => 'All Skin Types',
                'concern' => 'Cleansing',
                'rating' => 4.7,
                'review_count' => 1250,
                'stock_quantity' => 100,
                'is_bestseller' => true,
                'ingredients' => [
                    ['ingredient' => 'Glycerin'],
                    ['ingredient' => 'Hyaluronic Acid'],
                    ['ingredient' => 'Ceramides'],
                ],
                'benefits' => [
                    ['benefit' => 'Removes makeup and impurities'],
                    ['benefit' => 'Maintains skin barrier'],
                    ['benefit' => 'Non-drying formula'],
                ],
            ],
            [
                'name' => 'Vitamin C Brightening Serum',
                'slug' => 'vitamin-c-brightening-serum',
                'description' => 'A powerful vitamin C serum that brightens skin, reduces dark spots, and provides antioxidant protection.',
                'short_description' => 'Brightening serum with 15% Vitamin C',
                'price' => 18.00,
                'compare_price' => 22.00,
                'category_id' => 2,
                'size' => '30ml',
                'skin_type' => 'All Skin Types',
                'concern' => 'Brightening',
                'rating' => 4.5,
                'review_count' => 890,
                'stock_quantity' => 75,
                'is_featured' => true,
                'ingredients' => [
                    ['ingredient' => '15% Vitamin C'],
                    ['ingredient' => 'Ferulic Acid'],
                    ['ingredient' => 'Vitamin E'],
                ],
                'benefits' => [
                    ['benefit' => 'Brightens skin tone'],
                    ['benefit' => 'Reduces dark spots'],
                    ['benefit' => 'Antioxidant protection'],
                ],
            ],
            [
                'name' => 'Hyaluronic Acid Hydrating Serum',
                'slug' => 'hyaluronic-acid-hydrating-serum',
                'description' => 'A lightweight serum that delivers intense hydration and plumps skin for a youthful appearance.',
                'short_description' => 'Intense hydration with Hyaluronic Acid',
                'price' => 14.00,
                'category_id' => 2,
                'size' => '30ml',
                'skin_type' => 'All Skin Types',
                'concern' => 'Hydration',
                'rating' => 4.8,
                'review_count' => 2100,
                'stock_quantity' => 120,
                'is_bestseller' => true,
                'ingredients' => [
                    ['ingredient' => '2% Hyaluronic Acid'],
                    ['ingredient' => 'Glycerin'],
                    ['ingredient' => 'Panthenol'],
                ],
                'benefits' => [
                    ['benefit' => 'Intense hydration'],
                    ['benefit' => 'Plumps fine lines'],
                    ['benefit' => 'Lightweight texture'],
                ],
            ],
            [
                'name' => 'Ceramide Moisturizing Cream',
                'slug' => 'ceramide-moisturizing-cream',
                'description' => 'A rich, nourishing cream that strengthens the skin barrier and provides long-lasting hydration.',
                'short_description' => 'Barrier-strengthening moisturizer',
                'price' => 20.00,
                'category_id' => 3,
                'size' => '50ml',
                'skin_type' => 'Dry, Normal',
                'concern' => 'Moisturizing',
                'rating' => 4.6,
                'review_count' => 1560,
                'stock_quantity' => 85,
                'is_bestseller' => true,
                'ingredients' => [
                    ['ingredient' => 'Ceramides'],
                    ['ingredient' => 'Shea Butter'],
                    ['ingredient' => 'Squalane'],
                ],
                'benefits' => [
                    ['benefit' => 'Strengthens skin barrier'],
                    ['benefit' => 'Long-lasting hydration'],
                    ['benefit' => 'Soothes dry skin'],
                ],
            ],
            [
                'name' => 'SPF 30 Daily Sunscreen',
                'slug' => 'spf-30-daily-sunscreen',
                'description' => 'A lightweight, non-greasy sunscreen that provides broad-spectrum protection without leaving a white cast.',
                'short_description' => 'Broad-spectrum daily protection',
                'price' => 16.00,
                'category_id' => 4,
                'size' => '50ml',
                'skin_type' => 'All Skin Types',
                'concern' => 'Sun Protection',
                'rating' => 4.4,
                'review_count' => 980,
                'stock_quantity' => 95,
                'ingredients' => [
                    ['ingredient' => 'Zinc Oxide'],
                    ['ingredient' => 'Titanium Dioxide'],
                    ['ingredient' => 'Niacinamide'],
                ],
                'benefits' => [
                    ['benefit' => 'Broad-spectrum protection'],
                    ['benefit' => 'Non-greasy formula'],
                    ['benefit' => 'No white cast'],
                ],
            ],
            [
                'name' => 'Glycolic Acid Exfoliating Toner',
                'slug' => 'glycolic-acid-exfoliating-toner',
                'description' => 'A gentle exfoliating toner that removes dead skin cells and reveals brighter, smoother skin.',
                'short_description' => 'Gentle exfoliation with Glycolic Acid',
                'price' => 13.00,
                'category_id' => 5,
                'size' => '100ml',
                'skin_type' => 'Normal, Oily',
                'concern' => 'Exfoliation',
                'rating' => 4.3,
                'review_count' => 720,
                'stock_quantity' => 60,
                'ingredients' => [
                    ['ingredient' => '5% Glycolic Acid'],
                    ['ingredient' => 'Aloe Vera'],
                    ['ingredient' => 'Glycerin'],
                ],
                'benefits' => [
                    ['benefit' => 'Gentle exfoliation'],
                    ['benefit' => 'Brightens skin'],
                    ['benefit' => 'Improves texture'],
                ],
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }

        // Create Banners
        $banners = [
            [
                'title' => 'Discover Your Perfect Skincare Routine',
                'description' => 'Premium cosmetics formulated for every skin type. Transform your skin with our scientifically-backed products.',
                'image' => 'banners/hero-banner.jpg',
                'position' => 'homepage',
                'sort_order' => 1,
            ],
            [
                'title' => '20% Off Bestsellers',
                'description' => 'Shop our most loved products at unbeatable prices. Limited time offer.',
                'image' => 'banners/sale-banner.jpg',
                'position' => 'homepage',
                'sort_order' => 2,
            ],
            [
                'title' => 'Free Shipping on Orders Over £35',
                'description' => 'Enjoy free standard shipping on all orders over £35. No code needed.',
                'image' => 'banners/shipping-banner.jpg',
                'position' => 'homepage',
                'sort_order' => 3,
            ],
        ];

        foreach ($banners as $bannerData) {
            Banner::create($bannerData);
        }
    }
}
