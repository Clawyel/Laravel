<?php


namespace App\Repositories\Providers;


use Illuminate\Support\ServiceProvider;

class sepetRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\sepetInterface',
            // To change the data source, replace this class name
            // with another implementation
            'App\Repositories\Eloquents\Sepet\sepetObj'
        );
    }
}
