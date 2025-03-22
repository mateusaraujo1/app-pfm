<?php

namespace App\Livewire;

use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Unique views', '192.1k')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}
