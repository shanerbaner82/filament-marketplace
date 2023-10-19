<?php

namespace Shanerbaner82\FilamentMarketplace\Pages;

use Composer\Console\Application;
use Composer\Json\JsonValidationException;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Url;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PluginPage extends Page
{
    protected static ?string $title = "Marketplace";

    protected static string $view = 'filament-marketplace::plugin';

    protected static null|string $slug = 'plugin';
    protected static bool $shouldRegisterNavigation = false;

    #[Url(keep:true)]
    public $plugin = '';

    public array $package = [];

    public function mount()
    {
        $this->package = Http::get('https://filamentphp.com/api/plugins/' . $this->plugin)->json();
    }

    public function isInstalled($package)
    {
        $application = $this->getApplication();
        $installed = $application->getComposer()->getPackage()->getRequires();

        return (collect($installed)->keys()->contains(str($package)->lower()));
    }

    public function installPackage(string $package)
    {
        $application = $this->getApplication();

        $input = new ArrayInput([
            'command' => 'require',
            'packages' => [$package]
        ]);

        dd($application->run($input));
    }

    public function unInstallPackage(string $package)
    {
        $application = $this->getApplication();

        $input = new ArrayInput([
            'command' => 'remove',
            'packages' => [$package]
        ]);

        dd($application->run($input));
    }

    public function getApplication()
    {
        chdir(base_path());
        putenv('COMPOSER_HOME=' . base_path() . '/vendor/bin/composer');
        putenv('COMPOSER=' . base_path() . '/composer.json');

        return new Application();
    }
}
