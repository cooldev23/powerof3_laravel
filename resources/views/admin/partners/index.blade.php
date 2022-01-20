<x-layout>
    <x-card-header class="bg-gray-100 border">
        <a href="{{ route('admin.partners.create') }}" class="btn bg-blue-500 hover:bg-blue-700 rounded-sm text-white font-bold p-2 text-sm shadow"><i class="fa fa-plus" aria-hidden="true"></i> Add Partner</a>
    </x-card-header>  
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200">
                    <x-card-body class="bg-white">
                    @foreach ($partners as $partner)
                        @if ($loop->first)
                            <table class="stripe min-w-full divide-y divide-gray-200 datatables">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider disable-sorting">Options</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Business Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Contact
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date Created
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
                                                <x-dropdown-link href="{{ route('admin.partners.edit', array($partner)) }}">
                                                    <i class="fa-fw fa fa-edit"></i> Edit
                                                </x-dropdown-link>
                                                <x-dropdown-link href="{{ route('admin.partners.show', array($partner)) }}">
                                                    <i class="fa-fw fa fa-eye"></i> View
                                                </x-dropdown-link>
                                            </x-dropdown>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center whitespace-nowrap h-10">
                                                <p>{{ ucfirst($partner->type->type) }}</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $partner->business_name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $partner->contact_name }}<br>
                                            @if ($partner->contact_title)
                                                {{ $partner->contact_title }}<br>
                                            @endif
                                            {{ $partner->contact_email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $partner->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $partner->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" data-order="{{ strtotime($partner->created_at) }}">
                                            {{ date('F jS, Y', strtotime($partner->created_at)) }}
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