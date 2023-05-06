<div class="pt-6 mb-6 grid grid-cols-4 gap-4">
    <x-ui.card>
        <div class="flex flex-col space-y-1">
            <span class="text-gray-300 font-bold text-sm">Receitas (total):</span>
            <span class="text-green-400 text-4xl font-extrabold">
                R$ {{ $totalIncome }}
            </span>
        </div>
    </x-ui.card>
    <x-ui.card>
        <div class="flex flex-col space-y-1">
            <span class="text-gray-300 font-bold text-sm">Gastos (total):</span>
            <span class="text-red-500 text-4xl font-extrabold">
                R$ {{ $totalOutcome }}
            </span>
        </div>
    </x-ui.card>
    <x-ui.card>
        <div class="flex flex-col space-y-1">
            <span class="text-gray-300 font-bold text-sm">Percentual de gastos x receitas:</span>
            <span class="text-blue-400 text-4xl font-extrabold">
                {{ $inoutPercent }} %
            </span>
        </div>
    </x-ui.card>
    <x-ui.card>
        <div class="flex flex-col space-y-1">
            <span class="text-gray-300 font-bold text-sm">Mês/Ano:</span>
            <livewire:month-filter />
        </div>
    </x-ui.card>
</div>
