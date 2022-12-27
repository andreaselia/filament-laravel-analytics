<x-filament::widget>
    <x-filament::stats :columns="$this->getColumns()">
        @foreach ($this->getCachedCards() as $card)
            @php
                $heading = $card->getLabel();
                $filters = $this->getFilters();
                $data = $card->getValue()
            @endphp

            <x-filament::card>
                @if($heading || $filters)
                    <div class="flex items-center justify-between gap-8">
                        @if ($heading)
                            <x-filament::card.heading>
                                {{ __($heading) }}
                            </x-filament::card.heading>
                        @endif

                        @if ($filters)
                            <select
                                wire:model="filter"
                                @class([
                                    'text-gray-900 border-gray-300 block h-10 transition duration-75 rounded-lg shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500',
                                    'dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:focus:border-primary-500' => config('filament.dark_mode'),
                                ])
                                wire:loading.class="animate-pulse"
                            >
                                @foreach ($filters as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                @endif

                <div>
                    <div class="px-4 sm:px-6 py-2 flex justify-between rounded-md text-xs font-medium leading-4 tracking-wider
                    uppercase text-white bg-primary-500">
                        @foreach ($data['heading'] as $heading)
                            <div>{{ __($heading) }}</div>
                        @endforeach
                    </div>

                    <div class="mt-1 divide-y divide-gray-200 max-h-64 overflow-y-auto">
                        @foreach ($data['items'] as $item)
                            <div class="px-4 sm:px-6 py-2 flex justify-between">
                                <div class="pr-5 text-sm leading-5 text-gray-800 truncate dark:text-white">{{ $item->{$data['field']} }}</div>
                                <div class="text-sm leading-5 text-gray-600 dark:text-white">{{ $item->users }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </x-filament::card>
        @endforeach
    </x-filament::stats>
</x-filament::widget>
