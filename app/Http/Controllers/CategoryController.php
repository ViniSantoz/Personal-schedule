<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view ('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create($this->validar($request));

        return redirect()->route('categories.index')
            ->with('sucesso', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view ('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($this->validar($request));

        return redirect()->route('categories.index')
            ->with('sucesso', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('sucesso', 'Categoria excluida com sucesso!');
    }

    private function validar(Request $request)
    {
        return $request->validate([
            'name'=>['required','string','max:100'],
            'description'=>['nullable','string','max:1000'],
        ],[
            'name.required' => 'Informe o nome da categoria.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome deve ter no maximo 100 caracteres.',
            'description.string' => 'A descricao deve ser um texto.',
            'description.max' => 'A descricao deve ter no maximo 1000 caracteres.',
        ]); 
    }
}
