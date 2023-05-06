<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Minhas finanças') }}
        </h2>
    </x-slot>

    <x-ui.container>
        <livewire:summary-info @filterList="updateInfo" />
    </x-ui.container>

    <x-ui.container>
        <x-ui.card>
            <div class="flex flex-col space-y-4">
                <livewire:entries/>
                <livewire:entry-list @filterList="updateList"/>
            </div>
        </x-ui.card>
    </x-ui.container>
</x-app-layout>
