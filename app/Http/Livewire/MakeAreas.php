<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Areas as Area;

class MakeAreas extends Component
{
    public $areas;
    public $area;

    public $editingAreaId;
    public $nombre = '';
    public $tproducto = '';
    public $direccion= '';
    public $telefono = '';
    public $correo= '';
    public $search = '';
    public $listeners = ['delete'];

    public function updateArea($id)
    {
        $area = Area::find($id);

        $area->update([
            'nombre' => $this->nombre,
            'tproducto' => $this->tproducto,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
        ]);

        // Cerrar el modal de edición
        $this->closeEditModal();
    }

    public function mount()
    {
        $this->areas = Area::orderBy('id', 'desc')->get();
        $this->area = new Area();
    }

    public function updated()
    {
        $this->areas = Area::where('nombre', 'like', '%'.$this->search.'%')
            ->orWhere('id', 'like', "%$this->search%")
            ->orWhere('tproducto', 'like', "%$this->search%")
            ->get();
        
    }

    public function delete(Area $area)
    {
        $area->delete();
        
        $this->mount();
    }

    public function render()
    {
        return view('livewire.make-areas');
    }
}
