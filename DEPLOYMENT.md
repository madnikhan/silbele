# 🚀 Silbele E-commerce Deployment Guide

## 📋 Prerequisites

1. **Vercel Account**: Sign up at [vercel.com](https://vercel.com)
2. **GitHub Account**: For version control
3. **Vercel CLI**: Already installed globally

## 🔧 Pre-Deployment Setup

### 1. Build Assets for Production
```bash
npm run build
```

### 2. Generate Application Key
```bash
php artisan key:generate
```

### 3. Create Production Environment File
Create a `.env.production` file with:
```env
APP_NAME=Silbele
APP_ENV=production
APP_KEY=your-generated-key
APP_DEBUG=false
APP_URL=https://your-project-name.vercel.app

DB_CONNECTION=sqlite
DB_DATABASE=/tmp/database.sqlite

CACHE_DRIVER=array
SESSION_DRIVER=cookie
QUEUE_CONNECTION=sync

LOG_CHANNEL=stderr
```

## 🚀 Deploy to Vercel

### Method 1: Using Vercel CLI (Recommended)

1. **Login to Vercel**:
   ```bash
   vercel login
   ```

2. **Deploy the Project**:
   ```bash
   vercel --prod
   ```

3. **Follow the prompts**:
   - Set up and deploy: `Y`
   - Which scope: Select your account
   - Link to existing project: `N`
   - Project name: `silbele` (or your preferred name)
   - Directory: `.` (current directory)
   - Override settings: `N`

### Method 2: Using Vercel Dashboard

1. **Push to GitHub**:
   ```bash
   git init
   git add .
   git commit -m "Initial commit"
   git branch -M main
   git remote add origin https://github.com/yourusername/silbele.git
   git push -u origin main
   ```

2. **Connect to Vercel**:
   - Go to [vercel.com/dashboard](https://vercel.com/dashboard)
   - Click "New Project"
   - Import your GitHub repository
   - Configure settings:
     - Framework Preset: `Other`
     - Build Command: `npm run build`
     - Output Directory: `public`
     - Install Command: `composer install --no-dev --optimize-autoloader`

## ⚙️ Environment Variables

Set these in your Vercel project settings:

### Required Variables:
```
APP_NAME=Silbele
APP_ENV=production
APP_KEY=your-generated-key
APP_DEBUG=false
APP_URL=https://your-project-name.vercel.app
```

### Database (Optional - for persistent data):
```
DATABASE_URL=your-database-url
```

## 🔧 Post-Deployment Configuration

### 1. Run Migrations (if using database):
```bash
vercel env pull .env.production
php artisan migrate --force
```

### 2. Clear Caches:
```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### 3. Optimize for Production:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🌐 Custom Domain (Optional)

1. Go to your Vercel project dashboard
2. Navigate to "Settings" → "Domains"
3. Add your custom domain
4. Update DNS records as instructed

## 📊 Monitoring & Analytics

- **Vercel Analytics**: Built-in performance monitoring
- **Error Tracking**: Automatic error reporting
- **Performance**: Real-time metrics

## 🔄 Continuous Deployment

Every push to your `main` branch will automatically trigger a new deployment.

## 🛠️ Troubleshooting

### Common Issues:

1. **Build Failures**:
   - Check `npm run build` works locally
   - Verify all dependencies are in `package.json`

2. **Database Issues**:
   - Ensure SQLite file is writable
   - Check database migrations

3. **Asset Loading**:
   - Verify Vite build completed successfully
   - Check asset paths in production

### Useful Commands:
```bash
# View deployment logs
vercel logs

# Redeploy
vercel --prod

# Check deployment status
vercel ls
```

## 📱 Mobile Navigation

Your mobile hamburger menu is already configured and will work perfectly on Vercel!

## 🎉 Success!

Your Silbele e-commerce website is now live on Vercel with:
- ✅ Responsive design
- ✅ Mobile navigation
- ✅ Brand colors (#E99459)
- ✅ Professional UI
- ✅ Fast loading times
- ✅ Global CDN

**Visit your live site**: `https://your-project-name.vercel.app` 