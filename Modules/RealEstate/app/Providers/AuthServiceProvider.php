<?php

namespace Modules\RealEstate\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\RealEstate\Models\RealEstate;
use Modules\RealEstate\Policies\SellerPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the module.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        RealEstate::class => SellerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
