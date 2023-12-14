<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Instructor') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 text-gray-900 dark:text-gray-100">

                    <h1 class="text-blue-700 text-center text-2xl font-bold">Instructor: {{ optional($instructor->user)->name }}</h1>


                    @if(! is_null($instructor->allocations))
                    <div class="container mx-auto p-4">
                        @foreach($instructor->allocations as $allocation)
                            <div class="mb-4 p-4 border rounded-md">
                                <h2 class="text-lg font-bold">Session: {{ $allocation->session->name }}</h2>
                                <h3 class="text-md font-semibold">Semester: {{ $allocation->course->semester }}</h3>

                                <ul class="list-disc pl-4 mt-2">
                                    @forelse(optional($allocation->course)->modules ?? [] as $module)
                                        <li>{{ $module->code }}: {{ $module->title }}</li>
                                        <li>{{ $module->unit }}</li>
                                        <li>{{ $module->level }}</li>
                                        <li>{{ $module->semester }}</li>
                                    @empty
                                        <li class="text-gray-500">No modules available</li>
                                    @endforelse
                                </ul>

                            </div>
                        @endforeach
                    </div>
                    @else
                        {{ instructor->name }} has no allocations
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
