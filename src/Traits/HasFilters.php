<?php

namespace AndreasElia\FilamentLaravelAnalytics\Traits;

trait HasFilters
{
    protected function getHeading(): ?string
    {
        return static::$heading;
    }

    protected function getTableHeading(): array
    {
        return [static::$tableHeader, 'Users'];
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => __('Today'),
            '1_days' => __('Yesterday'),
            '7_days' => __('Last 7 days'),
            '30_days' => __('Last 30 days'),
            '6_months' => __('Last 6 months'),
            '12_months' => __('Last 12 months'),
        ];
    }
}
