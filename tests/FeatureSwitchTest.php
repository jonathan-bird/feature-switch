<?php

namespace JonathanBird\FeatureSwitch\Tests;

use JonathanBird\FeatureSwitch\Feature;
use TestCase;

class FeatureSwitchTest extends TestCase
{
    /*
     * Return array of features from config
     *
     * @covers JonathanBird\FeatureSwitch\Feature::getFeaturesConfig
     */
    public function testTypeOfFeatureConfig()
    {
        $getConfig = Feature::getFeaturesConfig();

        $this->assertTrue(is_array($getConfig));
    }
}