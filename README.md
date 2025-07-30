# Silbele - Premium Cosmetics E-commerce

A modern, Laravel-based e-commerce platform for premium cosmetics, inspired by The INKEY List website design and functionality.

## 🚀 Features

### Frontend
- **Modern, Responsive Design** - Beautiful UI inspired by The INKEY List
- **Product Catalog** - Browse products by category with filtering and sorting
- **Product Details** - Comprehensive product pages with images, descriptions, ingredients, and benefits
- **Bestsellers & Featured Products** - Highlighted product sections
- **Category Navigation** - Organized product browsing
- **Search Functionality** - Find products quickly
- **Shopping Cart** - Add products to cart (frontend ready)
- **Newsletter Signup** - Email subscription for updates

### Admin Panel (Filament)
- **Product Management** - Create, edit, and manage products with rich content
- **Category Management** - Organize products with nested categories
- **Banner Management** - Create promotional banners for homepage
- **Order Management** - Track and manage customer orders
- **User Management** - Manage customer accounts
- **File Upload** - Image management for products and banners

### Technical Features
- **Laravel 12** - Latest Laravel framework
- **Filament 3** - Modern admin panel
- **Tailwind CSS** - Utility-first CSS framework
- **SQLite Database** - Easy development setup
- **File Storage** - Image upload and management
- **SEO Ready** - Clean URLs and meta tags

## 📋 Requirements

- PHP 8.2+
- Composer
- Node.js & NPM
- SQLite (or MySQL/PostgreSQL)

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd silbele
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Storage setup**
   ```bash
   php artisan storage:link
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

## 🌐 Access Points

- **Frontend**: http://localhost:8000
- **Admin Panel**: http://localhost:8000/admin
  - Default credentials: admin@admin.com / password

## 📁 Project Structure

```
silbele/
├── app/
│   ├── Filament/Resources/     # Admin panel resources
│   ├── Http/Controllers/       # Frontend controllers
│   └── Models/                 # Eloquent models
├── database/
│   ├── migrations/             # Database migrations
│   └── seeders/               # Sample data seeders
├── resources/
│   └── views/                 # Blade templates
└── routes/
    └── web.php                # Web routes
```

## 🎨 Design Features

### Inspired by The INKEY List
- Clean, minimalist design
- Pink color scheme for cosmetics branding
- Product-focused layout
- Easy navigation
- Mobile-responsive design
- Professional typography

### Key Design Elements
- **Hero Banners** - Promotional content on homepage
- **Product Grids** - Clean product displays
- **Category Cards** - Visual category navigation
- **Product Cards** - Detailed product information
- **Filter Sidebar** - Advanced product filtering
- **Breadcrumbs** - Clear navigation paths

## 🛍️ E-commerce Features

### Product Management
- Product categories and subcategories
- Product images and galleries
- Pricing with discount support
- Stock management
- Product ratings and reviews
- Ingredients and benefits lists
- Skin type and concern targeting

### Order Management
- Order tracking
- Payment processing (ready for integration)
- Shipping management
- Customer accounts
- Order history

## 🔧 Customization

### Adding New Products
1. Access the admin panel at `/admin`
2. Navigate to Products section
3. Click "Create Product"
4. Fill in product details including:
   - Basic information (name, description, price)
   - Category assignment
   - Product images
   - Ingredients and benefits
   - Skin type and concerns

### Managing Categories
1. Go to Categories in admin panel
2. Create new categories or edit existing ones
3. Set parent categories for nested organization
4. Add category images and descriptions

### Creating Banners
1. Navigate to Banners in admin panel
2. Create promotional banners for homepage
3. Set banner positions and scheduling
4. Upload banner images

## 🚀 Deployment

### Production Setup
1. Update `.env` file with production settings
2. Set up a production database (MySQL/PostgreSQL)
3. Configure file storage (AWS S3 recommended)
4. Set up SSL certificate
5. Configure web server (Nginx/Apache)
6. Set up queue workers for background jobs

### Environment Variables
```env
APP_NAME=Silbele
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=silbele
DB_USERNAME=your_username
DB_PASSWORD=your_password

FILESYSTEM_DISK=public
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🙏 Acknowledgments

- Inspired by The INKEY List website design
- Built with Laravel and Filament
- Styled with Tailwind CSS
- Icons from Heroicons

---

**Silbele** - Premium cosmetics for every skin type. Discover your perfect routine.
# silbele
# silbele
