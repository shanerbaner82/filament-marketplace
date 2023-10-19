<x-filament-panels::page>
    <div class="filament-marketplace">
        <ul role="list"
            class="filament-marketplace mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach($packages as $package)
                <li class="bg-gray-900 p-4 rounded-xl">
                    <img class=" w-full rounded-xl object-cover"
                         src="https://filamentphp.com/images/content/plugins/images/{{$package['image']}}"
                         alt="">
                    <h3 class="mt-2 text-lg font-bold leading-8 tracking-tight text-gray-900 dark:text-gray-100">{{$package['name']}}</h3>
                    <p class="text-sm leading-7 text-gray-200">{{$package['description']}}</p>
                    <div class="mt-2">
                        @if(!$this->isInstalled($package['github_repository']))
                            <button class="bg-primary-500 rounded-full px-2 py-1"
                                    wire:click="installPackage('{{$package['github_repository']}}')">1-Click Install
                            </button>
                        @else
                            <button class="bg-primary-500 rounded-full px-2 py-1"
                                    wire:click="unInstallPackage('{{$package['github_repository']}}')">Uninstall Package
                            </button>
                        @endif
                            <a href="{{route('filament.admin.pages.plugin', ['plugin' => $package['slug']])}}" class="bg-primary-500 rounded-full px-2 py-1" >More Details </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-filament-panels::page>
