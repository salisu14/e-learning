<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $student->user->name }} {{ __('Bio Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
                    <form method="POST" action="{{ route('students.update', $student) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- First Column -->
                            <div class="grid grid-cols-2 gap-4">

                                <!-- Student Number -->
                                <div>
                                    <x-input-label for="student_number" :value="__('Student Number')" />
                                    <x-text-input id="student_number" class="block mt-1 w-full" type="text" name="student_number" value="{{ $student->student_number }}" readonly />
                                    <x-input-error :messages="$errors->get('student_number')" class="mt-2" />
                                </div>

                                <!-- Birth Date -->
                                <div>
                                    <x-input-label for="birth_date" :value="__('Birth Date')" />
                                    <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" value="{{ $student->birth_date }}" autofocus autocomplete="birth_date" />
                                    <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                                </div>

                            </div>
                            <!-- Second Column -->
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <!-- Gender -->
                                <div>
                                    <x-input-label for="gender" :value="__('Gender')" />
                                    <select id="gender" name="gender" class="block mt-1 w-full">
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male" {{ $student->gender === 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                        <option value="female" {{ $student->gender === 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ optional($student->user)->email }}" readonly />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Phone Number -->
                                <div>
                                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" value="{{ $student->user->phone_number }}" required autocomplete="phone_number" />
                                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                                </div>

                                <!-- Department -->
                                <div>
                                    <x-input-label for="department_id" :value="__('Department')" />
                                    <select id="department_id" name="department_id" class="block mt-1 w-full">
                                        <option value="" disabled selected>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" {{ $department->id === $student->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                                </div>

                            <div class="flex mt-4">
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






