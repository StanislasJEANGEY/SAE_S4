<?php

use Illuminate\Database\Eloquent\Model;


class Categorie extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['nom'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'categorie_id');
    }

}