Feature Switching (made easy) for Laravel
======================

Need to wrap new features for dev and production? Use a directive in the view or alias in the controller

There's great libraries in Java and other languages, but I found a real lack of good libraries to do this in PHP, so I've created my own.

## Installation

Add the following line to the `require` section of `composer.json`:

```json
{
    "require": {
        "jonathanbird/feature-switch": "dev-master"
    }
}
```

or `composer require jonathanbird/feature-switch`

## Setup

1. Add `'JonathanBird\FeatureSwitch\FeatureSwitchServiceProvider',` to the service provider list in `app/config/app.php`.
2. Run `php artisan vendor:publish` to publish the features config file to `config/feature-switch/features.php`


## Usage

1. In the view, you can use the directive ```@feature('feature_name') something @endfeature``` (note `@else` also works for when a feature is not enabled)
2. In your controller or anywhere, simply add `use Feature;` to the top of your file and use the alias ```Feature::isEnabled('feature_one')``` which returns a boolean value
3. To add features, add your feature name and boolean value to `config/feature-switch/features.php`

## Why would I use this over git merging?
If you have multiple environments (e.g. three test environments, staging and production) and you want to have the code base in a state of continuous deployment, then you may wish to branch your feature, wrap it within feature switch, merge it in to master branch, and when it gets to staging or production and you realise there's a bug, you can simply switch the feature off without it causing an issue rather than having to remove code from a merge. This is also works well for launching a feature as it's a simple on/off switch - simply git ignore the features.php file to have a different one in each environment.

## Issues
If you find an issue, please report it. If it's something you can fix, fork the project and use a pull request as it'll be much quicker.
