@props([
    'type' => 'success',
    'colors' => [
        'success' => 'text-green-800 bg-green-200 border-green-500',
        'error' => 'text-red-800 bg-red-200 border-red-500',
        'warning' => 'bg-yellow-400 border-yellow-500',
    ]
])

<div x-data="{ isOpen: true }" x-show="isOpen" class="border px-4 py-3 rounded relative container mx-auto mb-3 {{ $colors[$type] }} " role="alert">
    <span class="block sm:inline">{{ $slot }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click=" isOpen = false ">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>