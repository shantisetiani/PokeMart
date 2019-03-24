<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table='pokemons';
    protected $fillable=['name', 'image','gender','description','price','element_id'];
}
