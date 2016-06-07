<?php

namespace JonathanBird\FeatureSwitch;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
//use JoshuaEstes\Component\FeatureToggle\FeatureContainer;

class FeatureSwitchServiceProvider extends ServiceProvider
{
//    private $_packageName = "FeatureSwitch";

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require __DIR__ . '/../vendor/autoload.php';

        $this->setupBladeDirective();

        // Publish vendor folder
        $this->publishes([
            __DIR__.'/../config' => config_path('feature-switch'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['FeatureSwitch'] = $this->app->share(function($app) {
            $configPath     = sprintf("packages.infi-nl.%s.feature", $this->_packageName);
            $featureConfigs = $app["config"]->get($configPath) ?: array();

            $features       = LaravelFeatureBuilder::fromFeatureConfigs($featureConfigs);

            return new FeatureContainer($features);
        });
    }

    public function setupBladeDirective()
    {
        Blade::directive('feature', function($feature)
        {
            return "<?php if{$feature}: echo $feature; ?> ";
        });
    }

}
