<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Enrollment') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
                        <form method="POST" action="{{ route('enrollments.store') }}">
                            @csrf

                            <!-- Student -->
                            <div class="">
                                <x-label for="user" :value="__('Choose Student')"/>
                                <select name="user_id" id="user" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name  }}</option>
                                @endforeach
                                </select>
                            </div>

                            <!-- Course -->
                            <div class="mt-3">
                                <x-label for="course" :value="__('Choose Course')"/>
                                <select name="course_id" id="course" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title  }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






