<?php

namespace AndreasElia\FilamentLaravelAnalytics\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;
use AndreasElia\Analytics\Models\PageView;

class SourcesWidget extends Widget
{
    protected static string $view = 'filament-laravel-analytics::widgets.sources-widget';

    protected string $period = '30_days';

    protected function getViewData(): array
    {
        return [
            'items' => PageView::query()
                ->scopes(['filter' => [$this->period]])
                ->select('source as page', DB::raw('count(*) as users'))
                ->whereNotNull('source')
                ->groupBy('source')
                ->get(),
        ];
    }
}
