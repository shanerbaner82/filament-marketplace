<?php

namespace Shanerbaner82\FilamentMarketplace;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;

class FilamentMarketplaceServiceProvider extends \Spatie\LaravelPackageTools\PackageServiceProvider
{
    public function configurePackage(\Spatie\LaravelPackageTools\Package $package): void
    {
        $package
            ->name('filament-marketplace')
            ->hasViews();
    }

    public function packageBooted()
    {
        FilamentAsset::register([
            Css::make('marketplace', __DIR__ . '/../dist/filament-marketplace.css'),
        ], 'Shanerbaner82/filament-marketplace');
    }
}
