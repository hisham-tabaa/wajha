<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
        Paginator::useBootstrapFive();
        
        // Skip database check during build-time cache commands or when running in console with cache commands
        if (app()->runningInConsole()) {
            $command = $_SERVER['argv'][1] ?? null;
            $cacheCommands = ['config:cache', 'route:cache', 'view:cache', 'event:cache', 'package:discover', 'optimize'];
            
            // Also skip if command contains 'cache' (covers variations)
            if ($command && (in_array($command, $cacheCommands) || str_contains($command, 'cache'))) {
                return;
            }
        }
        
        // Skip database check if no database is configured (common during builds)
        $dbConnection = config('database.default');
        if (!$dbConnection || $dbConnection === 'sqlite') {
            $dbPath = config("database.connections.{$dbConnection}.database");
            if ($dbConnection === 'sqlite' && !file_exists($dbPath)) {
                // Skip check if SQLite file doesn't exist (common during builds)
                return;
            }
        }
        
        // Check if the database connection is available when the app boots up
        // Only in production/web requests, not during builds
        // Note: Disabled exit on failure to prevent 500 errors - errors will be logged instead
        if (!app()->runningInConsole()) {
            try {
                DB::connection()->getPdo();
            } catch (\Exception $e) {
                // Log the error instead of exiting - this prevents 500 errors
                \Log::error('Database connection failed on boot: ' . $e->getMessage());
                // Don't exit - let the app continue and handle DB errors gracefully
            }
        }
    }
}
