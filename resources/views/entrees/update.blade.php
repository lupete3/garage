@extends('layouts.backend')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        
        <section class="section">
            <div class="section-header">
                <h1>{{ $viewData['title'] }}</h1>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Tableau de Bord</a></div>
                  <div class="breadcrumb-item"><a href="{{ route('entrees.index')}}">Entrées magasin</a></div>
                  <div class="breadcrumb-item">{{ $viewData['title'] }}</div>
                </div>
            </div>

            <div class="section-body ">
            
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 align-center">
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
                      <div class="card ">
                        <form method="post" action="{{ route('entrees.update',$entree->id)}}" enctype="multipart/form-data">
                          @method('PUT')  
                          @csrf
                          <div class="card-header">
                            <h4>{{$viewData['title']}}</h4>
                            <div class="card-header-action">
                                <a href="{{ route('entrees.index')}}" class="btn btn-icon icon-left btn-info"><i class="fas fa-list-alt"></i> Afficher les entrées magasin</a>
                            </div> 
                          </div>
                          <div class="card-body">
                            <div class="form-group">
                              <label>Choisir une pièce</label>
                              <select name="piece_id" class="form-control selectpicker" id="piece_id" data-show-subtext="true" data-live-search="true" required>


                                @foreach ($viewData['pieces'] as $piece)

                                  <option @selected(old('piece_id', $entree->piece_id) == $piece->id) value="{{ $piece->id }}" >{{ $piece->numero.' '.$piece->designation }}</option>

                                @endforeach
                               
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Quantité Entrée</label>
                              <input type="number" class="form-control" name="quantite" value="{{ $entree->quantite }}" required="">
                            </div>

                            <div class="form-group">
                              <label>Prix Unitaire</label>
                              <input type="text" class="form-control" name="prix" value="{{ $entree->prix }}" required="">
                            </div>
                            
                            <div class="form-group">
                              <label>Provenance</label>
                              <input type="text" class="form-control" name="provenance" value="{{ $entree->provenance }}" required="">
                            </div>
                            
                            <div class="form-group">
                              <label>Observation</label>
                              <textarea class="form-control" name="observation" id="observation" cols="30" rows="10">{{ $entree->observation }}</textarea>
                            </div>
                          </div>
                          <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Mettre à jour </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
          </div>
        </section>
    </div>

@endsection