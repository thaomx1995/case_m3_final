<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Group;
use App\Models\Brand;
use App\Policies\CategoryPolicy;
// use Illuminate\Support\ServiceProvider;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Category' => 'App\Policies\CategoryPolicy',
        'App\Models\Product' => 'App\Policies\ProductPolicy',
        'App\Models\Group' => 'App\Policies\GroupPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Brand' => 'App\Policies\BrandPolicy',
        Category::class => CategoryPolicy::class,
        Product::class => ProductPolicy::class,
        Group::class => GroupPolicy::class,
        User::class => UserPolicy::class,
        Brand::class => BrandPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
