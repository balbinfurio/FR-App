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

        $totalQuestions = count($selectedAnswers);

        // Obtener la cantidad de opciones de respuesta con is_correct = 1
        $correctOptionsCount = Option::whereIn('id', $selectedAnswers)
            ->where('is_correct', 1)
            ->count();

        $answerPercentage = ($correctOptionsCount/$totalQuestions) * 100;

        $answerScore = ($answerPercentage / 100) * 5;

        // dd($answerScore);
        

        return redirect()->route('make-quiz')->with('answerScore', $answerScore);
    }
}


