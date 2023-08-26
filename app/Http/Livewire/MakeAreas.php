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

    public function openEditModal($areaId)
    {
        $area = Area::find($areaId);
    
        $this->dispatchBrowserEvent('open-edit-modal', $area);
    }
    
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

    public function render()
    {
        return view('livewire.make-areas');
    }
}
