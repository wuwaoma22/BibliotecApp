<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class copias extends Model
{
    use HasFactory;

    protected $table = 'copias';

    protected $fillable = ['libro_id', 'localidad_id', 'tipo_id', 'disponibilidad_id'];

    public function libro()
    {
        return $this->belongsTo('App\Libros', 'libro_id');
    }

    public function localidades()
    {
        return $this->belongsTo('App\Localidades', 'localidad_id');
    }
}
