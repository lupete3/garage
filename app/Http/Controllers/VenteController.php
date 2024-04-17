<?php

namespace App\Http\Controllers;

use App\Models\Boisson;
use App\Models\Nourriture;
use App\Models\Table;
use App\Models\Vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [];

        $viewData['title'] = 'Historique des ventes';

        $viewData['ventes'] = Vente::select('*')->where('status', 1)->get();

        return view('ventes.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewData = [];

        $viewData['title'] = 'Ajouter une vente';

        $viewData['boissons'] = Boisson::orderBy('designation', 'ASC')->get();

        $viewData['nourritures'] = Nourriture::orderBy('nom', 'ASC')->get();

        $viewData['tables'] = Table::orderBy('nom', 'ASC')->get();

        $viewData['tables_commandes'] = Table::with('ventes')->get();


        return view('ventes.create')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function print(Table $table)
    {
        $viewData = [];

        $viewData['title'] = 'Commande de la table '.$table->nom;

        return view('ventes.facture',compact('table'))->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function paiement(Table $table)
    {
        $viewData = [];

        $viewData['title'] = 'Commande de la table '.$table->nom;

        $viewData['ventes'] = Vente::select('id')->where('table_id', $table->id)->get();

        foreach($viewData['ventes'] as $vente){
                                        
           Vente::where('table_id', $table->id)->update(['status' => 1]);
        
        }

        return to_route('ventes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'type' => 'required',
            'quantite' => 'required|numeric',
            'table_id' => 'required',
            'boisson_id' => 'required',

        ],[

            'type.required' => 'Compléter le champ type produit',
            'quantite.required' => 'Compléter le champ quantité',
            'quantite.numeric' => 'Entrer un nombre ',
            'table_id.required' => 'Choisir une table concernée par la demande',
            'boisson_id.required' => 'Choisir une boisson à vendre'

        ]);

        if ($request->type == 'boisson') {
            
            $boisson = Boisson::find($request->boisson_id);

            $solde = $boisson->solde;

            $boisson->solde = $solde - $request->quantite;

            $boisson->save();

            $vente = new Vente();

            $vente->libelle = $boisson->designation;

            $vente->quantite = $request->quantite;

            $vente->prix_vente = $boisson->prix;

            $vente->prix_tot = $boisson->prix * $request->quantite;

            $vente->type_produit = $request->type;

            $vente->table_id = $request->table_id;

            $vente->save();

            return redirect()->back()->with('success','Commande ajoutée avec succès');

        }else{

            $nourriture = Nourriture::find($request->boisson_id);

            $designation = $nourriture->nom;

            $vente = new Vente();

            $vente->libelle = $designation;

            $vente->quantite = $request->quantite;

            $vente->prix_vente = $nourriture->prix;

            $vente->prix_tot = $nourriture->prix * $request->quantite;

            $vente->type_produit = $request->type;

            $vente->table_id = $request->table_id;

            $vente->save();

            return redirect()->back()->with('success','Commande ajoutée avec succès');

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Vente $vente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vente $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vente $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vente $vente)
    {
        //
    }
}
