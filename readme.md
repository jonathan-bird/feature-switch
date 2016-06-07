Feature Switching (made easy)
======================

Simple laravel wrapper for [JoshuaEstes/FeatureToggle](https://github.com/JoshuaEstes/FeatureToggle).

## Installation

Add the following line to the `require` section of `composer.json`:

```json
{
    "require": {
        "jonathanbird/feature-switch": "dev-master"
    }
}
```

## Setup

1. Add `'JonathanBird\FeatureSwitch\FeatureSwitchServiceProvider',` to the service provider list in `app/config/app.php`.
2. Run `php artisan vendor:publish` to publish the features config file to `config/feature-switch/features.php`