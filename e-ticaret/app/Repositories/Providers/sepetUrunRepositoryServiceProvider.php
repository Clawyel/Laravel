<?php


namespace App\Repositories\Providers;


use Illuminate\Support\ServiceProvider;

class sepetUrunRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\sepetUrunInterface',
            // To change the data source, replace this class name
            // with another implementation
            'App\Repositories\Eloquents\SepetUrun\sepetUrunObj'
        );
    }
}
