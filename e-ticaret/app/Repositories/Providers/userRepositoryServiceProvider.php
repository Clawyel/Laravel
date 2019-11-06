<?php


namespace App\Repositories\Providers;
use Illuminate\Support\ServiceProvider;

class userRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\userInterface',
            // To change the data source, replace this class name
            // with another implementation
            'App\Repositories\Eloquents\User\user'
        );
    }
}
