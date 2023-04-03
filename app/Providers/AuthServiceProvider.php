<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Categories;
use App\Policies\CategoriesPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         Post::class => PostPolicy::class,
         Categories::class => CategoriesPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
