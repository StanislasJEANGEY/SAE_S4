<?php

namespace minipress\api\services\auteur;

use Illuminate\Database\Eloquent\Model;
use minipress\api\models\Auteur;

class AuteurService extends Model
{
    function getAuteurs(): \Illuminate\Database\Eloquent\Collection
    {
        return Auteur::all();
    }

}