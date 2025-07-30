# Railway Environment Variables Setup

## Required Environment Variables

You need to set these environment variables in your Railway project dashboard:

### 1. Go to Railway Dashboard
- Navigate to your project in Railway
- Click on your service
- Go to the "Variables" tab

### 2. Add These Environment Variables

```
APP_NAME=Silbele
APP_ENV=production
APP_KEY=base64:0f+9QH4xYr95EkftmfXxauhsmmUCP+YFqvaBaHhYVHs=
APP_DEBUG=false
APP_URL=https://your-railway-app-url.railway.app

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=sqlite
DB_DATABASE=/var/www/database/database.sqlite

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database

MAIL_MAILER=log
MAIL_FROM_ADDRESS="noreply@silbele.com"
MAIL_FROM_NAME="Silbele"

VITE_APP_NAME="Silbele"
```

### 3. Important Notes

- **APP_URL**: Replace `your-railway-app-url.railway.app` with your actual Railway app URL
- **APP_KEY**: Use the generated key above
- **DB_CONNECTION**: Set to `sqlite` for simplicity
- **APP_DEBUG**: Set to `false` for production

### 4. How to Add Variables in Railway

1. In Railway dashboard, go to your project
2. Click on your service
3. Go to "Variables" tab
4. Click "New Variable"
5. Add each variable one by one:
   - **Name**: `APP_NAME`
   - **Value**: `Silbele`
6. Repeat for all variables above

### 5. After Setting Variables

1. Railway will automatically redeploy your application
2. The build should complete successfully
3. Healthcheck should pass
4. Your application will be accessible at your Railway URL

### 6. Troubleshooting

If you still get errors:
- Check that all variables are set correctly
- Ensure no extra spaces in variable names or values
- Make sure the APP_URL matches your actual Railway URL
- Check the Railway logs for any specific error messages

## Quick Setup Commands

If you prefer to use Railway CLI:

```bash
# Install Railway CLI if you haven't
npm install -g @railway/cli

# Login to Railway
railway login

# Link your project
railway link

# Set variables (replace with your actual values)
railway variables set APP_NAME=Silbele
railway variables set APP_ENV=production
railway variables set APP_KEY=base64:0f+9QH4xYr95EkftmfXxauhsmmUCP+YFqvaBaHhYVHs=
railway variables set APP_DEBUG=false
railway variables set APP_URL=https://your-railway-app-url.railway.app
railway variables set DB_CONNECTION=sqlite
railway variables set DB_DATABASE=/var/www/database/database.sqlite
```

## Success Indicators

Once properly configured, you should see:
- ✅ Build completes successfully
- ✅ Healthcheck passes
- ✅ Application accessible at your Railway URL
- ✅ No environment variable errors in logs 