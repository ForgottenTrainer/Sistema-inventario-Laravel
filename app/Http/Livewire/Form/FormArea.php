<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Areas as Area;

class FormArea extends Component
{
    public $nombre = '';
    public $direccion = '';
    public $tproducto = '';
    public $telefono = '';
    public $correo = '';
    public Area $area;

    //#[On('good')] 
    
    protected $defer = [
        'nombre',
        'direccion',
        'tproducto',
        'telefono',
        'correo'
    ];

    public function mount()
    {
        $this->area = new Area();
    }


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

        $this->nombre = '';
        $this->direccion = '';
        $this->tproducto = '';
        $this->telefono = '';
        $this->correo = '';

    }
    

    public function render()
    {
        return view('livewire.form.form-area');
    }
}
