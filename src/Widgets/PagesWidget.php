<?php

namespace AndreasElia\FilamentLaravelAnalytics\Widgets;

use AndreasElia\Analytics\Models\PageView;
use AndreasElia\FilamentLaravelAnalytics\Traits\HasFilters;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;

class PagesWidget extends Widget
{
    use HasFilters;

    protected static string $view = 'filament-laravel-analytics::widgets.widget';
    public static string $heading = 'Pages';
    public static string $tableHeader = 'Page';
    public string $field = 'page';
    public string $filter = 'today';

    protected function getViewData(): array
    {
        return [
            'items' => PageView::query()
                ->scopes(['filter' => [$this->filter]])
                ->select('uri as page', DB::raw('count(*) as users'))
                ->groupBy('page')
                ->get(),
        ];
    }
}
