<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto sm:rounded-lg p-6">
                        <form method="POST" action="{{ route('courses.update', $course) }}">
                            @csrf
                            @method('PUT')
                             
                             <!-- Code -->
                             <div>
                                <x-input-label for="code" :value="__('Code')" />
                                <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" value="{{ $course->code }}" required autofocus autocomplete="code" />
                                <x-input-error :messages="$errors->get('code')" class="mt-2" />
                            </div>

                            <!-- Title -->
                            <div class="mt-3">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $course->title }}" required autofocus autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            
                            <!-- Semester -->
                            <div class="mt-3">
                                <x-label for="semester" :value="__('Choose Semester')"/>
                                <select name="semester" id="semester" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                                    @foreach($semesters as $semester)
                                        <option value="{{ $semester->value }}" {{ $semester->value === $course->semester ? 'selected' : '' }}>{{ $semester->label()  }}</option>
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






