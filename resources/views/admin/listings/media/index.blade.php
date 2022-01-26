<x-layout>
    <x-card-header class="bg-gray-100 border">
        <a href="{{ route('admin.listing-media.create') }}" class="btn bg-blue-500 hover:bg-blue-700 rounded-sm text-white font-bold p-2 text-sm shadow"><i class="fa fa-plus" aria-hidden="true"></i> Add Media</a>
    </x-card-header>  
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200">
                    <x-card-body class="bg-white">
                    @foreach ($listingMedia as $lm)
                        @if ($loop->first)
                            <table class="stripe min-w-full divide-y divide-gray-200 datatables">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider disable-sorting">Options</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Listing
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Last Modified
                                        </th>
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
                                                <x-dropdown-link href="{{ route('admin.listing-media.edit', array($lm)) }}">
                                                    <i class="fa-fw fa fa-edit"></i> Edit
                                                </x-dropdown-link>
                                                <x-dropdown-link href="{{ route('admin.listing-media.show', array($lm)) }}">
                                                    <i class="fa-fw fa fa-eye"></i> View
                                                </x-dropdown-link>
                                            </x-dropdown>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $lm->media_path }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $lm->listing->address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ ucfirst($lm->type) }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if ($lm->is_featured)
                                                <span class="px-2 mr-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $lm->is_featured ? 'Featured' : '' }}</span>
                                            @endif
                                            @if ($lm->is_active)
                                                <span class="px-2 mr-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $lm->is_active ? 'Active' : ''}}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $lm->updated_at }}
                                        </td>
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