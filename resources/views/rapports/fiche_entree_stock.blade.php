@extends('layouts.backend')


@section('content')
  <style>
    td,th{
      font-size:1.2em;
      
    }
  </style>

    <!-- Main Content -->
    <div class="main-content">
        
        <section class="section">
            <div class="section-header valider">
                
            </div>

            <div class="section-body ">
              <div class="row">
                <div class="col-2 col-md-2 col-lg-2 align-center">
                  <a href="{{ route('fiches.entreeStockJour')}}" class="btn btn-primary  valider">Rapport Journalier</a>
                </div>
                <div class="col-3 col-md-3 col-lg-3 align-center">
                  <a href="{{ route('fiches.entreeStockHebdo')}}" class="btn btn-primary  valider">Rapport Hebdomadaire</a>
                </div>
                <div class="col-2 col-md-2 col-lg-2 align-center">
                  <a href="{{ route('fiches.entreeStockAnnuel')}}" class="btn btn-primary  valider">Rapport Annuel</a>
                </div>
                <div class="col-2 col-md-2 col-lg-2 align-center">
                  <button type="button" class="btn btn-primary  valider" data-toggle="modal" data-target="#exampleModal">
                    Rapport personnalisé
                  </button>
                </div>
                
                <div class="col-2 col-md-2 col-lg-2 align-center">
                  <button type="button" class="btn btn-primary  valider" data-toggle="modal" data-target="#exampleModalPiece">
                    Rapport pièce
                  </button>
                </div>
                
                
              </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 align-center">
                       
                      <div class="row" style="margin-bottom:10px;  " >
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <center>
                                <p style="font-weight:bold; font-family:Century Gothic; font-size:2em;" >
                                    {{ $viewData['title'] }} 
                                </p>
                            </center>        
                        </div>
                        
                      </div>

                      <div class="container">
                        <div class="row" style="margin-bottom:10px;  " >
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                           
                                <div class="container">
                                    <div class="row spacer" style="margin-bottom:20px; " >
            
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <table class="table table-bordered table-striped table-sm" style="font-family:Century Gothic; font-size:0.7em;">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Date Entrée</th>
                                                        <th>Pièce</th>
                                                        <th>Quantite Entrée</th>
                                                        <th>Prix Unitaire</th>
                                                        <th>Prix Total</th>
                                                        <th>Provenace</th>
                                                        <th>Observation</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php 
                                                      $num = 1;
                                                      $tot = 0;
                                                      $totQte = 0;
                                                    @endphp
                                                    
                                                    @forelse ($viewData['entrees'] as $entree)

                                                      @php
                                                        $tot +=$entree->quantite;
                                                        $totQte +=($entree->quantite*$entree->prix)
                                                      @endphp
                                                      <tr>
                                                        <td>{{ $num++ }}</td>
                                                        <td>{{ $entree->created_at }}</td>
                                                        <td>{{ $entree->piece->designation }}</td>
                                                        <td>{{ $entree->quantite }}</td>
                                                        <td>{{ $entree->prix }}</td>
                                                        <td><b>{{ $entree->quantite * $entree->prix}}$</b></td>
                                                        <td>{{ $entree->provenance }}</td>
                                                        <td>{{ $entree->observation }}</td>
                                                      </tr>

                                                    @empty
                                                    
                                                    @endforelse

                                                    @php
                                                      $num++;
                                                    @endphp
                                                    <tr>
                                                        <td colspan="3"><b>Total</b></td>
                                                        <td ><b>{{ $tot }}</b></td>
                                                        <td></td>
                                                        <td><b>{{ $totQte }}$</b></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
            
                                    </div>
                                
                                    <div class="row spacer" style="margin-bottom: 1.3em;">
            
                                      <table class="container-fluid">
                                        <p style="font-family:Century Gothic; font-size:1em; margin-left:20px; ">
                                            Date : <?php echo date('d-m-Y'); ?>
                                            <br>
                                            <span>Heure : <?php echo date('H:i'); ?></span>
                                             <br>
                                
                                        </p>
                                       
                                      </table>
                                </div> 
        
                                <div class="row">
                                  <div class="col-md-3 offset-3">
                                    <button type="button" class="btn btn-primary print pull-right valider"><span class="fa fa-print"></span> Imprimer</button>
                                  </div>
                                  </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style=""></div>   
                        </div>
                    </div>

                    </div>
                  </div>
          </div>
        </section>
    </div>

    
    <!-- Critere selon la pièce -->
    <div class="modal" id="exampleModalPiece" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sortie selon la pièce</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" class="row" action="{{ route('fiches.entreeStockPiece')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group col-12 col-md-12 col-lg-12">
                <select name="piece" class="form-control selectpicker" id="piece" data-show-subtext="true" data-live-search="true" required>

                  <option value="" selected disabled>Choisir une pièce</option>
                  <option value="all">Toutes les pièces</option>
                  @forelse ($viewData['pieces'] as $piece)
                    <option value="{{ $piece->id }}">{{ $piece->designation }} - {{ $piece->numero }}</option>
                  @empty
                    
                  @endforelse
                </select>
              </div>  
              <div class="form-group col-6 col-md-6 col-lg-6">
                <label>Periode Du</label>
                <input type="date" class="form-control" name="debut" value="{{ old('debut') }}" >
              </div>
              <div class="form-group col-6 col-md-6 col-lg-6">
                <label>Au</label>
                <input type="date" class="form-control" name="fin" value="{{ old('fin') }}" >
              </div>         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary  valider">Rechercher</button>
          </div>
        </div>
      </form>
      </div>
    </div>

     <!-- Critere selon date -->
     <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Intervalle donnée</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" class="row" action="{{ route('fiches.entreeStockDate')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group col-5 col-md-5 col-lg-5">
                <label>Date début</label>
                <input type="date" class="form-control" name="debut" value="{{ old('debut') }}" required="">
              </div>
              <div class="form-group col-5 col-md-5 col-lg-5">
                <label>Date fin</label>
                <input type="date" class="form-control" name="fin" value="{{ old('fin') }}" required="">
              </div>
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary  valider">Rechercher</button>
          </div>
        </div>
      </form>
      </div>
    </div>

@endsection

<style>
  th,td{font-size: 2em;}
</style>

