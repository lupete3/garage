<?php

namespace App\Http\Controllers;

use App\Models\Boisson;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BoissonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): RedirectResponse | View
    {
        //Show all Solar Year

        $viewData = [];

        $viewData['title'] = 'Liste des boissons ';

        $viewData['boissons'] = Boisson::with('category')->get();

        return view('boissons.index')->with('viewData', $viewData);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //Show Register Scolar Year Form

        $viewData = [];

        $viewData['title'] = 'Ajouter une Boisson';

        $viewData['categories'] = Category::orderBy('nom', 'ASC')->get();

        return view('boissons.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {

        $request->validate([

            'name' => 'required',
            'prix' => 'required|numeric',
            'category_id' => 'required',

        ],[

            'name.required' => 'Compléter le champ designation',
            'prix.required' => 'Compléter le champ prix',
            'prix.numeric' => 'Entrer un nombre ',
            'category_id.required' => 'Choisir une catégorie de boisson'

        ]);

        $boisson = new Boisson();

        $boisson->designation = $request->name;

        $boisson->prix = $request->prix;

        $boisson->category_id = $request->category_id;

        $boisson->save();

        return redirect()->back()->with('success','Boisson ajoutée avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(Boisson $boisson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boisson $boisson): RedirectResponse | View
    {
        //Show Edit Scolar Year With Row Data

        $viewData = [];

        $viewData['title'] = $boisson->designation;

        $viewData['categories'] = Category::orderBy('nom', 'ASC')->get();

        return view('boissons.update', compact('boisson'))->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boisson $boisson): RedirectResponse
    {

        $request->validate([

            'name' => 'required',
            'prix' => 'required|numeric',
            'category_id' => 'required',

        ],[

            'name.required' => 'Compléter le champ designation',
            'prix.required' => 'Compléter le champ prix',
            'prix.numeric' => 'Entrer un nombre ',
            'category_id.required' => 'Choisir une catégorie de boisson'

        ]);

        $boisson->designation = $request->name;

        $boisson->prix = $request->prix;

        $boisson->category_id = $request->category_id;

        $boisson->save();

        return redirect()->back()->with('success', 'Mise à jour effectuée avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boisson $boisson)
    {
        $boisson->delete();

        return redirect()->back()->with('success', 'Suppression effectuée avec succès !');
    }
}
