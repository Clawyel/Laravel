<?php


namespace App\Repositories\Providers;


use Illuminate\Support\ServiceProvider;

class kitapProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Interfaces\kitaplarInterface',
            'App\Repositories\Eloquents\kitapObj');

    }
}
