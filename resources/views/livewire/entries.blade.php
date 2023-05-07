<form wire:submit.prevent="submit" action="/entries" method="POST">
    <div class="flex flex-col" x-data="{ isInstallments: @entangle('isInstallments') }">
        @csrf
        <div class="flex space-x-4 mb-4 justify-start w-96">
            <x-ui.radio @click="isInstallments = false" x-bind:checked="!isInstallments" group="installments">
                Receita/Gastos (a vista)
            </x-ui.radio>
            <x-ui.radio @click="isInstallments = true" x-bind:checked="isInstallments" group="installments">
                Compra parcelada
            </x-ui.radio>
        </div>
        <div class="flex flex-1 space-x-4 mb-4">
            <x-ui.input label="Descrição" wire:model="description"/>
            <x-ui.input label="Valor R$" type="currency" wire:model="amount"/>
            <div class="w-full" x-show="!isInstallments">
                <x-ui.select label="Tipo" wire:model="type">
                    <option>- Selecione uma opção -</option>
                    <option value="inbound">Receita</option>
                    <option value="outbound">Gasto</option>
                </x-ui.select>
            </div>
            <div x-cloak class="w-full" x-show="isInstallments">
                <x-ui.input label="Parcelas (de 2x a 18x)" wire:model="installments" type="number" min="2" max="18"/>
                <input type="hidden" value="outbound"/>
            </div>

            <x-ui.datepicker label="Data" autohide wire:model="activity"/>
            <div class="flex items-end">
                <x-ui.button type="submit">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>
                        <span class="ml-3">Adicionar</span>
                    </div>
                </x-ui.button>
            </div>
        </div>
    </div>
</form>
