<x-filament-panels::page>
    <div class="filament-marketplace flex items-start justify-between">
{{--        @dd($package)--}}
        @php
            $contents = file_get_contents($package['docs_url'])
        @endphp
        <div class="prose dark:prose-invert">
            {!! str($contents)->markdown() !!}
        </div>
        <div>
            @if(!$this->isInstalled($package['github_repository']))
                <button class="bg-primary-500 rounded-full px-2 py-1"
                        wire:click="installPackage('{{$package['github_repository']}}')">1-Click Install
                </button>
            @else
                <button class="bg-primary-500 rounded-full px-2 py-1"
                        wire:click="unInstallPackage('{{$package['github_repository']}}')">Uninstall Package
                </button>
            @endif
        </div>
    </div>
</x-filament-panels::page>
