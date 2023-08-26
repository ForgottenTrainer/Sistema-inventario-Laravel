<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Areas as Area;

class FormArea extends Component
{
    public $nombre = '';
    public $direccion = '';
    public $tproducto = '';
    public $telefono = '';
    public $correo = '';
    
    protected $defer = [
        'nombre',
        'direccion',
        'tproducto',
        'telefono',
        'correo'
    ];

    public function save()
    {
        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'tproducto' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email'
        ]);
    
        Area::create([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'tproducto' => $this->tproducto,
            'telefono' => $this->telefono,
            'correo' => $this->correo
        ]);
    
        session()->flash('mensaje', 'Área agregada correctamente');
    
        return redirect()->route('areas.show');
    }
    

    public function render()
    {
        return view('livewire.form.form-area');
    }
}
