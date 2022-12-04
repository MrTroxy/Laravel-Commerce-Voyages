<?php
/*
Auteur : David Tremblay
Date : Décembre 2022
Description : Modèle Vente
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $table = "vente";
    protected $fillable = ['dateVente', 'client_id', 'voyage_id', 'quantiteVoyageurs']; //Champs modifiables
    public $timestamps = false;  //Utilisation de created_at et updated_at
    use HasFactory;

    public function unVoyage()
    {
        return $this->belongsTo('App\Models\Voyage','voyage_id');
    }

    public function unClient()
    {
        return $this->belongsTo('App\Models\Client','client_id');
    }

    public function unPaiement()
    {
        return $this->hasMany('App\Models\Paiement','vente_id');
    }
}
