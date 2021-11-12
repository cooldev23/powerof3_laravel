<x-layout>
    @foreach ($listings as $listing)
        {{ $listing->address }}
    @endforeach
</x-layout>