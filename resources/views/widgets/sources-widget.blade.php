<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg sm:text-xl font-bold tracking-tight">
            Sources
        </h2>

        <div>
            <div class="px-4 sm:px-6 py-2 flex justify-between bg-gray-50 rounded-md text-xs font-medium leading-4 tracking-wider text-gray-600 uppercase">
                <div>Page</div>
                <div>Users</div>
            </div>

            <div class="mt-1 divide-y divide-gray-200 max-h-64 overflow-y-auto">
                @foreach ($items as $item)
                    <div class="px-4 sm:px-6 py-2 rounded-md flex justify-between hover:bg-gray-50">
                        <div class="pr-5 text-sm leading-5 text-gray-800 truncate">
                            <div class="flex items-center">
                                <img class="w-4 h-4 mr-3" src="https://www.google.com/s2/favicons?domain={{ urlencode($item->page) }}" alt="" />

                                <a href="{{ $item->page }}" target="_blank" class="hover:underline">
                                    {{ $item->page }}
                                </a>
                            </div>
                        </div>
                        <div class="text-sm leading-5 text-gray-600">{{ $item->users }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
