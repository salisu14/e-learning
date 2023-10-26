<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lesson') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 text-gray-900 dark:text-gray-100">
                    <div class="block overflow-x-auto sm:rounded-lg">
                        <h2 class="m-2 text-xl text-center font-extrabold dark:text-white">{{ $lesson->title }}</h2>
                        <div class="divide-y-2 px-3 py-5">
                            <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">content: {{ $lesson->course->name }}
                            <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">order: {{ $order->lesson }}
                            <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Date created: {{ $course->created_at }}
                            <p class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Date updated: {{ $course->updated_at }}
                        </div>
                    </div>

                    <div class="flex justify-right items-center mt-6">
                        <a href="{{ route('lessons.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
