<?php

namespace DaaGER\Nemilin;


use Illuminate\Http\Client\Factory as HttpClient;
use Illuminate\Support\ServiceProvider;

class NemilinServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind('nemilin', function ($app) {
            $client = new NemilinClient($app->make('cache.store'),$app->make(HttpClient::class));
            $client->setProjectId(env('NEMILIN_PROJECT_ID'));
            $client->setToken(env('NEMILIN_PROJECT_TOKEN'));
            return new Nemilin($client);
        });
    }
}