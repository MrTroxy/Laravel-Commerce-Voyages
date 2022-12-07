<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $table = 'panier';
    protected $fillable = ['ip_client', 'voyage_id', 'quantite', 'client_id']; //Champs modifiables
    public $timestamps = false;

    // Récupère les voyages du panier
    public function unVoyage()
    {
        return $this->belongsTo('App\Models\Voyage', 'voyage_id');
    }

    // Récupère le client du panier
    public function leClient()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    // Récupère les ventes du panier
    public function lesVentes()
    {
        return $this->hasMany('App\Models\Vente', 'client_id', 'client_id');
    }
}
