<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $viewData['title'] }}</title>
 
  <!-- Bootstrap Select -->
  <link rel="stylesheet" href="{{asset('assets/backend/bootstrap-select/dist/css/bootstrap.min.css ')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/bootstrap-select/dist/css/bootstrap-select.min.css ')}}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/backend/modules/bootstrap/css/bootstrap.min.css ')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/modules/fontawesome/css/all.min.css ')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/backend/modules/jqvmap/dist/jqvmap.min.css ')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/modules/weather-icon/css/weather-icons.min.css ')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/modules/weather-icon/css/weather-icons-wind.min.css ')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/modules/summernote/summernote-bs4.css ')}}">

  <link rel="stylesheet" href="{{asset('assets/backend/modules/dataemplacements/dataemplacements.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/modules/dataemplacements/Dataemplacements-1.10.16/css/dataemplacements.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/modules/dataemplacements/Select-1.2.4/css/select.bootstrap4.min.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/backend/css/style.css ')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/css/components.css ')}}">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/backend/modules/ionicons/css/ionicons.min.css ')}}">

  <!-- Bootstrap-Iconpicker -->
<link rel="stylesheet" href="{{asset('assets/backend/modules/bootstrap-iconpicker/dist/css/bootstrap-iconpicker.min.css ')}}"/>

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar valider">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            
            <div class="search-backdrop"></div>
            
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('assets/backend/img/avatar/avatar-1.png ')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Salut, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Récemment connecté</div>
              <a href="{{route('profile.edit')}}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
             
              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                </a>
            </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2 valider">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('dashboard')}}">Tableau de Bord</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Tableau de Bord</li>
            
            <li class=" @if (request()->routeIs('dashboard')) active @endif ">

              <a href="{{ route('dashboard') }}" class="nav-link "><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
             
            </li>
            
            <li class="dropdown @if (request()->routeIs('emplacements.index', 'emplacements.create', 'emplacements.edit')) active @endif " >
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion-help-buoy"></i> <span>EMPLACEMENTS</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('emplacements.create')}}">Ajouter un emplacement</a></li>
                <li><a class="nav-link" href="{{route('emplacements.index')}}">Liste des emplacements</a></li>
              </ul>
            </li>
            
            <li class="dropdown @if (request()->routeIs('categories.index', 'categories.create', 'categories.edit')) active @endif " >
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion-ios-bookmarks"></i> <span>CATEGORIES PIECES</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('categories.create')}}">Ajouter une catégorie</a></li>
                <li><a class="nav-link" href="{{route('categories.index')}}">Liste des catégories</a></li>
              </ul>
            </li>
            
            <li class="dropdown @if (request()->routeIs('vehicules.index', 'vehicules.create', 'vehicules.edit')) active @endif " >
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion-model-s"></i> <span>VEHICULES</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('vehicules.create')}}">Ajouter un véhicule</a></li>
                <li><a class="nav-link" href="{{route('vehicules.index')}}">Liste des véhicules</a></li>
              </ul>
            </li>

            <li class="dropdown @if (request()->routeIs('pieces.index', 'pieces.create', 'pieces.edit')) active @endif " >
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion-android-settings"></i> <span>PIECES EN STOCK</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('pieces.create')}}">Ajouter une pièce</a></li>
                <li><a class="nav-link" href="{{route('pieces.index')}}">Liste des pièces</a></li>
              </ul>
            </li>

            <li class="dropdown @if (request()->routeIs('entrees.index', 'entrees.create', 'entrees.edit')) active @endif " >
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion-ios-upload"></i> <span>ENTREES MAGASIN</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('entrees.create')}}">Ajouter une entrée</a></li>
                <li><a class="nav-link" href="{{route('entrees.index')}}">Historique des entrées magasin</a></li>
              </ul>
            </li>

            <li class="dropdown @if (request()->routeIs('sorties.index', 'sorties.create', 'sorties.edit')) active @endif " >
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion-ios-download"></i> <span>SORTIES MAGASIN</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('sorties.create')}}">Ajouter une sortie magasin</a></li>
                <li><a class="nav-link" href="{{route('sorties.index')}}">Historique des sorties magasins</a></li>
              </ul>
            </li>

            <li class="dropdown @if (request()->routeIs('fiches.pieces','fiches.entreeStockJour', 'fiches.entreeStockAll', 'fiches.sortieStockJour', 'fiches.sortieStockAll')) active @endif " >
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion-pie-graph"></i> <span>RAPPORTS</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('fiches.pieces')}}">Fiche des pièces en stock</a></li>
                <li><a class="nav-link" href="{{route('fiches.entreeStockAll')}}">Fiche entrée en stock</a></li>
                <li><a class="nav-link" href="{{route('fiches.sortieStockAll')}}">Fiche sorties en stock</a></li>
              </ul>
            </li>

            <li class="dropdown @if (request()->routeIs('dashboard.usersIndex')) active @endif " >
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users" style="font-size: 16px"></i> <span>UTILISATEURS</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('dashboard.usersIndex')}}">Liste des utilisateurs</a></li>
              </ul>
            </li>
          </ul>
     
        </aside>
      </div>

      @yield('content')

      <footer class="main-footer valider">
        <div class="footer-left">
          Copyright &copy; {{ date('Y') }} <div class="bullet"></div> <a href="pdevtuto.com" target="__blank">Garage Management</a> 
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <style>
    li i{
      font-size: 20px;
    }
  </style>

  <!-- General JS Scripts -->
  <script src="{{asset('assets/backend/modules/jquery.min.js')}}"></script>
  <script src="{{asset('assets/backend/modules/popper.js')}}"></script>
  <script src="{{asset('assets/backend/modules/tooltip.js')}}"></script>
  <script src="{{asset('assets/backend/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/backend/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/backend/modules/moment.min.js')}}"></script>
  <script src="{{asset('assets/backend/js/stisla.js')}}"></script>
  <script src="{{asset('assets/backend/js/bundle.js')}}"></script>

  
  <!-- JS Libraies -->
  <script src="{{asset('assets/backend/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
  <script src="{{asset('assets/backend/modules/chart.min.js')}}"></script>
  <script src="{{asset('assets/backend/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('assets/backend/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('assets/backend/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('assets/backend/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{asset('assets/backend/modules/dataemplacements/dataemplacements.min.js')}}"></script>
  <script src="{{asset('assets/backend/modules/dataemplacements/Dataemplacements-1.10.16/js/dataemplacements.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/backend/modules/dataemplacements/Select-1.2.4/js/dataemplacements.select.min.js')}}"></script>
  <script src="{{asset('assets/backend/modules/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('assets/backend/modules/jquery-selectric/jquery.selectric.min.js ')}}"></script>
  <script src="{{asset('assets/backend/modules/upload-preview/assets/js/jquery.uploadPreview.min.js ')}}"></script>
  <script src="{{asset('assets/backend/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js ')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('assets/backend/js/page/modules-dataemplacements.js')}}"></script>
  <script src="{{asset('assets/backend/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/backend/modules/upload-preview/assets/js/jquery.uploadPreview.min.js ')}}"></script>


  <!-- Page Specific JS File -->
  <script src="{{asset('assets/backend/js/page/index-0.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{asset('assets/backend/js/scripts.js')}}"></script>
  <script src="{{asset('assets/backend/js/custom.js')}}"></script>

  <!-- Bootstrap Select -->
  <script src="{{asset('assets/backend/bootstrap-select/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/backend/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>

  <script>
    $(document).ready(function(){
        $('.print').on('click',function(){
            $('.valider').hide();
            if (!window.print()) {
                $('.valider').show();
            };
        });
    });
  </script>

</body>
</html>