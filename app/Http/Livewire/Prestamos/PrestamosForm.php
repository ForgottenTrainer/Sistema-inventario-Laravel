<?php

namespace App\Http\Livewire\Prestamos;
use Livewire\Component;
use App\Models\Task;
use App\Models\Alquiler;
use Illuminate\Support\Carbon;

class PrestamosForm extends Component
{
    public $empleado;
    public $herramienta;
    public $estatus;
    public $inicio;
    public $cantidad;
    public $alquiler;
    public $fin;
    public $selectedTasks = [];
    
    public function submit()
    {
        $this->validate([
            'empleado' => 'required',
            'herramienta' => 'required',
            'inicio' => 'required|date',
            'cantidad' => 'required|numeric',
            'fin' => 'required|date|after:inicio',
        ]);
    
        Alquiler::create([
            'empleado' => $this->empleado,
            'herramienta' => $this->herramienta,
            'estatus' => 'Activo', 
            'inicio' => $this->inicio,
            'cantidad' => $this->cantidad,
            'fin' => $this->fin,
        ]);
    
        // Limpiar los campos después de guardar
        $this->empleado = '';
        $this->herramienta = '';
        $this->inicio = '';
        $this->cantidad = '';
        $this->fin = '';

        return redirect()->route("alquiler.index");
    }

    public function render()
    {
        $productos = Task::whereNotIn('id', $this->selectedTasks)->get();
        return view('livewire..prestamos.prestamos-form', compact('productos'));
    }
}
