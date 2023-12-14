<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bio Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
                        <h1 class="mb-3 font-bold text-start text-blue-700 text-xl">{{ $user->name }}</h1>
                        <ul>
                            <li class="mb-2">Phone Number:  {{ $user->phone_number }}</li>
                            <li class="mb-2">Student Email: {{ $user->email }}</li>
                            <li class="mb-2">Registration Number: {{ $student->student_number ?? '' }}</li>
                            <li class="mb-2">Date of birth: {{ $student->birth_date ?? ''}}</li>
                            <li class="mb-2">Student gender: {{ $student->gender ??  ''}}</li>
                        </ul>
                        <div class="mt-4">
                            <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg dark:text-white hover:bg-green-900">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>