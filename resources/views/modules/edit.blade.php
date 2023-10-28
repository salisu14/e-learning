<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
                        <form method="POST" action="{{ route('courses.store') }}">
                            @csrf

                            <!-- Title -->
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Description -->
                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="description" type="text" name="description" :value="old('descrption')"></textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <!-- Course -->
                            <div class="mt-3">
                                <x-label for="modules" :value="__('Choose Module')"/>
                                <select name="course_id" id="course" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                                @foreach($modules as $module)
                                    <option value="{{ $module->id }}">{{ $module->name  }}</option>
                                @endforeach
                                </select>
                            </div>
                            <!-- Instructor -->
                            <div class="mt-3">
                                <x-label for="instructor" :value="__('Choose Instructor')"/>
                                <select name="instructor_id" id="instructor" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                                @foreach($courses as $course)
                                    <option value="{{ $module->id }}">{{ $module->name  }}</option>
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






