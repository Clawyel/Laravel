<?php


namespace App\Repositories\Providers;


use Illuminate\Support\ServiceProvider;

class yazarProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Interfaces\yazarlarInterface',
            'App\Repositories\Eloquents\yazarlarObj');

    }
}
