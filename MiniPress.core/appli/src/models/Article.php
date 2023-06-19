<?php

namespace minipress\appli\models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = ['titre', 'resume', 'contenu', 'date_creation', 'image_url', 'categorie_id', 'auteur_id','publie'];
	public $timestamps = false;

    public function categorie(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function auteur(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Auteur::class, 'auteur_id');
    }

}