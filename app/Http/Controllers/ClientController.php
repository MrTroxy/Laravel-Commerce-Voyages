<?php
/*
Auteur : David Tremblay
Date : Décembre 2022
Description : Controleur du modèle Client
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Province;
use App\Models\PremierContact;
use App\Models\Vente;

class ClientController extends Controller
{
// ************************************************************************
// SECTION E-COMMERCE
// ************************************************************************

    //Fonction de connexion du client au site
    public function creerCompte(Request $request)
    {
        // Liste des provinces
        $lesProvinces = Province::all();
        $lesPremiersContact = PremierContact::all();
        return view('client/inscrire')->with('lesProvinces', $lesProvinces)
                                      ->with('lesPremiersContact', $lesPremiersContact);
    }

    //Fonction d'inscription du client au site et d'ajout d'un client de l'administration
    public function inscrire(Request $request)
    {
        // Valdation des données
        $request->validate
        ([
            'courriel' => ['required', 'string', 'min:5', 'max:35' ],    
            'prenom' => ['required', 'string',  'min:3', 'max:10'],
            'nom' => ['required', 'string',  'min:3', 'max:10'],      
            'adresse' => ['required', 'string',  'min:5', 'max:28'],      
            'ville' => ['required', 'string',  'min:2', 'max:30'], 
            'codePostal' => ['required', 'string',  'min:7', 'max:7'], 
            'telephone' => ['required', 'string',  'min:10', 'max:14'], 
            'genre' => ['required', 'string',  'min:1', 'max:1'], 
            'province' => ['required', 'integer'], 
            'premierContact' => ['required', 'integer']
        ]);

        // Récupération des infos et ajout à la BD
        $nouveauClient = new Client;
        $nouveauClient->courriel = $request->input('courriel');
        $nouveauClient->prenom = $request->input('prenom');
        $nouveauClient->nom = $request->input('nom');
        $nouveauClient->adresse = $request->input('adresse');
        $nouveauClient->ville = $request->input('ville');
        $nouveauClient->CP = $request->input('codePostal');
        $nouveauClient->telephone = $request->input('telephone');
        $nouveauClient->genre = $request->input('genre');
        $nouveauClient->province_id = $request->input('province');
        $nouveauClient->premierContact_id = $request->input('premierContact');

        // Vérification de l'unicité du courriel
        $client = Client::where('courriel', $nouveauClient->courriel)->first();
        if ($client != null)
        {
            return redirect()->back()->withInput()->with('message', 'Le courriel est déjà associé à un compte.');
        }
        // Vérification de l'unicité du téléphone
        $client = Client::where('telephone', $nouveauClient->telephone)->first();
        if ($client != null)
        {
            return redirect()->back()->withInput()->with('message', 'Le téléphone est déjà associé à un compte');
        }
        // Sinon, on ajoute le client à la BD
        else
        {
            $nouveauClient->save();
            return redirect()->route('connecter')->with('message', 'Votre compte a été créé avec succès');
        }
    }

    //Fonction pour aller sur la page de son compte
    public function modifierCompte(Request $request)
    {
        // Liste des provinces
        $lesProvinces = Province::all();
        $lesPremiersContact = PremierContact::all();
        $unClient = Client::where('courriel', '=', $request->session()->get('courriel'))->first();
        return view('client/modifier')->with('lesProvinces', $lesProvinces)
                                    ->with('lesPremiersContact', $lesPremiersContact)
                                    ->with('unClient', $unClient);
    }

    //Fonction pour modifier son compte
    public function modifier(Request $request)
    {
        // Valdation des données
        $request->validate
        ([
            'courriel' => ['required', 'string', 'min:5', 'max:35' ],    
            'prenom' => ['required', 'string',  'min:3', 'max:10'],
            'nom' => ['required', 'string',  'min:3', 'max:10'],      
            'adresse' => ['required', 'string',  'min:5', 'max:28'],      
            'ville' => ['required', 'string',  'min:2', 'max:30'], 
            'codePostal' => ['required', 'string',  'min:7', 'max:7'], 
            'telephone' => ['required', 'string',  'min:10', 'max:14'], 
            'genre' => ['required', 'string',  'min:1', 'max:1'], 
            'province' => ['required', 'integer'], 
            'premierContact' => ['required', 'integer']
        ]);

        // Récupération des infos et ajout à la BD
        $unClient = new Client;
        $unClient->courriel = $request->input('courriel');
        $unClient->prenom = $request->input('prenom');
        $unClient->nom = $request->input('nom');
        $unClient->adresse = $request->input('adresse');
        $unClient->ville = $request->input('ville');
        $unClient->CP = $request->input('codePostal');
        $unClient->telephone = $request->input('telephone');
        $unClient->genre = $request->input('genre');
        $unClient->province_id = $request->input('province');
        $unClient->premierContact_id = $request->input('premierContact');

        // Update des informations du client ou le courriel est egal au courriel de la session
        Client::where('courriel', '=', $request->session()->get('courriel'))->first()
        ->update(
            [
                'prenom' => $unClient->prenom,
                'nom' => $unClient->nom,
                'adresse' => $unClient->adresse,
                'ville' => $unClient->ville,
                'CP' => $unClient->CP,
                'telephone' => $unClient->telephone,
                'genre' => $unClient->genre,
                'province_id' => $unClient->province_id,
                'premierContact_id' => $unClient->premierContact_id
            ]
        );

        // Liste des provinces
        $lesProvinces = Province::all();
        $lesPremiersContact = PremierContact::all();
        $unClient = Client::where('courriel', '=', $request->session()->get('courriel'))->first();

        return redirect()->route('client.modifierCompte')->with('message', 'Les informations ont bien été enregistrées')
                                ->with('lesProvinces', $lesProvinces)
                                ->with('lesPremiersContact', $lesPremiersContact)
                                ->with('unClient', $unClient);

    }




// ************************************************************************
// SECTION ADMINISTRATION
// ************************************************************************

    //Fonction d'affichage de la liste des clients de l'administration
    public function adminLister(Request $request)
    {
        $tousLesClients = Client::all();
        if ($request->session()->get('admin')==1)
        {
            return view('admin/client/lister')->with('tousLesClients', $tousLesClients);
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }

    //Fonction d'affichage des détails de l'administration
    public function adminDetailler(Request $request, $id)
    {
        if ($request->session()->get('admin') == 1)
        {
            $lesProvinces = Province::all();
            $lesPremiersContact = PremierContact::all();
            $unClient = Client::where('id', '=', $id)->first();
            return view('admin/client/detailler')->with('lesProvinces', $lesProvinces)
                                                        ->with('lesPremiersContact', $lesPremiersContact)
                                                        ->with('unClient', $unClient);
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }


    //Fonction de modification d'un client de l'administration
    public function adminModifier(Request $request)
    {
        if ($request->session()->get('admin') == 1)
        {
            // Valdation des données
            $request->validate
            ([
                'courriel' => ['required', 'string', 'min:5', 'max:50' ],
                'prenom' => ['required', 'string',  'min:3', 'max:10'],
                'nom' => ['required', 'string',  'min:3', 'max:10'],      
                'adresse' => ['required', 'string',  'min:5', 'max:28'],      
                'ville' => ['required', 'string',  'min:2', 'max:19'], 
                'codePostal' => ['required', 'string',  'min:7', 'max:7'], 
                'telephone' => ['required', 'string',  'min:10', 'max:14'], 
                'genre' => ['required', 'string',  'min:1', 'max:1'], 
                'province' => ['required', 'integer'], 
                'premierContact' => ['required', 'integer'],
                'id' => ['required', 'integer']
            ]);

            $unClient = Client::where('id', '=', $request->input('id'))->first();
            $unClient->courriel = $request->input('courriel');
            $unClient->prenom = $request->input('prenom');
            $unClient->nom = $request->input('nom');
            $unClient->adresse = $request->input('adresse');
            $unClient->ville = $request->input('ville');
            $unClient->CP = $request->input('codePostal');
            $unClient->telephone = $request->input('telephone');
            $unClient->genre = $request->input('genre');
            $unClient->province_id = $request->input('province');
            $unClient->premierContact_id = $request->input('premierContact');
            $unClient->save();
            $tousLesClients = Client::all();
            return redirect()->route('admin.client.lister')->with('message', 'Les informations ont bien été enregistrées')
                                                            ->with('tousLesClients', $tousLesClients);
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }

    // Fonction pour l'ajout d'un client dans l'administration
    public function adminCreerCompte(Request $request)
    {
        if ($request->session()->get('admin') == 1)
        {
            $lesProvinces = Province::all();
            $lesPremiersContact = PremierContact::all();
            return view('admin/client/inscrire')->with('lesProvinces', $lesProvinces)
                                          ->with('lesPremiersContact', $lesPremiersContact);
        }
    }

    // Fonction pour l'ajout d'un client dans l'administration
    public function adminInscrire(Request $request)
    {
        if ($request->session()->get('admin') == 1)
        {
            // Valdation des données
            $request->validate
            ([
                'courriel' => ['required', 'string', 'min:5', 'max:50' ],
                'prenom' => ['required', 'string',  'min:3', 'max:10'],
                'nom' => ['required', 'string',  'min:3', 'max:10'],      
                'adresse' => ['required', 'string',  'min:5', 'max:28'],      
                'ville' => ['required', 'string',  'min:2', 'max:19'], 
                'codePostal' => ['required', 'string',  'min:7', 'max:7'], 
                'telephone' => ['required', 'string',  'min:10', 'max:14'], 
                'genre' => ['required', 'string',  'min:1', 'max:1'], 
                'province' => ['required', 'integer'], 
                'premierContact' => ['required', 'integer'],
                'admin' => ['required', 'integer']
            ]);

            $unClient = new Client();
            $unClient->courriel = $request->input('courriel');
            $unClient->prenom = $request->input('prenom');
            $unClient->nom = $request->input('nom');
            $unClient->adresse = $request->input('adresse');
            $unClient->ville = $request->input('ville');
            $unClient->CP = $request->input('codePostal');
            $unClient->telephone = $request->input('telephone');
            $unClient->genre = $request->input('genre');
            $unClient->province_id = $request->input('province');
            $unClient->premierContact_id = $request->input('premierContact');
            $unClient->admin = $request->input('admin');
            $unClient->save();
            $tousLesClients = Client::all();
            return redirect()->route('admin.client.lister')->with('message', 'Le client à bien été ajouté')
                                                            ->with('tousLesClients', $tousLesClients);
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }


    //Fonction de suppression d'un client de l'administration
    public function adminSupprimer(Request $request, $id)
    {
        if ($request->session()->get('admin') == 1)
        {
            $lesVentes = Vente::where('client_id', $id)->count();
            if ($lesVentes == 0)
            {
                $unClient = Client::find($id);
                $unClient->delete();
                return back()->with('message', 'Client supprimé.');  
            }
            else
            {
                return back()->with('message', 'Impossible de supprimer le client. Ventes associées!');
            }
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }
}
