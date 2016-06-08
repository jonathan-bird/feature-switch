<?php

namespace JonathanBird\FeatureSwitch;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use JonathanBird\FeatureSwitch\Feature;

class FeatureSwitchServiceProvider extends ServiceProvider
{
    private $_packageName = "feature-switch";

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
        $this->registerBladeDirectives();

        // Publish vendor folder
        $this->publishes([
            __DIR__.'/../config' => config_path($this->_packageName),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFeature();
        $this->registerFacade();
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerFeature()
    {
        $this->app->bind('feature', function () {
            return new Feature();
        });
    }

    /**
     * Register the vault facade without the user having to add it to the app.php file.
     *
     * @return void
     */
    public function registerFacade()
    {
        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Feature', Feature::class);
        });
    }

    public function registerBladeDirectives()
    {
        Blade::directive('feature', function($feature)
        {
            $feature = explode( "('" , rtrim( $feature , "')" ))[1];
            $feature = Feature::isEnabled($feature);

            if (!$feature) return "<?php if ( false === true ) : ?>";

            return "<?php if ( (bool)$feature == true ) : ?>";
        });

        /**
         * Generic if closer to not interfere with built in blade
         */
        Blade::directive('endfeature', function () {
            return "<?php endif; ?>";
        });
    }

}
