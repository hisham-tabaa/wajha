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
        if (!app()->runningInConsole()) {
            try {
                DB::connection()->getPdo();
            } catch (\Exception $e) {
                // If the database connection fails, display an error message and stop the execution
                echo "❌ [DATABASE ERROR] MySQL is not running or .env config is invalid.\n";
                echo "Reason: " . $e->getMessage() . "\n";
                exit(1); // Stop the execution of the app
            }
        }
    }
}
