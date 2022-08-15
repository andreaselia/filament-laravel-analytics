<?php

namespace AndreasElia\FilamentLaravelAnalytics;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentLaravelAnalyticsServiceProvider extends PluginServiceProvider
{
    protected array $widgets = [
        Widgets\PageViewsWidget::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('filament-laravel-analytics')->hasViews();
    }
}
