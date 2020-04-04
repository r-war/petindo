<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\CategoryContract;
use App\Repositories\CategoryRepository;

use App\Contracts\AttributeContract;
use App\Repositories\AttributeRepository;

use App\Contracts\BrandContract;
use App\Repositories\BrandRepository;

use App\Contracts\ProductContract;
use App\Repositories\ProductRepository;

use App\Contracts\MenuContract;
use App\Repositories\MenuRepository;

use App\Contracts\OrderContract;
use App\Repositories\OrderRepository;

use App\Contracts\BannerContract;
use App\Repositories\BannerRepository;

use App\Contracts\PageContract;
use App\Repositories\PageRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class => CategoryRepository::class,
        AttributeContract::class => AttributeRepository::class,
        BrandContract::class => BrandRepository::class,
        ProductContract::class => ProductRepository::class,
        MenuContract::class => MenuRepository::class,
        BannerContract::class => BannerRepository::class,
        OrderContract::class => OrderRepository::class,
        PageContract::class => PageRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
