<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use App\Models\Sorty;
use App\Models\Vehicule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SortyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Show all in stock

        $viewData = [];

        $viewData['title'] = 'Liste des sorties magasins ';

        $viewData['sorties'] = Sorty::with('piece','vehicule')->get();

        return view('sorties.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Show Register Scolar Year Form

        $viewData = [];

        $viewData['title'] = 'Ajouter une sortie magasin';

        $viewData['pieces'] = Piece::orderBy('designation', 'ASC')->get();

        $viewData['vehicules'] = Vehicule::orderBy('plaque', 'ASC')->get();

        return view('sorties.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([

            'quantite' => 'required|numeric',
            'piece_id' => 'required',
            'vehicule_id' => 'required',
            'motif' => 'required',
            'personne' => 'required',

        ],[

            'quantite.required' => 'Compléter le champ quantité',
            'motif.required' => 'Compléter le champ motif de sortie',
            'personne.required' => 'Compléter le champ personne concernée',
            'quantite.numeric' => 'La quantité doit être un nombre ',
            'piece_id.required' => 'Choisir une pièce ',
            'vehicule_id.required' => 'Choisir un véhicule '

        ]);

        //Mise a jour de la quantite pièce
        $piece = Piece::find($request->piece_id);

        $solde = $piece->solde;

        if($request->quantite > $solde){

            return redirect()->back()->with('error','Cette quantité ne se trouve pas dans le stock');

        }else{

            $newSolde = $solde - $request->quantite;

            if (Auth::user()->role == 'super_admin') {

                $piece->solde = $newSolde;

                $piece->save();
                
            }

            //Sauvegarder les donnees liees à la sortie en stock
            $sortie = new Sorty();

            $sortie->quantite = $request->quantite;

            $sortie->solde = $newSolde;

            $sortie->motif = $request->motif;

            $sortie->personne = $request->personne;

            $sortie->observation = $request->observation;

            $sortie->piece_id = $request->piece_id;

            $sortie->vehicule_id = $request->vehicule_id;

            $statut = (Auth::user()->role == 'super_admin') ? 0 : 1 ;

            $sortie->statut = $statut;

            $sortie->save();

            return redirect()->back()->with('success','Sortie effectuée avec succès');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sorty $sorty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sorty $sorty)
    {
        //Show Edit Piece data Row Data

        $viewData = [];

        $viewData['title'] = 'Détail Sortie magasin';

        $viewData['pieces'] = Piece::orderBy('designation', 'ASC')->get();

        $viewData['vehicules'] = Vehicule::orderBy('plaque', 'ASC')->get();

        return view('sorties.update', compact('sorty'))->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sorty $sorty)
    {
        $request->validate([

            'quantite' => 'required|numeric',
            'piece_id' => 'required',
            'vehicule_id' => 'required',
            'motif' => 'required',
            'personne' => 'required',

        ],[

            'quantite.required' => 'Compléter le champ quantité',
            'motif.required' => 'Compléter le champ motif de sortie',
            'personne.required' => 'Compléter le champ personne concernée',
            'quantite.numeric' => 'La quantité doit être un nombre ',
            'piece_id.required' => 'Choisir une pièce ',
            'vehicule_id.required' => 'Choisir un véhicule '

        ]);

        //Mise a jour de la quantite produit
        $piece = Piece::find($request->piece_id);

        $solde = $piece->solde;

        if($request->quantite > $solde){

            return redirect()->back()->with('error','Cette quantité ne se trouve pas dans le stock');

        }else{

            $newSolde = $solde + $sorty->quantite - $request->quantite;

            $piece->solde = $newSolde;

            $piece->save();


            //Mise a jour du mouvement approvisionnement
            $sorty->quantite = $request->quantite;

            $sorty->solde = $newSolde;

            $sorty->motif = $request->motif;

            $sorty->personne = $request->personne;

            $sorty->observation = $request->observation;

            $sorty->piece_id = $request->piece_id;

            $sorty->vehicule_id = $request->vehicule_id;

            $sorty->save();

            return redirect()->back()->with('success', 'Mise à jour effectuée avec succès !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sorty $sorty): RedirectResponse
    {
        //Mise a jour de la quantite produit
        $piece = Piece::find($sorty->piece_id);

        $solde = $piece->solde;

        $piece->solde = $solde + $sorty->quantite;

        $piece->save();

        $sorty->delete();

        return redirect()->back()->with('success', 'Suppression effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function validated(Sorty $sorty): RedirectResponse
    {
        //Mise a jour de la quantite produit
        $piece = Piece::find($sorty->piece_id);

        $solde = $piece->solde;

        $piece->solde = $solde - $sorty->quantite;

        $piece->save();

        $sorty->statut = 0;

        $sorty->save();

        return redirect()->back()->with('success', 'Sortie validée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash(Sorty $sorty): RedirectResponse
    {

        $sorty->delete();

        return redirect()->back()->with('success', 'Suppression effectuée avec succès !');
    }
}
