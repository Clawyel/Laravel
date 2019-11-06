<?php


namespace App\Repositories\Providers;


use Illuminate\Support\ServiceProvider;

class urunRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\urunInterface',
            // To change the data source, replace this class name
            // with another implementation
            'App\Repositories\Eloquents\Urun\product'
        );
    }
}
