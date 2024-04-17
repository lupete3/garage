<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmplacementController;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\SortyController;
use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/fiches/pieces-stock', [DashboardController::class, 'pieces'])->middleware(['auth', 'verified'])->name('fiches.pieces');
    Route::post('/fiches/pieces-stock-emplacement', [DashboardController::class, 'piecesEmplacement'])->middleware(['auth', 'verified'])->name('fiches.piecesEmplacement');
    
    Route::get('/fiches/entree-stock-journalier', [DashboardController::class, 'entreeStockJour'])->middleware(['auth', 'verified'])->name('fiches.entreeStockJour');
    Route::get('/fiches/entree-stock-hebdomadaire', [DashboardController::class, 'entreeStockHebdo'])->middleware(['auth', 'verified'])->name('fiches.entreeStockHebdo');
    Route::get('/fiches/entree-stock-annuel', [DashboardController::class, 'entreeStockAnnuel'])->middleware(['auth', 'verified'])->name('fiches.entreeStockAnnuel');
    Route::post('/fiches/entree-stock-personnalise', [DashboardController::class, 'entreeStockDate'])->middleware(['auth', 'verified'])->name('fiches.entreeStockDate');
    Route::get('/fiches/entree-stock-all', [DashboardController::class, 'entreeStockAll'])->middleware(['auth', 'verified'])->name('fiches.entreeStockAll');
    Route::post('/fiches/entree-stock-piece', [DashboardController::class, 'entreeStockPiece'])->middleware(['auth', 'verified'])->name('fiches.entreeStockPiece');

    Route::get('/fiches/sorties-stock-journalier', [DashboardController::class, 'sortieStockJour'])->middleware(['auth', 'verified'])->name('fiches.sortieStockJour');
    Route::get('/fiches/sorties-stock-hebdomadaire', [DashboardController::class, 'sortieStockHebdo'])->middleware(['auth', 'verified'])->name('fiches.sortieStockHebdo');
    Route::get('/fiches/sorties-stock-annuel', [DashboardController::class, 'sortieStockAnnuel'])->middleware(['auth', 'verified'])->name('fiches.sortieStockAnnuel');
    Route::post('/fiches/sorties-stock-personnalise', [DashboardController::class, 'sortieStockDate'])->middleware(['auth', 'verified'])->name('fiches.sortieStockDate');
    Route::post('/fiches/sorties-stock-vehicule', [DashboardController::class, 'sortieStockVehicule'])->middleware(['auth', 'verified'])->name('fiches.sortieStockVehicule');
    Route::post('/fiches/sorties-stock-piece', [DashboardController::class, 'sortieStockPiece'])->middleware(['auth', 'verified'])->name('fiches.sortieStockPiece');
    Route::get('/fiches/sorties-stock-all', [DashboardController::class, 'sortieStockAll'])->middleware(['auth', 'verified'])->name('fiches.sortieStockAll');

    Route::get('/emplacements', [EmplacementController::class, 'index'])->name('emplacements.index');
    Route::post('/emplacements/store', [EmplacementController::class, 'store'])->name('emplacements.store');
    Route::get('/emplacements/create', [EmplacementController::class, 'create'])->name('emplacements.create');
    Route::get('/emplacements/{emplacement}/edit', [EmplacementController::class, 'edit'])->name('emplacements.edit');
    Route::put('/emplacements/{emplacement}/update', [EmplacementController::class, 'update'])->name('emplacements.update');
    Route::post('/emplacements/{emplacement}/destroy', [EmplacementController::class, 'destroy'])->name('emplacements.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::post('/categories/{category}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/vehicules', [VehiculeController::class, 'index'])->name('vehicules.index');
    Route::post('/vehicules/store', [VehiculeController::class, 'store'])->name('vehicules.store');
    Route::get('/vehicules/create', [VehiculeController::class, 'create'])->name('vehicules.create');
    Route::get('/vehicules/{vehicule}/edit', [VehiculeController::class, 'edit'])->name('vehicules.edit');
    Route::put('/vehicules/{vehicule}/update', [VehiculeController::class, 'update'])->name('vehicules.update');
    Route::post('/vehicules/{vehicule}/destroy', [VehiculeController::class, 'destroy'])->name('vehicules.destroy');

    Route::get('/pieces', [PieceController::class, 'index'])->name('pieces.index');
    Route::post('/pieces/store', [PieceController::class, 'store'])->name('pieces.store');
    Route::get('/pieces/create', [PieceController::class, 'create'])->name('pieces.create');
    Route::get('/pieces/{piece}/edit', [PieceController::class, 'edit'])->name('pieces.edit');
    Route::put('/pieces/{piece}/update', [PieceController::class, 'update'])->name('pieces.update');
    Route::post('/pieces/{piece}/destroy', [PieceController::class, 'destroy'])->name('pieces.destroy');

    Route::get('/entrees', [EntreeController::class, 'index'])->name('entrees.index');
    Route::post('/entrees/store', [EntreeController::class, 'store'])->name('entrees.store');
    Route::get('/entrees/create', [EntreeController::class, 'create'])->name('entrees.create');
    Route::get('/entrees/{entree}/edit', [EntreeController::class, 'edit'])->name('entrees.edit');
    Route::put('/entrees/{entree}/update', [EntreeController::class, 'update'])->name('entrees.update');
    Route::post('/entrees/{entree}/destroy', [EntreeController::class, 'destroy'])->name('entrees.destroy');

    Route::get('/sorties', [SortyController::class, 'index'])->name('sorties.index');
    Route::post('/sorties/store', [SortyController::class, 'store'])->name('sorties.store');
    Route::get('/sorties/create', [SortyController::class, 'create'])->name('sorties.create');
    Route::get('/sorties/{sorty}/edit', [SortyController::class, 'edit'])->name('sorties.edit');
    Route::put('/sorties/{sorty}/update', [SortyController::class, 'update'])->name('sorties.update');
    Route::post('/sorties/{sorty}/destroy', [SortyController::class, 'destroy'])->name('sorties.destroy');
    Route::get('/sorties/{sorty}/validated', [SortyController::class, 'validated'])->name('sorties.validate');
    Route::post('/sorties/{sorty}/trash', [SortyController::class, 'trash'])->name('sorties.trash');

    Route::get('/utilisateurs', [DashboardController::class, 'usersIndex'])->name('dashboard.usersIndex');
    Route::get('/utilisateurs/{user}/valider', [DashboardController::class, 'usersValidate'])->name('dashboard.usersValidate');
    Route::post('/utilisateurs/{user}/supprimer', [DashboardController::class, 'usersDelete'])->name('dashboard.usersDelete');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route to 404 page not found
Route::fallback(function(){
    $vieData['title'] = 'Erreur 404';
    return view('404')->with('viewData',$vieData);
});

require __DIR__.'/auth.php';
