<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Option;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questions-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string|max:255',
        ]);

        // Crear una nueva pregunta en la base de datos
        $question = Question::create([
            'question' => $request->input('question_text'),
        ]);

        // Obtener las opciones enviadas en el formulario
        $optionsData = $request->input('options');

        // dd($optionsData);

        foreach ($optionsData as $optionData) {
            $option = new Option();
            $option->question_id = $question->id; // Asignar el ID de la pregunta
            $option->option = $optionData['text'];
            $option->is_correct = isset($optionData['correct']); // Convertir a boolean
            $option->save();
        }

        return redirect()->route('questions.create')->with('success', 'Pregunta agregada exitosamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
