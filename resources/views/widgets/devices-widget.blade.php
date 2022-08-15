<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg sm:text-xl font-bold tracking-tight">
            Devices
        </h2>

        <div class="divide-y divide-dashed dark:divide-gray-700">
            @foreach ($items as $item)
               <div class="px-4 py-3 filament-tables-text-column">
                    @json($item)
                </div>
            @endforeach
        </div>
    </x-filament::card>
</x-filament::widget>
