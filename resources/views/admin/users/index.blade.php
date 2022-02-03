<x-layout>
    <x-card-header class="bg-gray-100 border">
        <a href="{{ route('admin.users.create') }}" class="btn bg-blue-500 hover:bg-blue-700 rounded-sm text-white font-bold p-2 text-sm shadow"><i class="fa fa-plus" aria-hidden="true"></i> Add User</a>
    </x-card-header>  
    <div class="flex flex-col">
        <div class="-my-2 sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow border-b border-gray-200">
                    <x-card-body class="bg-white">
                    @foreach ($users as $user)
                        @if ($loop->first)
                            <table class="stripe min-w-full divide-y divide-gray-200 datatables">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider disable-sorting">Options</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Role
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
                                                <x-dropdown-link href="{{ route('admin.users.edit', array($user)) }}">
                                                    <i class="fa-fw fa fa-edit"></i> Edit
                                                </x-dropdown-link>
                                                <x-dropdown-link href="{{ route('admin.users.show', array($user)) }}">
                                                    <i class="fa-fw fa fa-eye"></i> View
                                                </x-dropdown-link>
                                            </x-dropdown>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center whitespace-nowrap h-10">
                                                <p>{{ ucfirst($user->name) }}</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @foreach ($user->roles as $role)
                                                @if ($role->name = 'Super Admin')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ $role->name }}</span>
                                                    @elseif ($role->name = 'Admin')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $role->name }}</span>
                                                    @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $role->name }}</span>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" data-order="{{ strtotime($user->created_at) }}">
                                            {{ date('F jS, Y', strtotime($user->created_at)) }}
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