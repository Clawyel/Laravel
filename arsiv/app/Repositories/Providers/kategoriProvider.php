<?php


namespace App\Repositories\Providers;


use Illuminate\Support\ServiceProvider;

class kategoriProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Interfaces\kategorilerInterface',
            'App\Repositories\Eloquents\kategorilerObj');

    }
}
