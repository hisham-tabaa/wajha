# Running Migrations on Railway

## Option 1: Railway CLI (Recommended)

1. Install Railway CLI:
   ```bash
   npm i -g @railway/cli
   ```

2. Login and link your project:
   ```bash
   railway login
   railway link
   ```

3. Run migrations:
   ```bash
   railway run php artisan migrate --force
   ```

4. (Optional) Run seeders if you have them:
   ```bash
   railway run php artisan db:seed --force
   ```

## Option 2: Railway Dashboard

1. Go to your Railway project dashboard
2. Click on your **web** service
3. Go to the **Deployments** tab
4. Click on the latest successful deployment
5. Click the three dots (⋮) menu
6. Select **View Logs** or **Shell**
7. In the terminal/shell, run:
   ```bash
   php artisan migrate --force
   ```

## Option 3: Add to Deploy Command (Automatic)

You can modify your `Procfile` to run migrations automatically on each deployment:

```
web: php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT
```

**Note:** This runs migrations on every deployment, which might not always be desired. Use with caution in production.

## Running Module Migrations

If your modules have their own migrations, you may need to run:

```bash
php artisan module:migrate
```

Or run migrations for specific modules:

```bash
php artisan module:migrate Auth
php artisan module:migrate RealEstate
php artisan module:migrate System
php artisan module:migrate Society
php artisan module:migrate Vehicles
```

## Verify Migrations

After running migrations, check your MySQL database in Railway:
1. Go to your MySQL service
2. Click on the **Data** tab
3. You should see all your tables listed

