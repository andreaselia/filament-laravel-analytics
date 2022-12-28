<?php

namespace AndreasElia\FilamentLaravelAnalytics\Widgets;

use AndreasElia\Analytics\Models\PageView;
use AndreasElia\FilamentLaravelAnalytics\Traits\HasFilters;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;

class UsersWidget extends Widget
{
    use HasFilters;

    protected static string $view = 'filament-laravel-analytics::widgets.widget';
    public static string $heading = 'Users';
    public static string $tableHeader = 'Country';
    public string $field = 'country';
    public string $filter = 'today';

    protected function getViewData(): array
    {
        return [
            'items' => PageView::query()
                               ->scopes(['filter' => [$this->filter]])
                               ->select('country', DB::raw('count(*) as users'))
                               ->groupBy('country')
                               ->get(),
        ];
    }
}
