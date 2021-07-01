<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'titulo',
        'intro',
        'corpo',
        'imagem',
        'textolink',
        'link',
        'user_id',
        'categoria_id',
    ];

    public function comentarios() 
    {
        return $this->hasMany('App\Models\Comentario');
    }

    public function categoria()
    {
            return $this->belongsTo('App\Models\Categoria');
    }


    public function user()
    {
            return $this->belongsTo('App\Models\User');
    }
}
