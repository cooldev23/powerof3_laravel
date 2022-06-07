@props(['maxWidth' => 'max-w-7xl'])

<div class="container {{ $maxWidth }} mx-auto px-4 sm:px-6 lg:px-10">
    {{ $slot }}
</div>