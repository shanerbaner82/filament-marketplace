<?php

namespace Shanerbaner82\FilamentMarketplace;

use \Filament\Contracts\Plugin;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Shanerbaner82\FilamentMarketplace\Pages\MarketplacePage;
use Shanerbaner82\FilamentMarketplace\Pages\PluginPage;
use Shanerbaner82\FilamentMarketplace\Resources\PackageResource;

class FilamentMarketplacePlugin implements Plugin
{

    public function getId(): string
    {
        return 'filament-marketplace';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function register(\Filament\Panel $panel): void
    {
        $panel
            ->pages([
                MarketplacePage::class,
                PluginPage::class
            ]);
    }

    public function boot(\Filament\Panel $panel): void
    {

    }
}
