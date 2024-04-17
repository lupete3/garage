@extends('layouts.backend')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        
        <section class="section">
            <div class="section-header">
                <h1>{{ $viewData['title'] }}</h1>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Tableau de bord</a></div>
                  <div class="breadcrumb-item"><a href="{{ route('pieces.index')}}">Pièces</a></div>
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
                        <form method="post" action="{{ route('pieces.store')}}" enctype="multipart/form-data">
                            @csrf
                          <div class="card-header">
                            <h4>{{$viewData['title']}}</h4>
                            <div class="card-header-action">
                                <a href="{{ route('pieces.index')}}" class="btn btn-icon icon-left btn-info"><i class="fas fa-list-alt"></i> Afficher les pièces</a>
                            </div> 
                          </div>
                          <div class="card-body">
                            <div class="form-group">
                              <label>Choisir une catégorie</label>
                              <select name="category_id" class="form-control selectpicker" id="annee_id" data-show-subtext="true" data-live-search="true" required>

                                @foreach ($viewData['categories'] as $category)

                                  <option value="{{ $category->id }}">{{ $category->nom }}</option>

                                @endforeach
                               
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Choisir un emplacement</label>
                              <select name="emplacement_id" class="form-control selectpicker" id="emplacement_id" data-show-subtext="true" data-live-search="true" required>

                                @foreach ($viewData['emplacements'] as $emplacement)

                                  <option value="{{ $emplacement->id }}">{{ $emplacement->nom }}</option>

                                @endforeach
                               
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Part number</label>
                              <input type="text" class="form-control" name="numero" value="{{ old('numero') }}" placeholder="" required="">
                            </div>
                            <div class="form-group">
                              <label>Designation</label>
                              <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="" required="">
                            </div>
                          
                            <div class="form-group">
                              <label>Stock disponible</label>
                              <input type="number" class="form-control" name="stock" value="{{ old('stock') }}" placeholder="" required="">
                            </div>
                          </div>
                          <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
          </div>
        </section>
    </div>

@endsection