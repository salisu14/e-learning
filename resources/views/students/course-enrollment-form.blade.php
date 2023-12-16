<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $student->user->name }} Enrollment for {{ $session->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
                        <form method="POST" action="{{ route('students.enroll', $student) }}">
                            @csrf
                            

                            <!-- Courses -->
                            <div>
                                <x-label for="courses" :value="__('Choose Courses')"/>
                                <div class="grid grid-cols-3 gap-4">
                                    @foreach($courses as $course)
                                        <div>
                                            <input type="checkbox" name="courses[]" value="{{ $course->id }}" id="course_{{ $course->id }}">
                                            <label for="course_{{ $course->id }}">{{ $course->title }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex items-center justify-start mt-4">
                                <x-primary-button>
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
