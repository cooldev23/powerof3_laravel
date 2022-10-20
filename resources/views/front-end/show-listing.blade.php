<x-layout>
    <x-container>
        <x-card-body class="my-4 mx-auto border border-gray-300 bg-white shadow-md max-w-4xl">
            <div class="grid grid-cols-2 gap-2 border-b">
                <div class="pb-3 flex justify-center items-center">
                    <img src="{{ asset('storage/images/listing-images/' . $listing->image_path) }}" alt="Drawstring top with elastic loop closure and textured interior padding." class="pt-3 w-96 h-60 object-center object-cover mx-auto">
                </div>
                <div class="pb-3 flex items-center">
                    <ul role="list" class="py-10 pl-8 divide-y divide-gray-200 border-l border-gray-200">
                        <li class="pt-4 pb-1">
                            <div class="flex items-center space-x-4">
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-lg font-medium text-gray-900">{{ $listing->price }}</p>
                                    <p class="truncate text-lg text-gray-500">{{ $listing->address }}</p>
                                    <p class="truncate text-lg text-gray-500">{{ $listing->city }}, {{ $listing->zip }}</p>
                                    @if ($listing->acres)
                                        <p class="truncate text-sm text-gray-500">{{ $listing->acres }} acres</p>
                                    @else
                                        <p class="truncate text-sm text-gray-500">Beds: {{ $listing->bedrooms }} - Baths: {{ $listing->bathrooms }}</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> 
        </x-card-body>   
    </x-container>
</x-layout>