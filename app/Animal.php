<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Animal extends Model
{
    protected $fillable = [
        'identificacao', 'nome', 'id_raca'
    ];
    protected $table = 'animais';
}