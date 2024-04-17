<?php

namespace App\Http\Controllers;

use App\Models\Emplacement;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): RedirectResponse | View
    {
        //Show all Solar Year

        $viewData = [];

        $viewData['title'] = 'Liste des emplacements ';

        $viewData['emplacements'] = Emplacement::orderBy('id', 'DESC')->get();

        return view('emplacements.index')->with('viewData', $viewData);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //Show Register Scolar Year Form

        $viewData = [];

        $viewData['title'] = 'Ajouter un emplacement';

        return view('emplacements.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {

        $request->validate([

            'nom' => [
                'required',
                Rule::unique('emplacements')->where(function ($query) use ($request) {
                    return $query->where('nom', $request->nom);
                }),
            ],

        ],[

            'nom.required' => 'Compléter le champ nom emplacement',
            'nom.unique' => 'Cet emplacement existe déjà dans la base de données'

        ]);

        $emplacement = new Emplacement();

        $emplacement->nom = $request->nom;

        $emplacement->save();

        return redirect()->back()->with('success','Emplacement ajoutée avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(Emplacement $emplacement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emplacement $emplacement): RedirectResponse | View
    {
        //Show Edit Scolar Year With Row Data

        $viewData = [];

        $viewData['title'] = $emplacement->nom;

        return view('emplacements.update', compact('emplacement'))->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emplacement $emplacement): RedirectResponse
    {

        $request->validate([

            'nom' => [
                'required',
                Rule::unique('emplacements')->where(function ($query) use ($request) {
                    return $query->where('nom', $request->nom);
                }),
            ],

        ],[

            'nom.required' => 'Compléter le champ nom emplacement',
            'nom.unique' => 'Cet emplacement existe déjà dans la base de données'

        ]);

        $emplacement->nom = $request->nom;

        $emplacement->save();

        return redirect()->back()->with('success', 'Mise à jour effectuée avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emplacement $emplacement)
    {
        $emplacement->delete();

        return redirect()->back()->with('success', 'Suppression effectuée avec succès !');
    }
}
