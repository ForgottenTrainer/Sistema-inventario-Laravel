<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cantidad',
        'area',
        'estado',
        'proveedor'
    ];
    public function alquilers()
    {
        return $this->hasMany(Alquiler::class, 'herramienta', 'nombre');
    }

}
