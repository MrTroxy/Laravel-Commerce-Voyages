<?php
/*
Auteur : David Tremblay
Date : Décembre 2022
Description : Controleur du modèle Voyage
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voyage;
use App\Models\Vente;
use App\Models\Departement;
use App\Models\Categorie;

class VoyageController extends Controller
{
    //Affichage de la page à propos
    public function apropos()
    {
        return view('/client/apropos');
    }

    //Affichage de la vitrine de voyages
    public function afficher()
    {
            $lesVoyages = Voyage::all();
            $nombreVoyages = $lesVoyages->count();
       
            return view('/client/voyage/afficher')->with("lesVoyages", $lesVoyages)
                                                    ->with("nombreVoyages", $nombreVoyages);
    }

    //Affichage des détails d'un voyage
    public function detailler($id)
    {
        $unVoyage = Voyage::find($id);
        $saCategorie = $unVoyage->saCategorie;
        $sonDepartement = $unVoyage->sonDepartement;

        $unDepartement = Departement::find($sonDepartement->id);
        $saRegion = $unDepartement->saRegion;

        return view('/client/voyage/detailler')->with('unVoyage', $unVoyage)
                                                ->with('saCategorie', $saCategorie)
                                                ->with('sonDepartement', $sonDepartement)
                                                ->with('saRegion', $saRegion);
    }

    // Fonction d'affichage des voyages de l'administration
    public function adminLister(Request $request)
    {
        if ($request->session()->get('admin')==1)
        {
            $lesVoyages = Voyage::all();
            $nombreVoyages = $lesVoyages->count();
            return view('admin.voyage.lister')->with("lesVoyages", $lesVoyages)
                                                ->with("nombreVoyages", $nombreVoyages);
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }

    // Fonction pour l'ajout d'un voyage dans l'administration
    public function adminCreer(Request $request)
    {
        if ($request->session()->get('admin') == 1)
        {
            $lesDepartements = Departement::all();
            $lesCategories = Categorie::all();
            return view('admin/voyage/inscrire')->with('lesDepartements', $lesDepartements)
                                          ->with('lesCategories', $lesCategories);
        }
    }

    // Fonction pour l'inscription d'un voyage dans l'administration
    public function adminInscrire(Request $request)
    {
        if ($request->session()->get('admin') == 1)
        {
            // Valdation des données
            $request->validate
            ([
                'nomVoyage' => ['required', 'string', 'min:3', 'max:41' ], 
                'dateDebut' => ['required', 'date'],
                'duree' => ['required', 'integer', 'min:1'],
                'ville' => ['required', 'string', 'min:3', 'max:24'],
                'prix' => ['required', 'numeric', 'min:1'],
                'imgLink' => ['required', 'string', 'min:3', 'max:1000'],
                'departement' => ['required', 'integer'],
                'categorie' => ['required', 'integer']
            ]);

            $unVoyage = Voyage::where('nomVoyage', $request->input('nomVoyage'))->count();

            if ($unVoyage == 0)
            {
                $nouveauVoyage = new Voyage;
                $nouveauVoyage->nomVoyage = $request->input('nomVoyage');
                $nouveauVoyage->dateDebut = $request->input('dateDebut');
                $nouveauVoyage->duree = $request->input('duree');
                $nouveauVoyage->ville = $request->input('ville');
                $nouveauVoyage->prix = $request->input('prix');
                $nouveauVoyage->imgLink = $request->input('imgLink');
                $nouveauVoyage->departement_id = $request->input('departement');
                $nouveauVoyage->categorie_id = $request->input('categorie');
                $nouveauVoyage->save();

                $lesVoyages = Voyage::all();

                return redirect()->route('admin.voyage.lister')->with('message', 'Le voyage à bien été ajouté')
                                                               ->with('lesClients', $lesVoyages);
            }
            else
            {
                return redirect()->route('admin.voyage.lister')->with('message', 'Voyage possédant ce nom existant.');
            }
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }


    //Fonction d'affichage des détails d'un voyage de l'administration
    public function adminDetailler(Request $request, $id)
    {
        if ($request->session()->get('admin') == 1)
        {
            $lesDepartements = Departement::all();
            $lesCategories = Categorie::all();
            $unVoyage = Voyage::where('id', '=', $id)->first();
            return view('admin/voyage/detailler')->with('lesDepartements', $lesDepartements)
                                                        ->with('lesCategories', $lesCategories)
                                                        ->with('unVoyage', $unVoyage);
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }


    //Fonction de modification d'un voyage de l'administration
    public function adminModifier(Request $request)
    {
        if ($request->session()->get('admin') == 1)
        {
            // Valdation des données
            // Valdation des données
            $request->validate
            ([
                'nomVoyage' => ['required', 'string', 'min:3', 'max:41' ],
                'dateDebut' => ['required', 'date'],
                'duree' => ['required', 'integer', 'min:1'],
                'ville' => ['required', 'string', 'min:3', 'max:24'],
                'prix' => ['required', 'numeric', 'min:1'],
                'departement' => ['required', 'integer'],
                'categorie' => ['required', 'integer'],
                'imgLink' => ['required', 'string', 'min:3', 'max:1000'],
                'id' => ['required', 'integer']
            ]);

            $unVoyage = Voyage::find($request->input('id'));
            $unVoyage->nomVoyage = $request->input('nomVoyage');
            $unVoyage->dateDebut = $request->input('dateDebut');
            $unVoyage->duree = $request->input('duree');
            $unVoyage->ville = $request->input('ville');
            $unVoyage->prix = $request->input('prix');
            $unVoyage->departement_id = $request->input('departement');
            $unVoyage->categorie_id = $request->input('categorie');
            $unVoyage->imgLink = $request->input('imgLink');
            $unVoyage->save();

            $lesVoyages = Voyage::all();
            return redirect()->route('admin.voyage.lister')->with('message', 'Les informations ont bien été enregistrées')
                                                            ->with('lesVoyages', $lesVoyages);
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }
    
    //Fonction de suppression d'un voyage de l'administration
    public function adminSupprimer(Request $request, $id)
    {
        if ($request->session()->get('admin')==1)
        {
            $lesVentes = Vente::where('voyage_id', $id)->count();
            if ($lesVentes == 0)
            {
                $unVoyage = Voyage::find($id);
                $unVoyage->delete();
                return back()->with('message', 'Voyage supprimé.');  
            }
            else
            {
                return back()->with('message', 'Impossible de supprimer le voyage. Ventes associées!');
            }
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }

    }

}


