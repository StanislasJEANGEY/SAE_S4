<?php

namespace minipress\appli\models;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    protected $table = 'auteurs';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'user_id'];

    public $timestamps = false;

    public function articles(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Article::class, 'auteur_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

}