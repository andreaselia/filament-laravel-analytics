<?php

namespace AndreasElia\FilamentLaravelAnalytics\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;
use AndreasElia\Analytics\Models\PageView;

class DevicesWidget extends Widget
{
    protected static string $view = 'filament-laravel-analytics::widgets.devices-widget';

    protected string $period = '30_days';

    protected function getViewData(): array
    {
        return [
            'items' => PageView::query()
                ->scopes(['filter' => [$this->period]])
                ->select('device as type', DB::raw('count(*) as users'))
                ->groupBy('type')
                ->get(),
        ];
    }
}
