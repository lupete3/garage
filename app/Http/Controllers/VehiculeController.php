<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): RedirectResponse | View
    {
        //Show all Solar Year

        $viewData = [];

        $viewData['title'] = 'Liste des véhicules';

        $viewData['vehicules'] = Vehicule::orderBy('id', 'DESC')->get();

        return view('vehicules.index')->with('viewData', $viewData);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Show Register Car Form

        $viewData = [];

        $viewData['title'] = 'Ajouter un véhicule';

        return view('vehicules.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {

        $request->validate([

            'marque' => 'required',
            'plaque' => [
                'required',
                Rule::unique('vehicules')->where(function ($query) use ($request) {
                    return $query->where('plaque', $request->plaque);
                }),
            ],

        ],[

            'plaque.required' => 'Compléter le champ de la plaque',
            'marque.required' => 'Compléter le champ de la marque',
            'plaque.unique' => 'Ce véhicule existe déjà dans la base de données'

        ]);

        $vehicule = new Vehicule();

        $vehicule->plaque = $request->plaque;

        $vehicule->marque = $request->marque;

        $vehicule->personne = $request->personne;

        $vehicule->save();

        return redirect()->back()->with('success','Véhicule ajouté avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicule $vehicule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicule $vehicule): RedirectResponse | View
    {
        //Show Edit Scolar Year With Row Data

        $viewData = [];

        $viewData['title'] = $vehicule->plaque;

        return view('vehicules.update', compact('vehicule'))->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicule $vehicule): RedirectResponse
    {

        $request->validate([

            'marque' => 'required',
            'plaque' => 'required',

        ],[

            'plaque.required' => 'Compléter le champ de la plaque',
            'marque.required' => 'Compléter le champ de la marque',

        ]);

        $vehicule->plaque = $request->plaque;

        $vehicule->marque = $request->marque;

        $vehicule->personne = $request->personne;

        $vehicule->save();

        return redirect()->back()->with('success', 'Mise à jour effectuée avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect()->back()->with('success', 'Suppression effectuée avec succès !');
    }
}
