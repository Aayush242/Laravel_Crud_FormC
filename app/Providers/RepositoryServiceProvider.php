<?php

namespace App\Providers;

use App\Http\Controllers\AccountController;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\AccountRepositoryInterface;
use App\Repositories\AccountRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
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
?>