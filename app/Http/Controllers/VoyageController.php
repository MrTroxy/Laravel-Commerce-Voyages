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
            $tousLesVoyages = Voyage::all();
            $nombreVoyages = $tousLesVoyages->count();
       
            return view('/client/voyage/afficher')->with("tousLesVoyages", $tousLesVoyages)
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


    //Affichage de la liste des voyages de l'administration
    public function adminVoyages(Request $request)
    {
        if ($request->session()->get('admin')==1)
        {
            $tousLesVoyages = Voyage::all();
            $nombreVoyages = $tousLesVoyages->count();
            $tousLesDepartements = Departement::all();
            $toutesLesCategories = Categorie::all();
            return view('administrationVoyages')->with("tousLesVoyages", $tousLesVoyages)
                                                ->with("nombreVoyages", $nombreVoyages)
                                                ->with('tousLesDepartements', $tousLesDepartements)
                                                ->with('toutesLesCategories', $toutesLesCategories);
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }


    //Affichage des détails d'un voyage de l'administration
    public function adminDetailsVoyage(Request $request, $id)
    {
        if ($request->session()->get('admin')==1)
        {
            $voyage = Voyage::find($id);
            return view('administrationDetailsVoyage')->with('voyage', $voyage);
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }


    //Fonction d'ajout d'un voyage de l'administration
    public function adminAjouterVoyage(Request $request)
    {
        if ($request->session()->get('admin')==1)
        {
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
            ]);

            $voyage = Voyage::where('nomVoyage', $request->input('nomVoyage'))->count();

            if ($voyage == 0)
            {
                $nouveauVoyage = new Voyage;
                $nouveauVoyage->nomVoyage = $request->input('nomVoyage');
                $nouveauVoyage->dateDebut = $request->input('dateDebut');
                $nouveauVoyage->duree = $request->input('duree');
                $nouveauVoyage->ville = $request->input('ville');
                $nouveauVoyage->prix = $request->input('prix');
                $nouveauVoyage->departement_id = $request->input('departement');
                $nouveauVoyage->categorie_id = $request->input('categorie');
                $nouveauVoyage->save();

                return redirect()->route('voyages.admin')->with('message', 'Voyage ajouté.');
            }
            else
            {
                return redirect()->route('voyages.admin')->with('message', 'Voyage possédant ce nom existant.');
            }
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }


    //Fonction de modification d'un voyage de l'administration
    public function adminModifierVoyage(Request $request)
    {
        if ($request->session()->get('admin')==1)
        {
            // Valdation des données
            $request->validate
            ([
                'dateDebut' => ['required', 'date'],
                'duree' => ['required', 'integer', 'min:1'],
                'ville' => ['required', 'string', 'min:3', 'max:24'],
                'prix' => ['required', 'numeric', 'min:1'],
                'departement' => ['required', 'integer'],
                'categorie' => ['required', 'integer'],
                'id' => ['required', 'integer'],
            ]);

            $voyage = Voyage::find($request->input('id'));
            $voyage->dateDebut = $request->input('dateDebut');
            $voyage->duree = $request->input('duree');
            $voyage->ville = $request->input('ville');
            $voyage->prix = $request->input('prix');
            $voyage->departement_id = $request->input('departement');
            $voyage->categorie_id = $request->input('categorie');
            $voyage->save();
            return redirect()->route('voyages.admin')->with('message', 'Voyage modifié.');
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }

    
    //Fonction de suppression d'un voyage de l'administration
    public function adminSupprimerVoyage(Request $request, $id)
    {
        if ($request->session()->get('admin')==1)
        {
            $ventes = Vente::where('voyage_id', $id)->count();
            if ($ventes == 0)
            {
                $voyage = Voyage::find($id);
                $voyage->delete();
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

    public function adminLister(Request $request)
    {
        if ($request->session()->get('admin')==1)
        {
            $tousLesVoyages = Voyage::all();
            $nombreVoyages = $tousLesVoyages->count();
            return view('admin.voyage.lister')->with("tousLesVoyages", $tousLesVoyages)
                                                ->with("nombreVoyages", $nombreVoyages);
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }
}


