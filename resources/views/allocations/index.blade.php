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
                    <div class="block overflow-x-auto sm:rounded-lg">

                        <x-flash />

                       @foreach($allocations as $allocation)
                         <p>{{ $allocation->course->title }}</p>
                         <p>{{ $allocation->session->name }}</p>
                         <p>{{ $allocation->instructor->user->name }}</p>
                         <hr />
                       @endforeach
                        <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
                            {{ $allocations->links() }}
                        </div>


                    </div>

                    <div class="flex justify-right items-center mt-6">
                        <a href="{{ route('allocations.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
