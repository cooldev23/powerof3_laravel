<x-layout>
    <x-card-header class="bg-gray-100 border">
        <a href="{{ route('admin.listings.create') }}" class="btn bg-blue-500 hover:bg-blue-700 rounded-sm text-white font-bold p-2 text-sm shadow"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a>
    </x-card-header>  
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200">
                    <x-card-body class="bg-white">
                    @foreach ($listings as $listing)
                        @if ($loop->first)
                            <table class="stripe min-w-full divide-y divide-gray-200 datatables">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider disable-sorting">Options</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Address
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Broker
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Details
                                        </th>
                                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                        @endif
                                    <tr>
                                        <td scope="col" class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <x-dropdown align="left">
                                                <x-slot name="trigger" class="cursor-pointer">
                                                    <div class="z-0 flex">Options <x-dropdown-svg-icon></x-dropdown-svg-icon></div>
                                                </x-slot>
                                                <x-dropdown-link href="{{ route('admin.listings.edit', array($listing)) }}">
                                                    <i class="fa-fw fa fa-edit"></i> Edit
                                                </x-dropdown-link>
                                                <x-dropdown-link href="{{ route('admin.listings.show', array($listing)) }}">
                                                    <i class="fa-fw fa fa-eye"></i> View
                                                </x-dropdown-link>
                                            </x-dropdown>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center whitespace-normal h-10">
                                                <p>{{ ucfirst($listing->address) }} {{ $listing->city }}, {{ $listing->zip }}</p>
                                            </div>
                                            <div class="flex">
                                                @if ($listing->is_featured)
                                                    <span class="px-2 mr-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $listing->is_featured ? 'Featured' : '' }}</span>
                                                @endif
                                                
                                                @if ($listing->is_active)
                                                    <span class="px-2 mr-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $listing->is_active ? 'Active' : ''}}</span>
                                                @endif
                                                
                                                @if ($listing->date_sold)
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Sold: {{ date('F jS, Y', strtotime($listing->date_sold )) }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $listing->broker->first_name }} {{ $listing->broker->last_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            
                                            {{ ucfirst($listing->type->type) }}<br>
                                            @if ($listing->acres)
                                                Acres: {{ $listing->acres }}<br>
                                            @else
                                                Beds: {{ $listing->bedrooms }} / Baths: {{ $listing->bathrooms }}<br>
                                            @endif
                                            &dollar;{{ $listing->price }}
                                        </td>
                                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex flex-col">
                                            @if ($listing->is_featured)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $listing->is_featured ? 'Featured' : '' }}</span>
                                            @endif
                                            
                                            @if ($listing->is_active)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $listing->is_active ? 'Active' : ''}}</span>
                                            @endif
                                            
                                            @if ($listing->date_sold)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ date('F jS, Y', strtotime($listing->date_sold )) }}</span>
                                            @endif
                                            
                                        </td> --}}
                                        </tr>
                        @if ($loop->last)
                                </tbody>
                            </table>
                        @endif
                    @endforeach
                    </x-card-body>
                </div>
            </div>
        </div>
    </div>

@push('styles')
<style>
    .table th,
    .table td {
        vertical-align: middle !important;
    }
</style>
@endpush
</x-layout>