<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $table = "paiement";
    protected $fillable = ['datePaiement','montantPaiement', 'vente_id']; //Champs modifiables
    public $timestamps = false;  //Utilisation de created_at et updated_at
    use HasFactory;

    // Retourne le montant du paiement selon la vente
    public function unVente()
    {
        return $this->belongsTo('App\Models\Vente','vente_id');
    }
}