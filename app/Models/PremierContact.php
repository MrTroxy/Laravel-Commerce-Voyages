<?php
/*
Auteur : David Tremblay
Date : Décembre 2022
Description : Modèle PremierContact
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremierContact extends Model
{
    protected $table = 'premiercontact';
    protected $fillable = ['premierContact']; //Champs modifiables
    public $timestamps = false;  //Utilisation de created_at et updated_at
    use HasFactory;
}
