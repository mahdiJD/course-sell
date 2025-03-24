<?php

namespace App\Filament\Widgets;

use Filament\Notifications\Notification;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    public $viewNum = 10;
    protected function getStats(): array
    {
        return [
            Stat::make('Unique views', ((string)$this->viewNum) .' k')
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "setingRoute()",
                ]),
            Stat::make('Bounce rate', '21%')
                ->description('7% decrease')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Average time on page', '3:12')
                ->description('3% increase')
                ->descriptionIcon(
                    'heroicon-m-arrow-trending-up',
                    IconPosition::After
                )
                ->color('success'),
        ];
    }
    public function setingRoute(){
        $this->viewNum + rand(1,5);
        Notification::make()
            ->title('Saved successfully')
            ->send();
        // return redirect('profile.edit');
    }
}
