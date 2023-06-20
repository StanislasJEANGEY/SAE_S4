<?php

namespace minipress\api\models;

use Illuminate\Database\Eloquent\Model;

class Auteurs extends Model
{
    protected $table = 'auteurs';
    protected $fillable = ['nom', 'user_id'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'auteur_id');
    }

}