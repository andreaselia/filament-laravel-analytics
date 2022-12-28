<?php

namespace AndreasElia\FilamentLaravelAnalytics\Widgets;

use AndreasElia\Analytics\Models\PageView;
use AndreasElia\FilamentLaravelAnalytics\Traits\HasFilters;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;

class DevicesWidget extends Widget
{
    use HasFilters;

    protected static string $view = 'filament-laravel-analytics::widgets.widget';
    public static string $heading = 'Devices';
    public static string $tableHeader = 'Type';
    public string $field = 'type';
    public string $filter = 'today';

    protected function getViewData(): array
    {
        return [
            'items' => PageView::query()
                               ->scopes(['filter' => [$this->filter]])
                               ->select('device as type', DB::raw('count(*) as users'))
                               ->groupBy('type')
                               ->get(),
        ];
    }
}
