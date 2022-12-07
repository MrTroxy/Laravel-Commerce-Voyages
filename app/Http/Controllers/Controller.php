<?php
/*
Auteur : David Tremblay
Date : Décembre 2022
Description : Controleur de base
*/

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Fonctions pour se connecter seulement avec le courriel et sans mot de passe
    public function connecter(Request $request)
    {
        $courriel = $request->input('courriel');
        return view('connecter')->with('courriel', $courriel);
    }

    public function deconnecter(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

    public function authentification(Request $request)
    {
        $unClient = Client::where('courriel', $request->courriel)->first();
        if ($unClient != null)
        {
            $request->session()->put('courriel', $request->courriel);

            if ($unClient->admin == 1)
            {
                $request->session()->put('admin', 1);
                return redirect()->route('admin.client.lister');
            }
            else
            {
                return redirect()->route('voyage.afficher');
            }
        }
        else
        {
            return redirect()->back()->withInput()->with('message', 'Le courriel n\'est pas associé à un compte.');
        }
    }
    
    public function apropos()
    {

    }
    
}
