<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Learning Materials') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('learning-materials.store') }}" class="max-w-md mx-auto mt-8 p-6 bg-white rounded-lg shadow-lg">
                            @csrf

                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                                <input type="text" name="title" id="title" required class="w-full border rounded px-3 py-2">
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                                <textarea name="description" id="description" class="w-full border rounded px-3 py-2"></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="type" class="block text-gray-700 font-bold mb-2">Type:</label>
                                <select name="type" id="type" class="w-full border rounded px-3 py-2">
                                    <option value="video">Video</option>
                                    <option value="file">File</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="documents[]" class="block text-gray-700 font-bold mb-2">Upload Documents:</label>
                                <input type="file" name="documents[]" id="documents" accept=".doc, .docx, .ppt, .pptx, .pdf" class="border px-3 py-2" multiple>
                            </div>

                            <div class="mb-4">
                                <label for="videos[]" class="block text-gray-700 font-bold mb-2">Upload Videos:</label>
                                <input type="file" name="videos[]" id="videos" accept=".mp4, .mov, .avi, .wmv" class="border px-3 py-2" multiple>
                            </div>

                            <div class="mb-4">
                                <label for="lesson_id" class="block text-gray-700 font-bold mb-2">Select Lesson:</label>
                                <select name="lesson_id" id="lesson_id" class="w-full border rounded px-3 py-2">
                                    @foreach($lessons as $lesson)
                                        <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






