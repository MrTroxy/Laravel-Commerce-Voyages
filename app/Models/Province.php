<?php
/*
Auteur : David Tremblay
Date : Décembre 2022
Description : Modèle Province
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "province";
    protected $fillable = ['province','codeProvince']; //Champs modifiables
    public $timestamps = false;  //Utilisation de created_at et updated_at
    use HasFactory;
}
