<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class copias extends Model
{
    use HasFactory;

    public function libro()
    {
        return $this->belongsTo('App\Libros', 'libro_id');
    }

    public function localidades()
    {
        return $this->belongsTo('App\Localidades', 'localidad_id');
    }
}
