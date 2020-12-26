<?php

namespace App\Providers;

use App\Repositories\AuthInterface;
use App\Repositories\AuthRepository;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\PostInterface;
use App\Repositories\PostRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthInterface::class,AuthRepository::class);
        $this->app->bind(BaseRepositoryInterface::class,BaseRepository::class);
        $this->app->bind(PostInterface::class,PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Paginator::defaultView('vendor.pagination.tailwind');
//
//        Paginator::defaultSimpleView('vendor.pagination.tailwind');
    }
}
