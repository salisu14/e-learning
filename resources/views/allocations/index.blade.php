<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Allocations') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 text-gray-900 dark:text-gray-100">

                <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg overflow-hidden">
                    <x-flash />

                    @forelse($allocations->groupBy('session_id') as $sessionId => $sessionAllocations)
                        <div class="mb-6">
                            <h2 class="text-xl font-bold mb-2">{{ $sessionAllocations->first()->session->name }}</h2>
                            
                            <div class="overflow-x-auto">
                                <table class="min-w-full border border-gray-300">
                                    <thead>
                                        <tr>
                                            <th class="border-b py-2 px-4 bg-gray-100">S/N</th>
                                            <th class="border-b py-2 px-4 bg-gray-100">Instructor</th>
                                            <th class="border-b py-2 px-4 bg-gray-100">Course Code</th>
                                            <th class="border-b py-2 px-4 bg-gray-100">Course Title</th>
                                            <th class="border-b py-2 px-4 bg-gray-100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sessionAllocations as $allocation)
                                            <tr>
                                                <td class="border-b py-2 px-4">{{ $loop->iteration }}.</td>
                                                <td class="border-b py-2 px-4">{{ $allocation->instructor->user->name }}</td>
                                                <td class="border-b py-2 px-4">{{ $allocation->course->code }}</td>
                                                <td class="border-b py-2 px-4">{{ $allocation->course->title }}</td>
                                                <td class="border-b py-2 px-4">
                                                    <a href="{{ route('allocations.edit', $allocation) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg dark:text-white hover:bg-green-900">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-red-500">No enrollments found.</p>
                    @endforelse

                    <div class="flex justify-right items-center mt-6">
                        <a href="{{ route('allocations.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
