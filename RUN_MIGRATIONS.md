# How to Run Migrations on Railway

## Option 1: Railway Dashboard (EASIEST - Recommended)

1. Go to https://railway.app
2. Sign in with your account
3. Open your project **artistic-flexibility**
4. Click on your **web** service (not MySQL)
5. Go to the **Deployments** tab
6. Click on the **latest successful deployment** (the most recent one)
7. Click the **three dots (⋮)** menu button on the right
8. Select **Shell** or **View Logs**
9. A terminal will open - run this command:
   ```bash
   php artisan migrate --force
   ```

## Option 2: Railway CLI (Need to link to web service)

First, you need to link to the **web** service, not MySQL:

1. In your terminal, run:
   ```bash
   railway link
   ```
2. When prompted:
   - Select workspace: **hisham-tabaa's Projects**
   - Select project: **artistic-flexibility**
   - Select environment: **production**
   - **IMPORTANT**: Select service: **web** (not MySQL!)
3. Then run:
   ```bash
   railway run php artisan migrate --force
   ```

## Option 3: Add as Pre-Deploy Step (Automatic)

If you want migrations to run automatically before each deployment:

1. Go to Railway Dashboard → Your **web** service
2. Scroll to **Deploy** section
3. Click **Add pre-deploy step**
4. Enter: `php artisan migrate --force`
5. Click **Save**

⚠️ **Note**: This runs migrations on every deployment. Use with caution.

## Which Option Should You Use?

- **Option 1 (Dashboard)** is the easiest and recommended for first-time setup
- **Option 2 (CLI)** is good if you prefer command line
- **Option 3 (Pre-deploy)** is for automation after you've tested migrations work correctly

