<?php

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Vendor\Package\Resources\CustomResource;

class FilamentLaravelAnalyticsServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-laravel-analytics');
    }
}
