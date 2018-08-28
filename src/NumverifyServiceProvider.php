<?php

namespace Rayblair\NumverifyWrapper;

use Rayblair\NumverifyWrapper\NumverifyService;
use Illuminate\Support\ServiceProvider;

class NumverifyServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (file_exists(config_path("numverify.php"))) {
            $this->mergeConfigFrom(config_path("numverify.php"), "Numverify");
        } else {
            $this->mergeConfigFrom(realpath(__DIR__ . "/../config/numverify.php"), "Numverify");
        }

        $this->app->singleton("Numverify", function ($app) {
            $config = $app->make("config");
            $data["api_key"] = $config->get("Numverify.numverify_key");

            return new NumverifyService($data);
        });
    }
}
