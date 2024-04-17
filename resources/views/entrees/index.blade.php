

@extends('layouts.backend')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        
        <section class="section">
            <div class="section-header">
                <h1>{{ $viewData['title'] }}</h1>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Tableau de Bord</a></div>
                  <div class="breadcrumb-item"><a href="{{ route('entrees.index')}}">Entrées magasins</a></div>
                  <div class="breadcrumb-item">{{ $viewData['title'] }}</div>
                </div>
            </div>

            <div class="section-body ">
            
                <div class="row">
                    <div class="col-12">
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h6>
                                {{ $error }}
                                </h6>
                            </div>
                            @endforeach
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h6>
                                {{ Session::get('success') }}
                            </h6>
                            </div> 
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $viewData['title'] }} </h4>
                                <div class="card-header-action">
                                    <a href="{{ route('entrees.create')}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Effectuer une entrée magasin</a>
                                </div>   
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>                                 
                                        <tr>
                                            <th>#</th>
                                            <th>Date Entrée</th>
                                            <th>Part Number</th>
                                            <th>Pièce</th>
                                            <th>Quantite Entrée</th>
                                            <th>Prix Unitaire</th>
                                            <th>Prix Total</th>
                                            <th>Provenance</th>
                                            <th>Observation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($viewData['entrees'] as $entree) 
                                            <tr>

                                                <td> {{ $entree->id }} </td>
                                                <td> {{ $entree->created_at }} </td>
                                                <td> {{ $entree->piece->numero }} </td>
                                                <td> {{ $entree->piece->designation }} </td>
                                                <td> {{ $entree->quantite }} </td>
                                                <td> {{ $entree->prix }}$ </td>
                                                <td> {{ $entree->quantite * $entree->prix }}$ </td>
                                                <td> {{ $entree->provenance }} </td>
                                                <td> {{ $entree->observation }} </td>
                                                
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">Action</a>
                                                        
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                          
                                                            <a href="{{ route('entrees.edit', $entree->id)}}" class="dropdown-item has-icon"><i class="far fa-edit text-primary"></i> Modifier</a>
                                                          
                                                          <form action="{{ route('entrees.destroy', $entree->id)}}" method="post">
                                                            @csrf
                                                            <button  type="submit" class="dropdown-item has-icon"><i class="fas fa-trash text-danger"></i> Supprimer</button>
                                                          </form>
                                                          
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection