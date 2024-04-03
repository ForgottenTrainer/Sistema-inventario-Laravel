<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado', 
        'herramienta', 
        'estatus' ,
        'cantidad',
        'inicio' ,
        'fin' ,
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'nombre', 'herramienta');
    }
}
