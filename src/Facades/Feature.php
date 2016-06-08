<?php

namespace JonathanBird\FeatureSwitch\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Feature
 * @package JonathanBird\FeatureSwitch\Facades
 */
class Feature extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'feature';
    }
}
