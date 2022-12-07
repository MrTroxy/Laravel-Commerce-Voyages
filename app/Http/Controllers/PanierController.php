<?php
/*
Auteur : David Tremblay
Date : Décembre 2022
Description : Controleur du modèle Panier
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Client;
use App\Models\Voyage;
use App\Models\Province;
use App\Models\Vente;
use App\Models\Paiement;

class PanierController extends Controller
{
    // Fonction qui permet a un client de voir son panier
    // Le panier contient tous les voyages qu'il a dans son panier
    public function afficher(Request $request)
    {
        $etat_session;
        // Vérifier si le client est connecté
        if ($request->session()->has('courriel'))
        {
            // Récupérer le client connecté
            $unClient = Client::where('courriel', '=', $request->session()->get('courriel'))->first();
            $unPanier = Panier::where('client_id', '=', $unClient->id)->get();
            $unPanier->ip_client = $request->ip();
            Panier::where('ip_client', '=', $request->ip())->update(['client_id' => $unClient->id]);
            $etat_session = true;
            // rafrachir le panier
            $unPanier = Panier::where('client_id', '=', $unClient->id)->get();
        }
        // Sinon, on affiche le panier avec l'ip du client
        else
        {
            $unPanier = Panier::where('ip_client', '=', $request->ip())->get();
            $etat_session = false;
        }

        //Obtenir les voyages du panier et la quantité
        $lesVoyagesDuPanier = $unPanier->map(function ($item)
        {
            $unVoyage = Voyage::find($item->voyage_id);
            $unVoyage->quantite = $item->quantite;
            return $unVoyage;
        });

        return view('/client/panier/afficher')->with('lesVoyagesDuPanier', $lesVoyagesDuPanier)
                                              ->with('nombreDeVoyages', $lesVoyagesDuPanier->count())
                                              ->with('etat_session', $etat_session);
    }

    // Fonction qui permet d'ajouter un voyage dans le panier du client
    public function ajouter(Request $request)
    {
        $etat_session;
        // Vérifier si le client est connecté
        if ($request->session()->has('courriel'))
        {
            // Récupérer le client connecté
            $unClient = Client::where('courriel', '=', $request->session()->get('courriel'))->first();
            $unPanier = Panier::where('client_id', '=', $unClient->id)->get();
            $etat_session = true;
        }
        // Sinon, on affiche le panier avec l'ip du client
        else
        {
            $unPanier = Panier::where('ip_client', '=', $request->ip())->get();
            $etat_session = false;
        }

        // Vérifier si il y a deja un voyage dans le panier
        if ($unPanier->count() < 1)
        {
            $unPanier = new Panier();
            $unPanier->ip_client = $request->ip();
            if ($etat_session)
            {
                $unPanier->client_id = $unClient->id;
            }
            $unPanier->voyage_id = $request->id;
            $unPanier->quantite = 1;
            $unPanier->save();

            return redirect()->route('panier.afficher');
        }
        else // Sinon, on affiche un message d'erreur
        {
            return redirect()->route('voyage.afficher')->with('message', 'Il y a deja un voyage dans le panier, veuillez le supprimer pour en ajouter un autre');
        }
    }

    // Fonction qui permet de supprimer un voyage du panier du client
    public function supprimer(Request $request)
    {
        $etat_session;
        // Vérifier si le client est connecté
        if ($request->session()->has('courriel'))
        {
            // Récupérer le client connecté
            $unClient = Client::where('courriel', '=', $request->session()->get('courriel'))->first();
            $unPanier = Panier::where('client_id', '=', $unClient->id)
                            ->where('voyage_id', '=', $request->id)
                            ->first();
            $etat_session = true;
        }
        // Sinon, on affiche le panier avec l'ip du client
        else
        {
            $unPanier = Panier::where('ip_client', '=', $request->ip())->get();
            $unPanier = Panier::where('ip_client', '=', $request->ip())
                            ->where('voyage_id', '=', $request->id)
                            ->first();
            $etat_session = false;
        }

        $unPanier->delete();

        return redirect()->route('panier.afficher');
    }

    // Fonction qui permet de modifier la quantité de participants d'un voyage dans le panier du client
    public function modifierQuantite(Request $request)
    {
        $etat_session;
        // Vérifier si le client est connecté
        if ($request->session()->has('courriel'))
        {
            // Récupérer le client connecté
            $unClient = Client::where('courriel', '=', $request->session()->get('courriel'))->first();
            $unPanier = Panier::where('client_id', '=', $unClient->id)
                            ->where('voyage_id', '=', $request->id)
                            ->first();
            $etat_session = true;
        }
        // Sinon, on affiche le panier avec l'ip du client
        else
        {
            $unPanier = Panier::where('ip_client', '=', $request->ip())->get();
            $unPanier = Panier::where('ip_client', '=', $request->ip())
                            ->where('voyage_id', '=', $request->id)
                            ->first();
            $etat_session = false;
        }
        
        $quantiteAvant = $unPanier->quantite;
        $quantiteApres;

        if ($request->operation == 'augmenter') { $quantiteApres = $quantiteAvant + 1; }
        else if ($request->operation == 'diminuer')
        {
            if ($quantiteAvant > 1)
            {
                $quantiteApres = $quantiteAvant - 1;
            }
            else
            {
                return redirect()->back()->withInput()
                                         ->with('message', 'Vous ne pouvez pas avoir moins de 1 participant');
            }
        }
        $unPanier->quantite = $quantiteApres;
        $unPanier->save();

        return redirect()->route('panier.afficher');
    }

    // Fonction qui permet passer a la page de paiement
    public function payer(Request $request)
    {
        $etat_session;
        // Vérifier si le client est connecté
        if ($request->session()->has('courriel'))
        {
            // Récupérer le client connecté
            $unClient = Client::where('courriel', '=', $request->session()->get('courriel'))->first();
            $unPanier = Panier::where('client_id', '=', $unClient->id)->get();
            $etat_session = true;
        }
        // Sinon, on affiche le panier avec l'ip du client
        else
        {
            return redirect()->route('connecter');
            $etat_session = false;
        }

        //Obtenir les voyages du panier et la quantité
        $lesVoyagesDuPanier = $unPanier->map(function ($item)
        {
            $unVoyage = Voyage::find($item->voyage_id);
            $unVoyage->quantite = $item->quantite;
            return $unVoyage;
        });

        $lePrixAvantTaxes = 0;
        $lePrixApresTaxes = 0;
        $laTps = 0;
        $laTvq = 0;

        foreach ($lesVoyagesDuPanier as $unVoyage)
        {
            $lePrixAvantTaxes += $unVoyage->prix * $unVoyage->quantite;
        }

        $laTps = $lePrixAvantTaxes * 0.05;
        $laTvq = $lePrixAvantTaxes * 0.09975;
        $lePrixApresTaxes = $lePrixAvantTaxes + $laTps + $laTvq;

        return view('client/panier/payer')->with('lesVoyagesDuPanier', $lesVoyagesDuPanier)
                                                ->with('unClient', $unClient)
                                                ->with('nombreDeVoyages', $lesVoyagesDuPanier->count())
                                                ->with('lePrixAvantTaxes', $lePrixAvantTaxes)
                                                ->with('lePrixApresTaxes', $lePrixApresTaxes)
                                                ->with('laTps', $laTps)
                                                ->with('laTvq', $laTvq);
    }

    // Fonction qui permet de valider l'achat
    public function valider(Request $request)
    {
        // Vérifier si le client est connecté
        if ($request->session()->has('courriel'))
        {
            // Récupérer le client connecté
            $unClient = Client::where('courriel', '=', $request->session()->get('courriel'))->first();
            $unPanier = Panier::where('client_id', '=', $unClient->id)->get();
        }
        // Sinon, on affiche le panier avec l'ip du client
        else
        {
            return redirect()->route('connecter');
        }

        //Obtenir les voyages du panier et la quantité
        $lesVoyagesDuPanier = $unPanier->map(function ($item)
        {
            $unVoyage = Voyage::find($item->voyage_id);
            $unVoyage->quantite = $item->quantite;
            return $unVoyage;
        });

        $lePrixAvantTaxes = 0;
        $lePrixApresTaxes = 0;
        $laTps = 0;
        $laTvq = 0;

        foreach ($lesVoyagesDuPanier as $unVoyage)
        {
            $lePrixAvantTaxes += $unVoyage->prix * $unVoyage->quantite;
        }

        $laTps = $lePrixAvantTaxes * 0.05;
        $laTvq = $lePrixAvantTaxes * 0.09975;
        $lePrixApresTaxes = $lePrixAvantTaxes + $laTps + $laTvq;

        // On valide la vente
        $uneVente = new Vente();
        $uneVente->dateVente = date('Y-m-d');
        $uneVente->client_id = $unClient->id;
        $uneVente->voyage_id = $lesVoyagesDuPanier[0]->id;
        $uneVente->quantiteVoyageurs = $lesVoyagesDuPanier[0]->quantite;
        $uneVente->save();

        // Ajouter le save sur les paiements
        $unPaiement = new Paiement();
        $unPaiement->datePaiement = date('Y-m-d');
        $unPaiement->montantPaiement = $lePrixApresTaxes;
        $unPaiement->vente_id = $uneVente->id;
        $unPaiement->save();

        // On vide le panier
        $unPanier->each(function ($item) { $item->delete(); });

        // On affiche une page de confirmation
        return view('client/panier/valider')->with('lesVoyagesDuPanier', $lesVoyagesDuPanier)
                                            ->with('unClient', $unClient)
                                            ->with('nombreDeVoyages', $lesVoyagesDuPanier->count())
                                            ->with('lePrixAvantTaxes', $lePrixAvantTaxes)
                                            ->with('lePrixApresTaxes', $lePrixApresTaxes)
                                            ->with('laTps', $laTps)
                                            ->with('laTvq', $laTvq);
    }

    // Fonction qui permet d'afficher l'historique des achats du client
    public function historique(Request $request)
    {
        // Vérifier si le client est connecté
        if ($request->session()->has('courriel'))
        {
            // Récupérer le client connecté
            $unClient = Client::where('courriel', '=', $request->session()->get('courriel'))->first();
            // Obtenir les ventes selon le client id en ordre de dates
            $lesVentes = Vente::where('client_id', '=', $unClient->id)->orderBy('dateVente', 'desc')->get();

            //$lesVentes = Vente::where('client_id', $unClient->id)->get();
        }
        // Sinon, on affiche le panier avec l'ip du client
        else
        {
            return redirect()->route('connecter');
        }

        return view('client/panier/historique')->with('lesVentes', $lesVentes);
    }

}