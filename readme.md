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


## Usage

1. In the view, you can use the directive `@feature('feature_name') something @endfeature`
2. In your controller or anywhere, simply add `use Feature;` to the top of your file and use the alias `Feature::isEnabled('feature_one')` which returns a boolean value