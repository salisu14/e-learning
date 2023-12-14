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
                        <h1 class="mb-2 text-blue-500 text-2xl text-center font-bold">{{ $allocation->course->title }}</h1>

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
                                    <th scope="col" class="px-6 py-3">
                                        Action
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
                                        {{ $enrollment->user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $enrollment->enrollment_date}}
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                        <a href="{{ route('users.show', $enrollment->user) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            <x-anchor-link :href="route('lessons.create')">
                                <svg class="w-5 h-5 inline mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg> Create Lesson
                            </x-anchor-link>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>