<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Micronutrientes extends Model
{
    protected $fillable = [
        'ruim_a',
        'ruim_b',
        'regular_a',
        'regular_b',
        'regular_c',
        'bom_a',
        'bom_b',
        'bom_c',
        'excelente_a',
        'excelente_b',
    ];
    protected $table = 'micronutrientes';
}