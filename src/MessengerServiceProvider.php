<?php

namespace Pasha\Messenger;

use Illuminate\Support\ServiceProvider;

/**
 * Created by   :  Muhammad Yasir
 * Project Name : packeges
 * Product Name : PhpStorm
 * Date         : 22-Apr-16 11:42 AM
 * File Name    : MessengerServiceProvider.php
 */
class MessengerServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app['Messenger'] = $this->app->share(function ($app) {
            return new Messenger;
        });
    }

    public function boot() {
        include __DIR__ . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'routes.php';
        $this->loadViewsFrom(__DIR__ . '\Views', 'Messenger');
    }
}
