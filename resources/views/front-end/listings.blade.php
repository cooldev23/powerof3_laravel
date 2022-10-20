<x-layout>
    <x-container>
        <div class="flex justify-between items-center border-b border-primary-accent">
            <h2 class="pt-4 text-2xl">Our Current Listings</h2>
            <a role="button" href="{{ route('front-end.search-listing') }}" class="inline-flex items-center rounded border border-gray-400 bg-white px-2.5 py-1.5 text-sm font-medium leading-4 text-indigo-400 shadow-md hover:shadow-none hover:text-primary-accent hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Search All Listings</a>
        </div>
        <div class="py-4 grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($listings as $listing)
                <div>
                    <x-card-body class="border bg-white shadow">
                        <div class="pb-3 border-b">
                            <img src="{{ asset('storage/images/listing-images/' . $listing->image_path) }}" alt="Drawstring top with elastic loop closure and textured interior padding." class="pt-3 w-full h-56 object-center object-cover">
                        </div>
                        <div>
                            <div class="flow-root">
                                <ul role="list" class="divide-y divide-gray-200">
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
                            <div class="my-4">
                                <a href="{{ route('front-end.show-listing', $listing) }}" class="flex w-full items-center justify-center rounded-md border border-primary-color bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow hover:bg-gray-100">View more</a>
                            </div>
                        </div>
                    </x-card-body>
                </div>
            @endforeach
        </div>
        <h2 class="pt-4 text-2xl border-b border-primary-accent">Previously Sold</h2>
        <div class="py-4 grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($previousSales as $pvs)
                <div>
                    <x-card-body class="border bg-white shadow">
                        <div class="pb-3 border-b">
                            <img src="{{ asset('storage/images/listing-images/' . $pvs->image_path) }}" alt="Drawstring top with elastic loop closure and textured interior padding." class="pt-3 w-full h-56 object-center object-cover">
                        </div>
                        <div>
                            <div class="flow-root">
                                <ul role="list" class="divide-y divide-gray-200">
                                    <li class="py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="min-w-0 flex-1">
                                                <p class="truncate text-lg font-medium text-gray-900">Broker: {{ $pvs->broker->fullName }}</p>
                                                <p class="truncate text-lg font-medium text-gray-900">Sold Price: {{ $pvs->sold_price }}</p>
                                                <p class="truncate text-lg text-gray-500">{{ $pvs->address }}</p>
                                                <p class="truncate text-lg text-gray-500">{{ $pvs->city }}, {{ $pvs->zip }}</p>
                                                @if ($pvs->acres)
                                                    <p class="truncate text-sm text-gray-500">Acres: {{ $pvs->acres }}</p>
                                                @else
                                                    <p class="truncate text-sm text-gray-500">Beds: {{ $pvs->bedrooms }} - Baths: {{ $pvs->bathrooms }}</p>
                                                @endif
                                                <p class="truncate text-sm text-gray-500">Represented: {{ $pvs->represented }}</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </x-card-body>
                </div>
            @endforeach
        </div>
    </x-container>
    
</x-layout>