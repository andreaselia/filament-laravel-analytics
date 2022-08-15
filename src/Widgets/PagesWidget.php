<?php

namespace AndreasElia\FilamentLaravelAnalytics\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;
use AndreasElia\Analytics\Models\PageView;

class PagesWidget extends Widget
{
    protected static string $view = 'filament-laravel-analytics::widgets.pages-widget';

    protected string $period = '30_days';

    protected function getViewData(): array
    {
        return [
            'items' => PageView::query()
                ->scopes(['filter' => [$this->period]])
                ->select('uri as page', DB::raw('count(*) as users'))
                ->groupBy('page')
                ->get(),
        ];
    }
}
