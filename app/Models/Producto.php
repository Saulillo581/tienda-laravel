<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //Esto es para que Laravel te deje guardar datos desde el código
    protected $fillable = ['nombre', 'precio', 'stock'];
}
