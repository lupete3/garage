<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Emplacement;
use App\Models\Piece;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [];

        $viewData['title'] = 'Liste des pièces';

        $viewData['pieces'] = Piece::all();

        return view('pieces.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewData = [];

        $viewData['title'] = 'Ajouter une pièce';

        $viewData['categories'] = Category::orderBy('nom', 'ASC')->get();

        $viewData['emplacements'] = Emplacement::orderBy('nom', 'ASC')->get();

        return view('pieces.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {

        $request->validate([
          
            'category_id' => 'required',
            'emplacement_id' => 'required',
            'numero' => [
                'required',
                Rule::unique('pieces')->where(function ($query) use ($request) {
                    return $query->where('numero', $request->numero);
                }),
            ],
            'name' => 'required',
            'stock' => 'numeric',

        ],[

            'category_id.required' => 'Choisir une catégorie de pièce',
            'emplacement_id.required' => 'Choisir un emplacement de la pièce',
            'name.required' => 'Compléter le champ nom de pièce',
            'numero.required' => 'Compléter le champ part number de pièce',
            'numero.unique' => 'Cette pièce existe déjà dans la base de données',
            'stock.numeric' => 'La quantité doit être un nombre ',

        ]);

        //Sauvegarder les donnees liees a l'approvisionnement
        $piece = new Piece();

        $piece->numero = $request->numero;

        $piece->designation = $request->name;

        $piece->category_id = $request->category_id;

        $piece->emplacement_id = $request->emplacement_id;

        $piece->solde = $request->stock;

        $piece->save();

        return redirect()->back()->with('success','Pièce ajoutée avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(Piece $piece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Piece $piece)
    {
        //Show Edit Scolar Year With Row Data

        $viewData = [];

        $viewData['title'] = $piece->designation;

        $viewData['categories'] = Category::orderBy('nom', 'ASC')->get();

        $viewData['emplacements'] = Emplacement::orderBy('nom', 'ASC')->get();

        return view('pieces.update', compact('piece'))->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Piece $piece)
    {
        $request->validate([
          
            'category_id' => 'required',
            'emplacement_id' => 'required',
            'numero' => 'required',
            'name' => 'required',
            'stock' => 'numeric',

        ],[

            'category_id.required' => 'Choisir une catégorie de pièce',
            'emplacement_id.required' => 'Choisir un emplacement de la pièce',
            'name.required' => 'Compléter le champ nom de pièce',
            'numero.required' => 'Compléter le champ part number de pièce',
            'stock.numeric' => 'La quantité doit être un nombre ',

        ]);

        //Mise a jour du mouvement approvisionnement
        $piece->numero = $request->numero;

        $piece->designation = $request->name;

        $piece->category_id = $request->category_id;

        $piece->emplacement_id = $request->emplacement_id;

        $piece->solde = $request->stock;

        $piece->save();

        return redirect()->back()->with('success', 'Mise à jour effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Piece $piece)
    {
        $piece->delete();

        return redirect()->back()->with('success', 'Suppression effectuée avec succès !');
    }
}
