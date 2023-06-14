<?php

use Illuminate\Database\Eloquent\Model;
use models\Article;

class Auteur extends Model
{
    protected $table = 'auteurs';
    protected $fillable = ['nom'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'auteur_id');
    }

}