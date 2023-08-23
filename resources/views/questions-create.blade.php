<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Add a New Question') }}</h3>
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="mb-4 dark:text-gray-800">
                            <label for="question_text" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Question') }}
                            </label>
                            <input type="text" id="question_text" name="question_text" class="form-input mt-1 block w-full" required>
                        </div>

                        <div class="mb-4 dark:text-gray-800">
                            <label for="option1" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Option 1') }}
                            </label>
                            <input type="text" id="option1" name="options[0][text]" class="form-input mt-1 block w-full" required>
                            <label class="block mt-2">
                                <input type="radio" name="options[0][correct]" value="1" class="mr-1" >
                                {{ __('This is a correct answer?') }}
                            </label>
                        </div>

                        <div class="mb-4 dark:text-gray-800">
                            <label for="option2" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Option 2') }}
                            </label>
                            <input type="text" id="option2" name="options[1][text]" class="form-input mt-1 block w-full" required>
                            <label class="block mt-2">
                                <input type="radio" name="options[1][correct]" value="1" class="mr-1" >
                                {{ __('This is a correct answer?') }}
                            </label>
                        </div>

                        <div class="mb-4 dark:text-gray-800">
                            <label for="option3" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Option 3') }}
                            </label>
                            <input type="text" id="option3" name="options[2][text]" class="form-input mt-1 block w-full" required>
                            <label class="block mt-2">
                                <input type="radio" name="options[2][correct]" value="1" class="mr-1" >
                                {{ __('This is a correct answer?') }}
                            </label>
                        </div>

                        <div class="mb-4 dark:text-gray-800">
                            <label for="option4" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Option 4') }}
                            </label>
                            <input type="text" id="option4" name="options[3][text]" class="form-input mt-1 block w-full" required>
                            <label class="block mt-2">
                                <input type="radio" name="options[3][correct]" value="1" class="mr-1" >
                                {{ __('This is a correct answer?') }}
                            </label>
                        </div>
                        

                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            {{ __('Add Question') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
