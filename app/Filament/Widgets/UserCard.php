<?php

namespace App\Filament\Widgets;

use App\Models\Agent;
use App\Models\Category;
use App\Models\PropertyFeature;
use App\Models\PropertyListing;
use App\Models\PropertyType;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserCard extends BaseWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('All Properties', PropertyListing::count())
                ->description('All New Properties Here')
                ->descriptionIcon('heroicon-s-building-office-2', IconPosition::Before)
                ->descriptionColor('danger')
                ->chart([PropertyListing::count(), '2', '5', '8', '1'])
                ->url('/admin/property-listings')
                ->color('success'),

            Stat::make('All Properties Categroy', Category::count())
                ->description('All New Properties Category is Here')
                ->descriptionIcon('heroicon-s-building-office-2', IconPosition::Before)
                ->descriptionColor('danger')
                ->chart([Category::count(), '2', '5', '8', '1'])
                ->url('/admin/categories')
                ->color('success'),

            Stat::make('All Properties Type', PropertyType::count())
                ->description('All New Properties Type is Here')
                ->descriptionIcon('heroicon-s-building-office-2', IconPosition::Before)
                ->descriptionColor('danger')
                ->chart([PropertyType::count(), '2', '5', '8', '1'])
                ->color('success')
                ->url('/admin/property-types')
                ,

            Stat::make('All Agents', Agent::count())
                ->description('All New Agents Here')
                ->descriptionIcon('heroicon-s-users', IconPosition::Before)
                ->descriptionColor('danger')
                ->chart([Agent::count(), '2', '5', '8', '1'])
                ->color('success')
                ->url('/admin/agents'),

            Stat::make('All Properties Feature', PropertyFeature::count())
                ->description('All New Properties Feature is Here')
                ->descriptionIcon('heroicon-s-building-office-2', IconPosition::Before)
                ->descriptionColor('danger')
                ->chart([PropertyFeature::count(), '2', '5', '8', '1'])
                ->color('success')
                ->url('/admin/property-features')                ,

            Stat::make('All User', User::count())
                ->description('New login Users')
                ->descriptionIcon('heroicon-s-users', IconPosition::Before)
                ->descriptionColor('primary')
                ->chart([User::count(), '2', '5', '8', '1'])
                ->color('success')
                ->url('/admin/users'),
        ];
    }

    protected function getColumns(): int
    {
        return 3; // Set 3 columns for the widget layout

    }
}
