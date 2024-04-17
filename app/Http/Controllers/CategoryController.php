<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsRedirected;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): ResponseIsRedirected | View
    {
        //Show all Solar Year

        $viewData = [];

        $viewData['title'] = 'Liste des catégories des pièces ';

        $viewData['categories'] = Category::orderBy('id', 'DESC')->get();

        return view('categories.index')->with('viewData', $viewData);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //Show Register Category Year Form

        $viewData = [];

        $viewData['title'] = 'Ajouter une catégorie de pièce';

        return view('categories.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {

        $request->validate([

            'nom' => [
                'required',
                Rule::unique('categories')->where(function ($query) use ($request) {
                    return $query->where('nom', $request->nom);
                }),
            ],

        ],[

            'nom.required' => 'Compléter le champ nom de catégorie',
            'nom.unique' => 'Cette catégorie existe déjà dans la base de données'

        ]);

        $category = new Category();

        $category->nom = $request->nom;

        $category->save();

        return redirect()->back()->with('success','Catégorie ajoutée avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): RedirectResponse | View
    {
        //Show Edit Scolar Year With Row Data

        $viewData = [];

        $viewData['title'] = $category->nom;

        return view('categories.update', compact('category'))->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {

        $request->validate([

            'nom' => [
                'required',
                Rule::unique('categories')->where(function ($query) use ($request) {
                    return $query->where('nom', $request->nom);
                }),
            ],

        ],[

            'nom.required' => 'Compléter le champ nom de catégorie',
            'nom.unique' => 'Cette catégorie existe déjà dans la base de données'

        ]);

        $category->nom = $request->nom;

        $category->save();

        return redirect()->back()->with('success', 'Mise à jour effectuée avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Suppression effectuée avec succès !');
    }
}