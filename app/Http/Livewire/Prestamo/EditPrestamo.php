<?php

namespace App\Http\Livewire\Prestamo;

use App\Models\Alquiler;
use App\Models\Task;
use Livewire\Component;

class EditPrestamo extends Component
{
    public $empleado;
    public $herramienta;
    public $inicio;
    public $fin;
    public $cantidad;
    public $selectedTasks = [];
    public $alquilerId;
    public $alquiler;

    public function mount($id)
    {
        // Cargar los datos del producto a editar
        $this->alquiler = Alquiler::findOrFail($id);

        $this->empleado = $this->alquiler->empleado;
        $this->herramienta = $this->alquiler->herramienta;
        $this->cantidad = $this->alquiler->cantidad;
        $this->inicio = $this->alquiler->inicio;
        $this->fin = $this->alquiler->fin;
    }

    public function update($id)
    {
        $this->validate([
            'empleado' => 'required',
            'herramienta' => 'required',
            'inicio' => 'required|date',
            'cantidad' => 'required|numeric',
            'fin' => 'required|date|after:inicio',
        ]);

        // Actualizar el producto
        $alquiler = Alquiler::findOrFail($id);
        $alquiler->update([
            'empleado' => $this->empleado,
            'herramienta' => $this->herramienta,
            'cantidad' => $this->cantidad,
            'inicio' => $this->inicio,
            'fin' => $this->fin,
        ]);

        session()->flash('message', 'Producto actualizado correctamente.');

        return redirect()->back();
    }
    

    public function render()
    {
        $this->alquiler = Alquiler::findOrFail($this->alquilerId);
    
        $productos = Task::whereNotIn('id', $this->selectedTasks)->get();
    
        return view('livewire.prestamo.edit-prestamo', compact('productos'));
    }
}
