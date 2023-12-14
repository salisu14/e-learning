<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Instructor Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
                        <form method="POST" action="{{ route('instructors.update', $instructor) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- First Column -->
                            <div class="grid grid-cols-2 gap-4">

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $instructor->name }}" readonly autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Specialization -->
                                <div>
                                    <x-input-label for="specialization" :value="__('Specialization')" />
                                    <x-text-input id="specialization" class="block mt-1 w-full" type="text" name="specialization" :value="old('specialization')" autofocus autocomplete="specialization" />
                                    <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div>
                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-text-input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                
                                <!-- Qualification -->
                                <div>
                                    <x-input-label for="qualification" :value="__('Qualification')" />
                                    <x-text-input id="qualification" class="block mt-1 w-full" type="text" name="qualification" :value="old('qualification')" autofocus autocomplete="qualification" />
                                    <x-input-error :messages="$errors->get('qualification')" class="mt-2" />
                                </div>

                                <!-- Rank -->
                                <div>
                                    <x-input-label for="rank" :value="__('Rank')" />
                                    <x-text-input id="rank" class="block mt-1 w-full" type="text" name="rank" :value="old('rank')" autofocus autocomplete="rank" />
                                    <x-input-error :messages="$errors->get('rank')" class="mt-2" />
                                </div>

                                <!-- Staff Number -->
                                <div>
                                    <x-input-label for="staff_number" :value="__('Staff Number')" />
                                    <x-text-input id="staff_number" class="block mt-1 w-full" type="text" name="staff_number" :value="old('staff_number')" required autocomplete="staff_number" />
                                    <x-input-error :messages="$errors->get('staff_number')" class="mt-2" />
                                </div>

                                 <!-- Birth Date -->
                                 <div>
                                    <x-input-label for="birth_date" :value="__('Birth Date')" />
                                    <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" autofocus autocomplete="birth_date" />
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
                                        <option value="male">{{ __('Male') }}</option>
                                        <option value="female">{{ __('Female') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $instructor->email }}" readonly />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Phone Number -->
                                <div>
                                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" value="{{ $instructor->phone_number }}" required autocomplete="phone_number" />
                                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                                </div>

                                <!-- Department -->
                                <div>
                                    <x-input-label for="department_id" :value="__('Department')" />
                                    <select id="department_id" name="department_id" class="block mt-1 w-full">
                                        <option value="" disabled selected>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                                </div>

                                <!-- Photo -->
                                <div>
                                    <x-input-label for="photo" :value="__('Photo')" />
                                    <input id="photo" class="block mt-1 w-full" type="file" name="photo" value="old('photo')" accept="image/*" required />
                                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                </div>
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






