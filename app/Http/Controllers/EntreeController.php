<?php

namespace App\Http\Controllers;

use App\Models\Entree;
use App\Models\Piece;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EntreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Show all in stock

        $viewData = [];

        $viewData['title'] = 'Liste des entrées magasins ';

        $viewData['entrees'] = Entree::with('piece')->get();

        return view('entrees.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Show Register Scolar Year Form

        $viewData = [];

        $viewData['title'] = 'Ajouter une entrée magasin';

        $viewData['pieces'] = Piece::orderBy('designation', 'ASC')->get();

        return view('entrees.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {

        $request->validate([

            'quantite' => 'required|numeric',
            'prix' => 'required|numeric',
            'piece_id' => 'required',
            'provenance' => 'required',

        ],[

            'quantite.required' => 'Compléter le champ quantité',
            'prix.required' => 'Compléter le champ prix unitaire',
            'provenance.required' => 'Compléter le champ provenance',
            'quantite.numeric' => 'La quantité doit être un nombre ',
            'piece_id.required' => 'Choisir une pièce '

        ]);

        //Mise a jour de la quantite pièce
        $piece = Piece::find($request->piece_id);

        $solde = $piece->solde;

        $piece->solde = $solde + $request->quantite;

        $piece->save();


        //Sauvegarder les donnees liees à l'entrée stock
        $entree = new Entree();

        $entree->quantite = $request->quantite;

        $entree->prix = $request->prix;

        $entree->provenance = $request->provenance;

        $entree->observation = $request->observation;

        $entree->piece_id = $request->piece_id;

        $entree->save();

        return redirect()->back()->with('success','Entrée effectuée avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(Entree $entree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entree $entree)
    {
        //Show Edit Piece data Row Data

        $viewData = [];

        $viewData['title'] = 'Détail Entrée magasin';

        $viewData['pieces'] = Piece::orderBy('designation', 'ASC')->get();

        return view('entrees.update', compact('entree'))->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entree $entree): RedirectResponse
    {
        $request->validate([

            'quantite' => 'required|numeric',
            'prix' => 'required|numeric',
            'piece_id' => 'required',
            'provenance' => 'required',

        ],[

            'quantite.required' => 'Compléter le champ quantité',
            'prix.required' => 'Compléter le champ prix unitaire',
            'provenance.required' => 'Compléter le champ provenance',
            'quantite.numeric' => 'La quantité doit être un nombre ',
            'piece_id.required' => 'Choisir une pièce '

        ]);

        //Mise a jour de la quantite produit
        $piece = Piece::find($request->piece_id);

        $solde = $piece->solde;

        $piece->solde = $solde - $entree->quantite + $request->quantite;

        $piece->save();


        //Mise a jour du mouvement approvisionnement
        $entree->quantite = $request->quantite;

        $entree->quantite = $request->prix;

        $entree->provenance = $request->provenance;

        $entree->observation = $request->observation;

        $entree->piece_id = $request->piece_id;

        $entree->save();

        return redirect()->back()->with('success', 'Mise à jour effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entree $entree)
    {
        //Mise a jour de la quantite produit
        $piece = Piece::find($entree->piece_id);

        $solde = $piece->solde;

        $piece->solde = $solde - $entree->quantite;

        $piece->save();

        $entree->delete();

        return redirect()->back()->with('success', 'Suppression effectuée avec succès !');
    }
}
