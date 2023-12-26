<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $course->title }} {{ __('Lessons') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 text-gray-900 dark:text-gray-100">
                    <div class="block overflow-x-auto sm:rounded-lg">
                        <div class="mt-3">
                            <h2 class="text-green-500 text-xl mb-3">Course Lessons</h2>

                            @forelse ($course->lessons as $lesson)
                                <div class="mb-2">
                                    <p class="text-lg font-semibold">
                                        {{ $loop->iteration }}. {{ $lesson->title }}
                                    </p>

                                    @if ($lesson->learningMaterials->count() > 0)
                                        <ul class="list-disc list-inside">
                                            @foreach ($lesson->learningMaterials as $material)
                                                <li>
                                                    <a href="{{ route('file.download', ['id' => $material->id]) }}" target="_blank">
                                                        {{ $material->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No learning materials for this lesson.</p>
                                    @endif
                                </div>
                            @empty
                                <p>No lessons for this course.</p>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>