<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    @if(session('errors'))
        <p class="text-red-500 text-center font-semibold text-xl p-4">{{ session('errors') }}</p>
    @endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 text-gray-900 dark:text-gray-100">
                    <div class="block overflow-x-auto shadow-md sm:rounded-lg">

                        <table class="min-w-full leading-normal table-auto md:table-fixed">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        S/N
                                    </th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Name
                                    </th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Email
                                    </th>

                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Role(s)
                                    </th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Phone Number
                                    </th>

                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}.</p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <a class="hover:underline" href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                                        </p>
                                    </td>

                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->email  }}</p>
                                    </td>

                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap capitalize">{{ implode(', ', $user->roles->pluck('name')->toArray() )  }}</p>
                                    </td>

                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->phone_number ?? 'not available'  }}</p>
                                    </td>

                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        @can('user_show')
                                        <a href="{{ route('users.show', $user) }}">
                                            <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        @endcan

                                        @can('user_edit')
                                        <a class="" href="{{ route('users.edit', $user) }}">
                                           Edit
                                        </a>
                                        @endcan

                                        @can('user_delete')
                                        <form method="post" action="{{ route('users.destroy', $user) }}" class="p-6 inline">
                                            @csrf
                                            @method('delete')

                                            <div class="ml-2 inline">
                                                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                                                <x-danger-button class="ml-3">
                                                    {{ __('Delete') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
                            {{ $users->links() }}
                        </div>

                        <div class="flex justify-end m-2">
                            @can('role_access')
                            <x-anchor-link  :href="route('roles.index')" class="mr-1">
                            <svg class="w-5 h-5 inline mr-1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg> Manage Role
                            </x-anchor-link>
                            @endcan

                            @can('permission_access')
                            <x-anchor-link href="#" class="mr-1">
                                <svg class="w-5 h-5 inline mr-1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>Manage Permission
                            </x-anchor-link>
                            @endcan

                            @can('user_create')
                            <x-anchor-link :href="route('users.create')">
                                <svg class="w-5 h-5 inline mr-1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg> Add New
                            </x-anchor-link>
                            @endcan
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>