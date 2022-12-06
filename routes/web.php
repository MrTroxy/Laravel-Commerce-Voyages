<?php
/*
Auteur : David Tremblay
Date : Décembre 2022
Description : Routes de l'application YvanD Voyages assurant la gestion vers les controleurs
*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\VenteController;

// Routes d'authentification
Route::get('/connecter',            [Controller::class, 'connecter'])->name('connecter');
Route::post('/authentification',    [Controller::class, 'authentification'])->name('authentification');
Route::get('/deconnecter',          [Controller::class, 'deconnecter'])->name('deconnecter');



// ROUTES Application e-commerce
// ... pour la gestion des voyages
Route::get('/',                     [VoyageController::class, 'afficher'])->name('voyage.afficher');
Route::get('/apropos',              [VoyageController::class, 'apropos'])->name('voyage.apropos');
Route::get('/voyage',               [VoyageController::class, 'afficher'])->name('voyage.afficher');
Route::get('voyage/detailler/{id}', [VoyageController::class, 'detailler'])->name('voyage.detailler');

// ... pour les clients
Route::get('/client/creer',   [ClientController::class, 'creer'])->name('client.creer');
Route::post('/client/inscrire',     [ClientController::class, 'inscrire'])->name('client.inscrire');

Route::get('/client/modifierCompte',    [ClientController::class, 'modifierCompte'])->name('client.modifierCompte');
Route::post('/client/modifier',         [ClientController::class, 'modifier'])->name('client.modifier');

// ... pour le panier
Route::get('/panier/ajouter/{id}',                          [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::get('/panier/afficher',                              [PanierController::class, 'afficher'])->name('panier.afficher');
Route::get('/panier/supprimer/{id}',                        [PanierController::class, 'supprimer'])->name('panier.supprimer');
Route::get('/panier/vider',                                 [PanierController::class, 'vider'])->name('panier.vider');
Route::get('/panier/modifier/quantite/{id}/{operation}',    [PanierController::class, 'modifierQuantite'])->name('panier.modifierQuantite');
Route::get('/panier/commande/payer',                        [PanierController::class, 'payer'])->name('panier.payer');
Route::post('/panier/commande/valider',                     [PanierController::class, 'valider'])->name('panier.valider');
Route::get('/panier/historique',                            [PanierController::class, 'historique'])->name('panier.historique');



// ROUTES Application administrateur
// ... pour l'Administration des clients
Route::get('/admin/client/lister',          [ClientController::class, 'adminLister'])->name('admin.client.lister');
// Route pour la modification d'un client
Route::get('/admin/client/detailler/{id}',   [ClientController::class, 'adminDetailler'])->name('admin.client.detailler');
Route::post('/admin/client/modifier',       [ClientController::class, 'adminModifier'])->name('admin.client.modifier');
Route::get('/admin/client/supprimer/{id}',  [ClientController::class, 'adminSupprimer'])->name('admin.client.supprimer');
Route::get('/admin/client/creer',       [ClientController::class, 'adminCreer'])->name('admin.client.creer');
Route::post('/admin/client/inscrire',           [ClientController::class, 'adminInscrire'])->name('admin.client.inscrire');

// Routes pour l'Administration des voyages
Route::get('/admin/voyage/lister',          [VoyageController::class, 'adminLister'])->name('admin.voyage.lister');
Route::get('/admin/voyage/ajouter',         [VoyageController::class, 'adminAjouter'])->name('admin.voyage.ajouter');
Route::post('/admin/voyage/modifier/{id}',  [VoyageController::class, 'adminModifier'])->name('admin.voyage.modifier');
Route::get('/admin/voyage/supprimer/{id}',  [VoyageController::class, 'adminSupprimer'])->name('admin.voyage.supprimer');
Route::get('/admin/voyage/creer',       [VoyageController::class, 'adminCreer'])->name('admin.voyage.creer');
Route::post('/admin/voyage/inscrire',           [VoyageController::class, 'adminInscrire'])->name('admin.client.inscrire');

// Routes pour l'Administration des ventes
Route::get('/admin/vente/lister',           [VenteController::class, 'adminLister'])->name('admin.vente.lister');

