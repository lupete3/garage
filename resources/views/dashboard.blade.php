@extends('layouts.backend')

@php
  use Carbon\Carbon;
@endphp

@section('content')
    
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tableau de bord</h1>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="ion-help-buoy"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Emplacements</h4>
                  </div>
                  <div class="card-body">

                    {{ count( $viewData['emplacements']) }}

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="ion-android-settings"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pièces en stock</h4>
                  </div>
                  <div class="card-body">
                    
                    {{ count($viewData['pieces']) }}

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="ion-ios-upload"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Entrées Stock Jour</h4>
                  </div>
                  <div class="card-body">
                    
                    {{ count($viewData['entrees']) }}

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="ion-ios-download text-white" ></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Sorties Stock Jour</h4>
                  </div>
                  <div class="card-body">
                    
                    {{ count($viewData['sorties']) }}

                  </div>
                </div>
              </div>
            </div>                  
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card" >
                <div class="card-header" style="margin-bottom:-30px">
                  <div class="row">
                    <div class="col-md-12">
                      <h6 style="font-size: 14px">Sorties magasin en attente de validation </h6>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1" style="font-size: 12px">
                        <thead>                                 
                            <tr>
                                <th>Action</th>
                                <th>Date Sortie</th>
                                <th>Pièce</th>
                                <th>Quantite Sortie</th>
                                <th>Véhicule</th>
                                <th>Personne Concernée</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData['sorties_encours'] as $sortie) 
                                <tr>
                                  <td>
                                    @if(Auth::user()->role == 'super_admin')
                                      <div class="dropdown">
                                          <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">Action</a>
                                          
                                          <div class="dropdown-menu dropdown-menu-right">

                                            <a href="{{ route('sorties.validate', $sortie->id)}}" class="dropdown-item has-icon"><i class="fas fa-check text-success"></i> Valider</a>
                                            <form action="{{ route('sorties.trash', $sortie->id)}}" method="post">
                                                @csrf
                                                <button  type="submit" class="dropdown-item has-icon"><i class="fas fa-trash text-danger"></i> Annuler</button>
                                            </form>
                                          
                                          </div>
                                      </div>
                                    @else
                                      <span class="badge badge-danger">en attente</span>
                                      
                                    @endif
                                  </td>
                                    <td> {{ $sortie->created_at }} </td>
                                    <td> {{ $sortie->piece->designation }} </td>
                                    <td> {{ $sortie->quantite }} </td>
                                    <td> {{ $sortie->vehicule->plaque }} </td>
                                    <td> {{ $sortie->personne }} </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="card" >
                <div class="card-header" style="margin-bottom:-30px">
                  <div class="row">
                    <div class="col-md-9">
                      <h6 style="font-size: 14px">Entrées en stock du @php echo date('d-m-Y') @endphp </h6>
                    </div>
                    <div class="col-md-3 text-right">
                      <a href="{{ route('fiches.entreeStockJour')}}" class="btn btn-icon icon-left btn-info pull-right"><i class="fas fa-print"></i> Imprimer</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped" id="table-1" style="font-size: 12px">
                        <thead>                                 
                            <tr>
                                <th>Date Sortie</th>
                                <th>Pièce</th>
                                <th>Quantite Entrée</th>
                                <th>Provenace</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData['entrees'] as $entree) 
                                <tr>

                                    <td> {{ $entree->created_at }} </td>
                                    <td> {{ $entree->piece->designation }} </td>
                                    <td> {{ $entree->quantite }} </td>
                                    <td> {{ $entree->provenance }} </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card" >
                <div class="card-header" style="margin-bottom:-30px">
                  <div class="row">
                    <div class="col-md-9">
                      <h6 style="font-size: 14px">Sorties en stock du @php echo date('d-m-Y') @endphp </h6>
                    </div>
                    <div class="col-md-3 text-right">
                      <a href="{{ route('fiches.sortieStockJour')}}" class="btn btn-icon icon-left btn-info pull-right"><i class="fas fa-print"></i> Imprimer</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped" id="table-1" style="font-size: 12px">
                        <thead>                                 
                            <tr>
                                <th>Date Sortie</th>
                                <th>Pièce</th>
                                <th>Quantite Sortie</th>
                                <th>Véhicule</th>
                                <th>Personne Concernée</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData['sorties'] as $sortie) 
                                <tr>

                                    <td> {{ $sortie->created_at }} </td>
                                    <td> {{ $sortie->piece->designation }} </td>
                                    <td> {{ $sortie->quantite }} </td>
                                    <td> {{ $sortie->vehicule->plaque }} </td>
                                    <td> {{ $sortie->personne }} </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
              </div>
            </div>
          </div>

          
          
        </section>
      </div>

@endsection

<style>
  .card-icon i{
    font-size: 20px;
    color: white;
    font-size: 30px;
  }
  .card-icon{
    padding-top: 25px;
  }
  
</style>