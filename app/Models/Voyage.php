<?php
/*
Auteur : David Tremblay
Date : Décembre 2022
Description : Modèle Voyage
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    protected $table = "voyage";
    protected $fillable = ['nomVoyage','dateDebut', 'duree', 'ville', 'prix', 'imgLink', 'departement_id', 'categorie_id']; //Champs modifiables
    public $timestamps = false;  //Utilisation de created_at et updated_at

    use HasFactory;

    //Récupère la catégorie du voyage
    public function saCategorie()
    {
        return $this->belongsTo('App\Models\Categorie', 'categorie_id');
    }

    //Récupère le département du voyage
    public function sonDepartement()
    {
        return $this->belongsTo('App\Models\Departement', 'departement_id');
    }


}
