<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libros extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $fillable = ['title', 'author', 'publication_year', 'category_id'];


    public function categories()
    {
        return $this->belongsTo('App\category', 'category_id');
    }

    public function copias()
    {
        return $this->hasMany('App\Copias', 'id_libro');
    }
}
