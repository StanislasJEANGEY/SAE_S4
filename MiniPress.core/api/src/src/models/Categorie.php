<?php

use Illuminate\Database\Eloquent\Model;
use models\Article;


class Categorie extends Model
{
    protected $table = 'categories';
    protected $fillable = ['nom'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'categorie_id');
    }

}