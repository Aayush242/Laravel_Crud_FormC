<?php

namespace App\Providers;

//Controllers
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;

use Illuminate\Support\ServiceProvider;

//Account 
use App\Interfaces\AccountRepositoryInterface;
use App\Repositories\AccountRepository;

//Contact
use App\Interfaces\ContactRepositoryInterface;
use App\Repositories\ContactRepository;

//Project
use App\Interfaces\ProjectRepositoryInterface;
use App\Repositories\ProjectRepository;

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
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
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