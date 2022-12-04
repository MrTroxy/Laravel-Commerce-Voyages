<?php
/*
Auteur : David Tremblay
Date : Décembre 2022
Description : Modèle Client
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $fillable = ['prenom','nom', 'adresse', 'ville', 'CP', 'telephone', 'courriel', 'genre', 'province_id', 'premierContact_id', 'admin']; //Champs modifiables
    public $timestamps = false;  //Utilisation de created_at et updated_at
    use HasFactory;

    //Récupère la province du client
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    //Récupère le premier contact du client
    public function premierContact()
    {
        return $this->belongsTo(PremierContact::class);
    }

    //Récupère les commandes du client
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

}
