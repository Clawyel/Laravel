<?php


namespace App\Repositories\Providers;


use Illuminate\Support\ServiceProvider;

class yayinevleriProvider extends  ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Interfaces\yayinevleriInterfaces',
            'App\Repositories\Eloquents\yayineviObj');

    }
}
