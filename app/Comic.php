<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    //dichiarati i valori dell'istanza, da associare con quelli ricevuti dal form nel controller, in una variabile
    protected $fillable = ['title', 'description', 'thumb', 'price', 'series', 'sale_date', 'type'];
}
