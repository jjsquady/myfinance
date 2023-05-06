<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-500">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Descrição
                </th>
                <th scope="col" class="px-6 py-3">
                    Valor R$
                </th>
                <th scope="col" class="px-6 py-3">
                    Tipo
                </th>
                <th scope="col" class="px-6 py-3">
                    Data
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Editar</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($entries as $entry)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $entry->description }}
                    </th>
                    <td class="px-6 py-4">
                        {{ number_format($entry->amount/100, 2, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $entry->type == 'inbound' ? 'Receita' : 'Gasto' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $entry->activity_at->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
