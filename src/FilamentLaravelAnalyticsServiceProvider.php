<?php

namespace AndreasElia\FilamentLaravelAnalytics;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentLaravelAnalyticsServiceProvider extends PluginServiceProvider
{
    protected array $widgets = [
        Widgets\PagesWidget::class,
        // Widgets\SourcesWidget::class,
        // Widgets\UsersWidget::class,
        // Widgets\DevicesWidget::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('filament-laravel-analytics');
    }
}
