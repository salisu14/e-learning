<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 text-gray-900 dark:text-gray-100">
                    <div class="block overflow-x-auto sm:rounded-lg">
                        <h2 class="m-2 text-xl text-center font-extrabold dark:text-white">{{ $course->title }}</h2>
                        <div class="flex justify-center items-center">
                            <div class="divide-y-2 px-3">
                                <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Course Code: {{ $course->code }}</p>
                                <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Course Title: {{ $course->title }}</p>
                                <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Course Type: {{ $course->type }}</p>
                                <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Credit Unit: {{ $course->unit }}</p>
                                <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Level: {{ Str::ucfirst($course->level) }} Hundred</p>
                            </div>
                            <div class="divide-y-2 px-3">
                                <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Semester: {{ Str::ucfirst($course->semester) }} Semester</p>
                                <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Status: {{ Str::ucfirst($course->status) }}</p>
                                <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Department: {{ Str::ucfirst($course->department->name) }}</p>
                                <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Date created: {{ $course->created_at }}</p>
                                <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Date updated: {{ $course->updated_at }}</p>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-2xl text-blue-700 text-left mb-2">Enrollments</h2>
                            @if($course->enrollments->count() > 0)
                            <ul>
                                <h3 class="text-xl text-green-700 text-left mb-2">Students</h3>
                                @foreach($course->enrollments as $enrollment)
                                    <li>Student {{ $loop->iteration }}: {{ $enrollment->user->name ?? '' }}</li>
                                    <li>Enrollment Date: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $enrollment->enrollment_date)->toRfc7231String()  }}</li>
                                    <div class="py-2"></div>
                                @endforeach
                            </ul>
                            @else
                            <p class="mb-3 mt-3 text-xl font-semibold text-red-500 dark:text-red-400">No enrollment(s) for this course</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex justify-right items-center mt-6">
                        <a href="{{ route('courses.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
