<?php
/*
Auteur : David Tremblay
Date : Décembre 2022
Description : Controleur du modèle Vente
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vente;

class VenteController extends Controller
{
    public function adminLister(Request $request)
    {
        if ($request->session()->get('admin') == 1)
        {
            $lesVentes = Vente::all();
            $nombreVentes = $lesVentes->count();
            return view('admin.vente.lister')->with("lesVentes", $lesVentes)
                                             ->with("nombreVentes", $nombreVentes);
        }
        else
        {
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }
}
