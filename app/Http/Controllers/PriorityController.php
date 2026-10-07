<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Priority;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priority = Priority::all();
        return view ('priorities.index', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('priorities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Priority::create($this->validar($request));

        return redirect()->route('priorities.index')
            ->with('sucesso', 'Prioridade cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority $priority)
    {
        return view('priorities.show', compact('priority'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priority $priority)
    {
        return view ('priorities.edit', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Priority $priority)
    {
        $priority->update($this->validar($request));

        return redirect()->route('priorities.index')
            ->with('sucesso', 'Prioridade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        $priority->delete();

        return redirect()->route('priorities.index')
            ->with('sucesso', 'Prioridade excluida com sucesso!');
    }

    private function validar(Request $request)
    {
        return $request->validate([
            'name'=>['required','string','max:100'],
            'level'=>['required','integer','min:1','max:100'],
        ],[
            'name.required' => 'Informe o nome da prioridade.',
            'level.required' => 'Informe o nivel da prioridade.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome deve ter no maximo 100 caracteres.',
            'level.integer'  => 'O nível deve ser um número inteiro.',
            'level.max' => 'o nivel deve ter no maximo 10 caracteres.',
        ]); 
    }
}
