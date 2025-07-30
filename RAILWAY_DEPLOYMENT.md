# 🚀 Railway Deployment Guide for Silbele

## 📋 Environment Variables for Railway

Set these in your Railway project dashboard:

### Required Variables:
```
APP_NAME=Silbele
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-railway-app.up.railway.app
LOG_CHANNEL=stderr
DB_CONNECTION=sqlite
DB_DATABASE=/app/database/database.sqlite
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

### Generate APP_KEY:
```bash
php artisan key:generate --show
```
Copy the output and set it as `APP_KEY` in Railway.

## 🔧 Railway Configuration

### Build Commands (Auto-detected):
- **Install Dependencies**: `composer install --no-dev --optimize-autoloader && npm install`
- **Build Assets**: `npm run build`
- **Start Command**: `php artisan serve --host=0.0.0.0 --port $PORT`

### Database Setup:
1. **SQLite** (Recommended for simplicity):
   - The `database/database.sqlite` file is already included
   - Railway will automatically create the database

2. **PostgreSQL** (For production):
   - Add PostgreSQL plugin in Railway
   - Use the provided connection string
   - Update `DB_CONNECTION=pgsql` and related variables

## 🚀 Deployment Steps

### 1. Push to GitHub
```bash
git add .
git commit -m "Add Railway configuration"
git push origin main
```

### 2. Connect to Railway
- Go to [railway.app](https://railway.app)
- Create new project
- Connect your GitHub repository
- Railway will auto-detect Laravel

### 3. Set Environment Variables
- Go to your project settings
- Add all the environment variables listed above
- Generate and set `APP_KEY`

### 4. Deploy
- Railway will automatically deploy when you push to main
- Check the deployment logs for any issues

### 5. Run Migrations
- Go to Railway dashboard
- Open the "Deployments" tab
- Click on your latest deployment
- Run in the terminal:
```bash
php artisan migrate --force
php artisan db:seed --force
```

## 📱 Features Ready for Production

✅ **Mobile Navigation**: Hamburger menu works perfectly  
✅ **Brand Colors**: #E99459 orange theme  
✅ **Responsive Design**: Works on all devices  
✅ **Admin Panel**: Filament admin at `/admin`  
✅ **E-commerce**: Products, categories, cart functionality  

## 🌐 Custom Domain

1. Go to Railway project settings
2. Navigate to "Domains"
3. Add your custom domain
4. Update DNS records as instructed

## 📊 Monitoring

- **Railway Dashboard**: Real-time logs and metrics
- **Health Checks**: Automatic monitoring
- **Auto-scaling**: Railway handles traffic spikes

## 🛠️ Troubleshooting

### Common Issues:

1. **Build Fails**:
   - Check that `database/database.sqlite` exists
   - Verify all dependencies are in `composer.json`
   - Ensure `npm run build` works locally

2. **Database Errors**:
   - Run migrations: `php artisan migrate --force`
   - Check database permissions
   - Verify environment variables

3. **Asset Loading**:
   - Ensure `npm run build` completed successfully
   - Check asset paths in production

### Useful Commands:
```bash
# View logs
railway logs

# Run commands
railway run php artisan migrate

# Check status
railway status
```

## 🎉 Success!

Your Silbele e-commerce website will be live at:
`https://your-railway-app.up.railway.app`

**Features included:**
- ✅ Professional e-commerce design
- ✅ Mobile-responsive navigation
- ✅ Brand colors (#E99459)
- ✅ Product catalog
- ✅ Admin panel
- ✅ Fast loading times
- ✅ Global CDN 