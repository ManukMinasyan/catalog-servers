<?php

namespace App\Providers;

use App\Repository\ComputerRepository;
use App\Repository\DataImportRepository;
use App\Repository\Interfaces\DataImportInterface;
use Illuminate\Support\ServiceProvider;
use App\Repository\Interfaces\BaseRepositoryInterface;
use App\Repository\BaseRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            BaseRepositoryInterface::class,
            BaseRepository::class

        );
        $this->app->bind(
            BaseRepositoryInterface::class,
             ComputerRepository::class

        );
        $this->app->bind(
            DataImportInterface::class,
            DataImportRepository::class
        );
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
