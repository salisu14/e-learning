<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ \Auth::user()->name }} Course Enrollment
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 text-gray-900 dark:text-gray-100">
                    <div class="block overflow-x-auto">
                        <h1 class="text-2xl font-bold mb-4 p-3">Enrolled Courses</h1>
                        @if(count($enrollments) > 0)
                            <ul>
                                @foreach($enrollments as $enrollment)
                                    <li class="mb-4">
                                        <h3 class="text-lg font-semibold">{{ $enrollment->course->title }}</h3>
                                        <p class="text-gray-600">{{ $enrollment->course->code }}</p>
                                        <p class="text-gray-600">{{ $enrollment->course->unit }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No courses enrolled for the selected session.</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
