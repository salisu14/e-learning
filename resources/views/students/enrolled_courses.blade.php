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
                        @if($enrollments->isEmpty())
                            <p>No enrolled courses found.</p>
                        @else
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Course</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Code</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Unit</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Level</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Type</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Semester</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($enrollments as $enrollment)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->course->title }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->course->code }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->course->unit }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $enrollment->course->level }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $enrollment->course->type }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $enrollment->course->semester }} semester</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
