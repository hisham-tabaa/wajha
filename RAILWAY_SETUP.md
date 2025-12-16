# Railway Deployment Guide

This guide will help you set up your Laravel application on Railway with a database.

## Step 1: Deploy Your Application

1. Go to [Railway](https://railway.app) and sign in
2. Click "New Project" → "Deploy from GitHub repo"
3. Select your repository: `hisham-tabaa/wajha`
4. Select the branch: `development` (or `main` if you prefer)

## Step 2: Add a Database Service

1. In your Railway project dashboard, click "+ New"
2. Select "Database" → Choose either:
   - **MySQL** (recommended for Laravel)
   - **PostgreSQL** (also works great with Laravel)

3. Railway will automatically create the database service and provide connection variables

## Step 3: Configure Environment Variables

After adding the database, Railway automatically creates these environment variables:
- `MYSQL_HOST` or `PGHOST`
- `MYSQL_USER` or `PGUSER`
- `MYSQL_PASSWORD` or `PGPASSWORD`
- `MYSQL_DATABASE` or `PGDATABASE`
- `MYSQL_PORT` or `PGPORT`
- `DATABASE_URL` (connection string)

### Manual Configuration (if needed):

Go to your web service → Variables tab and add:

**For MySQL:**
```
DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQL_HOST}}
DB_PORT=${{MySQL.MYSQL_PORT}}
DB_DATABASE=${{MySQL.MYSQL_DATABASE}}
DB_USERNAME=${{MySQL.MYSQL_USER}}
DB_PASSWORD=${{MySQL.MYSQL_PASSWORD}}
```

**For PostgreSQL:**
```
DB_CONNECTION=pgsql
DB_HOST=${{Postgres.PGHOST}}
DB_PORT=${{Postgres.PGPORT}}
DB_DATABASE=${{Postgres.PGDATABASE}}
DB_USERNAME=${{Postgres.PGUSER}}
DB_PASSWORD=${{Postgres.PGPASSWORD}}
```

### Additional Required Environment Variables:

Add these to your web service variables:

```
APP_NAME=Wajha
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=${{RAILWAY_PUBLIC_DOMAIN}}

LOG_CHANNEL=stderr
LOG_LEVEL=error
```

**To generate APP_KEY:**
- Railway will auto-generate it, or you can generate it locally:
  ```bash
  php artisan key:generate --show
  ```
  Copy the key and add it to Railway variables

## Step 4: Run Migrations

After deployment, you need to run migrations:

1. Go to your web service in Railway
2. Click on the "Deployments" tab
3. Find a successful deployment
4. Click the three dots → "View Logs"
5. Or use Railway CLI:
   ```bash
   railway run php artisan migrate --force
   ```

**Or add a deploy script:**

Create a `railway.toml` file (optional) to run migrations automatically:

```toml
[build]
builder = "NIXPACKS"

[deploy]
startCommand = "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT"
```

## Step 5: Verify Deployment

1. Check your Railway service logs to ensure no errors
2. Visit your application URL (Railway provides a public domain)
3. Test database connectivity

## Troubleshooting

### Database Connection Issues

If you see database errors:
1. Verify all database environment variables are set correctly
2. Check that the database service is running
3. Ensure the web service can access the database (they should be in the same project)

### Build Errors

If build fails:
1. Check build logs in Railway
2. Ensure all dependencies are in `composer.json`
3. Verify PHP version compatibility (requires PHP 8.2+)

### Permission Issues

Laravel needs write permissions for storage:
- Railway handles this automatically, but if you see permission errors, the build process should create the directories with correct permissions

## Railway CLI (Optional)

Install Railway CLI for easier management:

```bash
# Install Railway CLI
npm i -g @railway/cli

# Login
railway login

# Link your project
railway link

# View logs
railway logs

# Run migrations
railway run php artisan migrate --force

# Open shell
railway shell
```

## Important Notes

- **Ephemeral Filesystem**: Railway's filesystem is ephemeral, meaning files written to disk won't persist between deployments. Use the database or external storage (like S3) for persistent data.
- **Logs**: Configure Laravel to log to `stderr` (already done in this guide) so you can view logs in Railway's dashboard.
- **Storage**: If you need file storage, consider using Laravel's S3 driver or Railway's volume feature for persistent storage.

## Database URL Alternative

Railway also provides a `DATABASE_URL` variable. You can use it directly:

```
DB_URL=${{MySQL.DATABASE_URL}}
```

Laravel will automatically parse this URL and extract connection details.

