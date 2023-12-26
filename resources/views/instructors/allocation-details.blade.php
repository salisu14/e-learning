<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $allocation->instructor->user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
                        <h1 class="mb-2 text-blue-500 text-2xl text-center font-bold">
                            {{ $allocation->course->title }}
                            <x-anchor-link :href="route('lessons.create', $allocation)">
                                <svg class="w-5 h-5 inline mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg> Create Lesson
                            </x-anchor-link>
                        </h1>

                        <h2 class="text-green-500 text-xl mb-3">List of Registered Students</h2>

                        <table class="mt-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        S/N
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Student Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Enrollment Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allocation->course->enrollments as $enrollment)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}.
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ optional($enrollment->student)->user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $enrollment->enrollment_date}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3">
                            <h2 class="text-green-500 text-xl mb-3">Course Lessons</h2>

                            @forelse ($allocation->lessons as $lesson)
                                <div class="mb-2">
                                    <p class="text-lg font-semibold">
                                        {{ $loop->iteration }}. {{ $lesson->title }}
                                        <p class="mt-3 mb-3"><a class="px-4 py-2 bg-green-600 text-white rounded-lg dark:text-white hover:bg-green-900" href="{{ route('learning-materials.create', $lesson) }}">
                                            Add Learning materials
                                        </a></p>
                                    </p>

                                    @if ($lesson->learningMaterials->count() > 0)
                                        <ul class="list-disc list-inside">
                                            @foreach ($lesson->learningMaterials as $material)
                                                <li>
                                                    <a href="{{ route('file.download', ['id' => $material->id]) }}" target="_blank">
                                                        {{ $material->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No learning materials for this lesson.</p>
                                    @endif
                                </div>
                            @empty
                                <p>No lessons for this course.</p>
                            @endforelse
                        </div>

                        <div class="mt-4">
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>