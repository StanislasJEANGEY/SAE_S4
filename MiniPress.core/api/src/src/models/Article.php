<?php

use Illuminate\Database\Eloquent\Model;
use models\Auteur;
use models\Categorie;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['titre', 'resume', 'contenu', 'date_creation', 'image_url', 'categorie_id', 'auteur_id'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function auteur()
    {
        return $this->belongsTo(Auteur::class, 'auteur_id');
    }

}