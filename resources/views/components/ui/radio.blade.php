@props([
    'label' => '',
    'group' => '',
    'class' => 'w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600',
    'labelClass' => 'block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300',
    'active' => false
])
<div class="flex items-center w-full">
    <input
           type="radio"
           {{ $attributes->merge(['class' => $class]) }}
           @if($active)
               checked
           @endif
    >
    <label {{ $attributes->merge(['class' => $labelClass]) }}>
        {{ $slot }}
    </label>
</div>
