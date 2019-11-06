<?php


namespace App\Repositories\Providers;
use Illuminate\Support\ServiceProvider;

class kategoriRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\kategoriInterface',
            // To change the data source, replace this class name
            // with another implementation
            'App\Repositories\Eloquents\Categori\categori'
        );
    }
}
