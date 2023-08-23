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
                    <button id="startQuizBtn" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">
                        {{ __('Start Quiz') }}
                    </button>
                    <div id="quizContainer" class="hidden">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Question') }}</h3>
                        <form id="quizForm" action="{{ route('submit-quiz') }}" method="POST">
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
                        <div id="timer" class="text-lg font-semibold mt-4 mb-2"></div>
                    </div>
                </div>
                <h3 class="text-lg font-semibold mt-4 mb-2">{{ __('Results') }}</h3>
                @if (session('answerScore') !== null)
                    <p>Your score: {{ session('answerScore') }}</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const startButton = document.getElementById('startQuizBtn');
            const quizContainer = document.getElementById('quizContainer');
            const quizForm = document.getElementById('quizForm');
            const timerElement = document.getElementById('timer');

            let timeLeft = 60; // Tiempo en segundos
            let timerInterval;

            // Función para actualizar el temporizador
            function updateTimer() {
                timeLeft--;
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    console.log('Tiempo agotado');
                    quizForm.submit();
                } else {
                    console.log('Tiempo restante: ' + timeLeft + ' segundos');
                    timerElement.textContent = 'Tiempo restante: ' + timeLeft + ' segundos';
                }
            }

            // Al hacer clic en "Start Quiz"
            startButton.addEventListener('click', function() {
                console.log('Quiz iniciado');
                // Configurar el temporizador
                timerInterval = setInterval(updateTimer, 1000);
                quizContainer.classList.remove('hidden');
            });
        });
    </script>
</x-app-layout>
