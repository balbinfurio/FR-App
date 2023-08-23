<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- @foreach ($questions as $question)
                        <h3 class="text-lg font-semibold mb-4">{{ __('Question') }}</h3>
                        <p>{{ $question->question }}</p>
    
                        <h3 class="text-lg font-semibold mt-4 mb-2">{{ __('Options') }}</h3> --}}
                        <h3 class="text-lg font-semibold mb-2">{{ __('Question') }}</h3>
                        <form action="{{ route('submit-quiz') }}" method="POST">
                            @csrf
                            @foreach ($questions as $question)
                                <div class="mb-4">
                                    <p>{{ $question->question }}</p>
                        
                                    <h3 class="text-lg font-semibold mt-4 mb-2">{{ __('Options') }}</h3>
                                    @foreach ($question->options as $option)
                                        <label class="block">
                                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}">
                                            {{ $option->option }}
                                        </label>
                                    @endforeach
                                </div>
                            @endforeach
                        
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">
                                {{ __('Submit Quiz') }}
                            </button>
                        </form>
                        
                        <hr>
                </div>

                <h3 class="text-lg font-semibold mt-4 mb-2">{{ __('Results') }}</h3>
                @if (session('answerScore') !== null)
                    <p>Your score: {{ session('answerScore') }}</p>
                @endif
                
            </div>
        </div>
    </div>
    
</x-app-layout>
