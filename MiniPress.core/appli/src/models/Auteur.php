<?php

namespace appli\models;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    protected $table = 'auteurs';
    protected $primaryKey = 'id';
    protected $fillable = ['nom'];

    public function articles(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Article::class, 'auteur_id');
    }

}