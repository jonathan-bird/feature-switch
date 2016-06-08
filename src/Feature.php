<?php

namespace JonathanBird\FeatureSwitch;

/**
 * Class Feature
 * @package JonathanBird\FeatureSwitch
 */
class Feature
{

    /**
     * Returns array of all the features from the local feature file
     *
     * @return array
     */
    public static function getFeaturesConfig()
    {
        return config()->get("feature-switch")['features'] ? : array();
    }

    /**
     * Checks if feature is enabled in published feature config file
     *
     * @param  string $feature Feature name.
     * @return bool
     */
    public static function isEnabled($feature)
    {
        $features = Feature::getFeaturesConfig();

        if (array_key_exists($feature, $features)) {
            if ($features[$feature]) return true;

            return false;
        }

        return false;
    }
}
