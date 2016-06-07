<?php

namespace JonathanBird\FeatureSwitch;

use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleGeneric;
use JoshuaEstes\Component\FeatureToggle\FeatureBuilder;

class FeatureSwitchBuilder {

    public static function fromFeatureConfigs(array $featureConfigs)
    {
        $features = array();

        foreach( $featureConfigs as $featureName => $settings ) {
            $toggle  = new FeatureToggleGeneric($settings);
            $feature =
                FeatureBuilder::create($featureName)
                    ->setFeatureToggle($toggle)
                    ->getFeature();

            $features[$featureName] = $feature;
        }

        return $features ? $features : array();
    }

}
