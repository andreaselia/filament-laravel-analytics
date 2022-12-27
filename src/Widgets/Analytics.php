<?php

namespace App\Filament\Widgets;

use AndreasElia\Analytics\Models\PageView;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class Analytics extends StatsOverviewWidget
{
    protected static string $view = 'filament.widgets.analytics';
    public static ?string $heading = 'Devices';
    public static string $tableHeader = 'Type';
    public string $field = 'type';
    public string $filter = 'today';

    protected function getColumns(): int
    {
        return 2;
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

    protected function getCards(): array
    {
        return [
            Card::make(
                __('Devices'),
                ['items' => PageView::query()
                                    ->scopes(['filter' => [$this->filter]])
                                    ->select('device as type', DB::raw('count(*) as users'))
                                    ->groupBy('type')
                                    ->get(),
                 'field' => 'type',
                 'heading' => [__('Type'), __('Users')],
                ]
            ),

            Card::make(
                __('Users'),
                ['items' => PageView::query()
                                    ->scopes(['filter' => [$this->filter]])
                                    ->select('country', DB::raw('count(*) as users'))
                                    ->groupBy('country')
                                    ->get(),
                 'field' => 'country',
                 'heading' => [__('Country'), __('Users')],
                ]
            ),

            Card::make(
                __('Pages'),
                ['items' => PageView::query()
                                    ->scopes(['filter' => [$this->filter]])
                                    ->select('uri as page', DB::raw('count(*) as users'))
                                    ->groupBy('page')
                                    ->get(),
                 'field' => 'page',
                 'heading' => [__('Page'), __('Users')],
                ]
            ),

            Card::make(
                __('Sources'),
                ['items' => PageView::query()
                                    ->scopes(['filter' => [$this->filter]])
                                    ->select('source as page', DB::raw('count(*) as users'))
                                    ->whereNotNull('source')
                                    ->groupBy('source')
                                    ->get(),
                 'field' => 'page',
                 'heading' => [__('Page'), __('Users')],
                ]
            ),
        ];
    }
}
