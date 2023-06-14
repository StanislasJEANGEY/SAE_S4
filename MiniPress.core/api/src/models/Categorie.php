<?php

namespace minipress\api\models;

use Illuminate\Database\Eloquent\Model;


class Categorie extends Model
{
    protected $table = 'categories';
    protected $fillable = ['nom'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'categorie_id');
    }

}