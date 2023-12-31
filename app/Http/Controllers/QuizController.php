<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function showQuiz()
    {
        // Obtener una pregunta aleatoria con sus opciones de respuesta
        $questions = Question::with('options')->get();
        
        return view('make-quiz', compact('questions'));
    }

    public function submitQuiz(Request $request)
    {
        $selectedAnswers = $request->input('answers');

        $totalQuestions = Question::count();

        // Obtener la cantidad de opciones de respuesta con is_correct = 1
        $correctOptionsCount = Option::whereIn('id', $selectedAnswers)
            ->where('is_correct', 1)
            ->count();

        $answerPercentage = ($correctOptionsCount / $totalQuestions) * 100;

        $answerScore = ($answerPercentage / 100) * 5;

        // Obtener todas las preguntas con sus respuestas correctas
        $questionsWithCorrectAnswers = [];
        $questions = Question::with('options')->get();
        foreach ($questions as $question) {
            $correctOption = $question->options->where('is_correct', 1)->first();
            if ($correctOption) {
                $questionsWithCorrectAnswers[$question->id] = $correctOption;
            }
        }

        return view('make-quiz', compact('questions', 'questionsWithCorrectAnswers', 'answerScore'));
    }
}


