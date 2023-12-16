<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ \Auth::user()->name }} Course Enrollment
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 text-gray-900 dark:text-gray-100">
                    <div class="block overflow-x-auto">
                        <h1 class="text-2xl font-bold mb-4 p-3">Enrolled Courses</h1>

                        <!-- Filters Dropdowns -->
                        <div class="flex mb-4">
                            <form method="GET" action="{{ route('students.enrolled.courses') }}">
                                @csrf

                                <label class="mr-2">Session:</label>
                                <select name="session" id="sessionFilter" class="form-select">
                                    @foreach($sessions as $session)
                                        <option value="{{ $session->id }}">{{ $session->name }}</option>
                                    @endforeach
                                </select>

                                <label class="mx-2">Semester:</label>
                                <select name="semester" id="semesterFilter" class="form-select">
                                    @foreach(\App\Enums\SemesterEnum::cases() as $semester)
                                        <option value="{{ $semester }}">{{ $semester }}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">Search</button>
                            </form>
                        </div>
                        
                    <div class="flex justify-right items-center mt-6">
                        <a href="{{ route('students.enroll.form', ['student' => \Auth::user()->student]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Enrollment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
