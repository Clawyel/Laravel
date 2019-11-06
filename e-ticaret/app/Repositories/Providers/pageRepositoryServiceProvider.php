<?php


namespace App\Repositories\Providers;
use Illuminate\Support\ServiceProvider;

class pageRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\pagesInterface',
            // To change the data source, replace this class name
            // with another implementation
            'App\Repositories\Eloquents\Pages\pages'
        );
    }
}
