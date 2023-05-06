@props([
    'label' => '',
    'type' => 'text',
    'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'
])

<div class="w-full">
    @if($label != "")
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    @endif
    <input
        @if($type != "currency")
            type="{{ $type }}"
        @else
            x-data
            type="text"
            x-mask:dynamic="$money($input, ',')"
        @endif
        {{ $attributes->merge(['class' => $class]) }}
    >
</div>
