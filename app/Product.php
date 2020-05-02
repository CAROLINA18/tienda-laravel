<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['title','image_url','description','price'];

    // La funcion url define si el producto se va a actualizar o a crear. Si existe el id actualiza si no crea
    public function url(){
        return $this->id ? 'productos.update' : 'productos.store';
    }
    //la funcion method comprueba si hay un id y le asigna al formulario el metodo de envio de datos.
    public function method(){
        return $this->id ? 'PUT' : 'POST';
    }
}
