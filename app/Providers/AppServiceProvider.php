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
        
        // Skip database check during build-time cache commands
        if (app()->runningInConsole() && isset($_SERVER['argv'][1])) {
            $command = $_SERVER['argv'][1];
            $cacheCommands = ['config:cache', 'route:cache', 'view:cache', 'event:cache', 'package:discover'];
            
            if (in_array($command, $cacheCommands)) {
                return;
            }
        }
        
        // Check if the database connection is available when the app boots up
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
