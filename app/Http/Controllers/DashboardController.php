<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Piece;
use App\Models\Sorty;
use App\Models\Entree;
use App\Models\Vehicule;
use App\Models\Emplacement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //Main DashboardController

    public function dashboard(): View
    {
        // Vérifier si l'utilisateur est un administrateur
        if ((Auth::user()->role == 'user')) {

            Auth::guard('web')->logout();

            abort(403, 'Votre compte n\'est pas encore validé');
        }

        $viewData = [];

        $viewData['title'] = 'Tableau de bord';

        $viewData['emplacements'] = Emplacement::all();

        $viewData['pieces'] = Piece::all();

        $viewData['entrees'] = Entree::whereDate('created_at', Carbon::today())->with('piece')->get();
        
        $viewData['sorties'] = Sorty::whereDate('created_at', Carbon::today())->with('piece')->get();
        
        $viewData['sorties_encours'] = Sorty::where('statut', 1)->with('piece')->get();

        return view('dashboard')->with('viewData',$viewData);
        
    }

    //Gestion des utilisateurs
    public function usersIndex(): View
    {

        $viewData['title'] = 'Liste des utilisateurs';

        $viewData['users'] = User::all();
        
        return view('users.index')->with('viewData',$viewData);
    }

    public function usersValidate(User $user)
    {

        $viewData['title'] = 'Liste des utilisateurs';

        $user->role = 'admin';
        $user->save();
        
        return redirect()->back()->with('success', 'Compte utilisateur validé');
    }

    public function usersDelete(User $user)
    {

        $user->delete();
        
        return redirect()->back()->with('success', 'Compte utilisateur supprimé');
    }


    public function pieces(): View
    {

        $viewData['title'] = 'Liste des pièces disponibles en stock';

        $viewData['emplacements'] = Emplacement::all();

        $viewData['pieces'] = Piece::with('category')->with('emplacement')->orderBy('designation', 'ASC')->get();
        
        return view('rapports.fiche_pieces_stock')->with('viewData',$viewData);
    }

    public function piecesEmplacement(Request $request): View
    {
        if($request->emplacement == 'all'){

            $viewData['title'] = 'Liste des pièces disponibles en stock ';

            $viewData['pieces'] = Piece::with('category')->with('emplacement')->orderBy('designation', 'ASC')->get();

        }else{

            $viewData['emplacements'] = Emplacement::where('id',$request->emplacement)->get();

            foreach($viewData['emplacements'] as $emplacement){
                $emplacementName = $emplacement->nom;
            }

            $viewData['title'] = 'Liste des pièces disponibles en stock sur '.$emplacementName;

            $viewData['pieces'] = Piece::with('category')->with('emplacement')->where('emplacement_id',$request->emplacement)->orderBy('designation', 'ASC')->get();
        
        }

        $viewData['emplacements'] = Emplacement::all();
                
        return view('rapports.fiche_pieces_stock')->with('viewData',$viewData);
    }

   
    // Fiche des entrées journalieres
    public function entreeStockJour(): View
    {
        $viewData['pieces'] = Piece::all();

        $viewData['title'] = 'Liste des entrées en stock du '. date('d-m-Y');

        $viewData['entrees'] = Entree::whereDate('created_at', Carbon::today())->with('piece')->get();
        
        return view('rapports.fiche_entree_stock')->with('viewData',$viewData);
    }

    // Fiche des entrées hebdomadaires
    public function entreeStockHebdo(): View
    {
        $viewData['pieces'] = Piece::all();

        $viewData['title'] = 'Liste des entrées en stock de la semaine';
         
        $debutSemaine = Carbon::now()->startOfWeek();
        $finSemaine = Carbon::now()->endOfWeek();

        $viewData['entrees'] = Entree::whereBetween('created_at', [$debutSemaine, $finSemaine])->with('piece')->get();
        
        return view('rapports.fiche_entree_stock')->with('viewData',$viewData);
    }

    // Fiche des entrées hebdomadaires
    public function entreeStockAnnuel(): View
    {
        $viewData['pieces'] = Piece::all();

        $viewData['title'] = 'Liste des entrées en stock de l\'année';
         
        $debutAnnee = Carbon::now()->startOfYear();
        $finAnnee = Carbon::now()->endOfYear();

        $viewData['entrees'] = Entree::whereBetween('created_at', [$debutAnnee, $finAnnee])->with('piece')->get();
        
        return view('rapports.fiche_entree_stock')->with('viewData',$viewData);
    }

    

    // Fiche des sorties personnalise de pièce
    public function entreeStockPiece(Request $request): View
    {
        $viewData['vehicules'] = Vehicule::all();

        $viewData['pieces'] = Piece::all();

        if($request->piece == 'all'){

            $viewData['title'] = 'Liste des entrées en stock ';

            $viewData['entrees'] = Entree::with('piece')->get();

        }else{

            if(empty($request->debut) || empty($request->debut)){
                $viewData['entrees'] = Entree::with('piece')->where('piece_id', $request->piece)->get();
            }else{
                $viewData['entrees'] = Entree::with('piece')
                ->where('piece_id', $request->piece)
                ->whereBetween('created_at', [$request->debut, $request->fin])->get();
            }

            $viewData['piece'] = Piece::where('id',$request->piece)->get();
            
            foreach($viewData['piece'] as $piece){
                $designation = $piece->designation;
                $numero = $piece->numero;
            }

            $viewData['title'] = 'Liste des entrées en stock de la pièce '.$designation.' - '.$numero;
        
        }

        return view('rapports.fiche_entree_stock')->with('viewData',$viewData);
    }

    // Fiche des entrées personnalisées
    public function entreeStockDate(Request $request): View
    {
        $viewData['pieces'] = Piece::all();

        $viewData['title'] = 'Liste des entrées en stock du '.$request->debut.' au '.$request->fin;
         
        $dateDebut = $request->input('debut');
        $dateFin = $request->input('fin');

        $viewData['entrees'] = Entree::whereBetween('created_at', [$dateDebut, $dateFin])->with('piece')->get();
        
        return view('rapports.fiche_entree_stock')->with('viewData',$viewData);
    }

    public function entreeStockAll(): View
    {

        $viewData['title'] = 'Liste des entrées en stock' ;

        $viewData['pieces'] = Piece::all();

        $viewData['entrees'] = Entree::with('piece')->get();
        
        return view('rapports.fiche_entree_stock')->with('viewData',$viewData);
    }

    // Fiche des sorties journalieres
    public function sortieStockJour(): View
    {
        $viewData['vehicules'] = Vehicule::all();

        $viewData['pieces'] = Piece::all();

        $viewData['title'] = 'Liste des sorties en stock du '. date('d-m-Y');

        $viewData['sorties'] = Sorty::whereDate('created_at', Carbon::today())->with('piece','vehicule')->get();
        
        return view('rapports.fiche_sortie_stock')->with('viewData',$viewData);
    }

    // Fiche des sorties hebdomadaires
    public function sortieStockHebdo(): View
    {

        $viewData['vehicules'] = Vehicule::all();

        $viewData['pieces'] = Piece::all();

        $viewData['title'] = 'Liste des sorties en stock de la semaine';
         
        $debutSemaine = Carbon::now()->startOfWeek();
        $finSemaine = Carbon::now()->endOfWeek();

        $viewData['sorties'] = Sorty::whereBetween('created_at', [$debutSemaine, $finSemaine])->with('piece','vehicule')->get();
        
        return view('rapports.fiche_sortie_stock')->with('viewData',$viewData);
    }

    // Fiche des sorties hebdomadaires
    public function sortieStockAnnuel(): View
    {

        $viewData['vehicules'] = Vehicule::all();

        $viewData['pieces'] = Piece::all();

        $viewData['title'] = 'Liste des sorties en stock de l\'année';
         
        $debutAnnee = Carbon::now()->startOfYear();
        $finAnnee = Carbon::now()->endOfYear();

        $viewData['sorties'] = Sorty::whereBetween('created_at', [$debutAnnee, $finAnnee])->with('piece','vehicule')->get();
        
        return view('rapports.fiche_sortie_stock')->with('viewData',$viewData);
    }

    // Fiche des sorties personnalise
    public function sortieStockVehicule(Request $request): View
    {
        $viewData['vehicules'] = Vehicule::all();

        $viewData['pieces'] = Piece::all();

        if($request->vehicule == 'all'){

            $viewData['title'] = 'Liste des sorties en stock ';

            $viewData['sorties'] = Sorty::with('piece','vehicule')->get();

        }else{

            if(empty($request->debut) || empty($request->debut)){
                $viewData['sorties'] = Sorty::with('piece','vehicule')->where('vehicule_id', $request->vehicule)->get();
            }else{
                $viewData['sorties'] = Sorty::with('piece','vehicule')
                ->where('vehicule_id', $request->vehicule)
                ->whereBetween('created_at', [$request->debut, $request->fin])->get();
            }

            $viewData['vehicule'] = Vehicule::where('id',$request->vehicule)->get();
            
            foreach($viewData['vehicule'] as $vehicule){
                $sortiePlaque = $vehicule->plaque;
                $sortieMarque = $vehicule->marque;
            }

            $viewData['title'] = 'Liste des sorties en stock pour le véhicule '.$sortiePlaque.' - '.$sortieMarque;
        
        }

        return view('rapports.fiche_sortie_stock')->with('viewData',$viewData);
    }

    // Fiche des sorties personnalise de pièce
    public function sortieStockPiece(Request $request): View
    {
        $viewData['vehicules'] = Vehicule::all();

        $viewData['pieces'] = Piece::all();

        if($request->piece == 'all'){

            $viewData['title'] = 'Liste des sorties en stock ';

            $viewData['sorties'] = Sorty::with('piece','vehicule')->get();

        }else{

            if(empty($request->debut) || empty($request->debut)){
                $viewData['sorties'] = Sorty::with('piece','vehicule')->where('piece_id', $request->piece)->get();
            }else{
                $viewData['sorties'] = Sorty::with('piece','vehicule')
                ->where('piece_id', $request->piece)
                ->whereBetween('created_at', [$request->debut, $request->fin])->get();
            }

            $viewData['piece'] = Piece::where('id',$request->piece)->get();
            
            foreach($viewData['piece'] as $piece){
                $designation = $piece->designation;
                $numero = $piece->numero;
            }

            $viewData['title'] = 'Liste des sorties en stock de la pièce '.$designation.' - '.$numero;
        
        }

        return view('rapports.fiche_sortie_stock')->with('viewData',$viewData);
    }

    // Fiche des sorties personnalise
    public function sortieStockDate(Request $request): View
    {
        $viewData['vehicules'] = Vehicule::all();

        $viewData['pieces'] = Piece::all();

        $viewData['title'] = 'Liste des sorties en stock du '.$request->debut.' au '.$request->fin;
         
        $dateDebut = $request->input('debut');
        $dateFin = $request->input('fin');

        $viewData['sorties'] = Sorty::whereBetween('created_at', [$dateDebut, $dateFin])->with('piece','vehicule')->get();
        
        return view('rapports.fiche_sortie_stock')->with('viewData',$viewData);
    }

    public function sortieStockAll(): View
    {

        $viewData['vehicules'] = Vehicule::all();

        $viewData['pieces'] = Piece::all();

        $viewData['title'] = 'Liste des sorties en stock ';

        $viewData['vehicules'] = Vehicule::all();

        $viewData['sorties'] = Sorty::with('piece','vehicule')->get();
        
        return view('rapports.fiche_sortie_stock')->with('viewData',$viewData);
    }
}
