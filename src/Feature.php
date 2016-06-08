<?php

namespace JonathanBird\FeatureSwitch;

/**
 * Class Feature
 * @package JonathanBird\FeatureSwitch
 */
class Feature
{

    /**
     * Checks if feature is enabled in published feature config file
     *
     * @param  string $feature Feature name.
     * @return bool
     */
    public static function isEnabled($feature)
    {
        $features = config()->get("feature-switch")['features'] ? : array();

        if (array_key_exists($feature, $features)) {
            if ($features[$feature]) return true;

            return false;
        }

        return false;
    }
}
