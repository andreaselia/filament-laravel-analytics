<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg sm:text-xl font-bold tracking-tight">
            Devices
        </h2>

        <div class="px-4 sm:px-6 py-3 flex justify-between bg-gray-50 border-t border-b border-gray-200 text-xs font-medium leading-4 tracking-wider text-gray-600 uppercase">
            <div>Type</div>
            <div>Users</div>
        </div>

        <div class="divide-y divide-gray-200 max-h-64 overflow-y-auto">
            @foreach ($items as $item)
                <div class="px-4 sm:px-6 py-3 flex justify-between hover:bg-gray-50">
                    <div class="pr-5 text-sm leading-5 text-gray-800 truncate">{{ $item->type }}</div>
                    <div class="text-sm leading-5 text-gray-600">{{ $item->users }}</div>
                </div>
            @endforeach
        </div>
    </x-filament::card>
</x-filament::widget>
