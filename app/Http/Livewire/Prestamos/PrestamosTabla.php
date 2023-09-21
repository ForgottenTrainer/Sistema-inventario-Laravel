<?php

namespace App\Http\Livewire\Prestamos;

use App\Models\Alquiler;
use Livewire\Component;
use Illuminate\Support\Carbon;

class PrestamosTabla extends Component
{
    public $alquilers;
    public $alquiler;
    public $fin;
    public $search = '';

    public function updatedFin()
    {
        // Verificar si la fecha actual es posterior a la fecha de finalización
        if (Carbon::now()->greaterThan($this->fin)) {
            // Actualizar el estatus en la base de datos
            $this->alquiler->update(['estatus' => 'Retardo']);

        }
    }

    public function updatedSearch()
    {
        $this->alquilers = Alquiler::where('empleado', 'like', '%' . $this->search . '%')
            ->orWhere('id', 'like', "%$this->search%")
            ->orWhere('herramienta', 'like', "%$this->search%")
            ->orWhere('estatus', 'like', "%$this->search%")
            ->get();
    }

    public function mount()
    {
        $this->alquilers = Alquiler::orderBy('id', 'desc')->get();
        $this->alquiler= new Alquiler();

        foreach ($this->alquilers as $alquiler) {
            if ($alquiler->estatus !== 'Finalizado' && $alquiler->estatus !== 'Cancelado' &&Carbon::now()->greaterThan($alquiler->fin)) {
                $alquiler->update(['estatus' => 'Retardo']);
            }
        }
    }

    public function render()
    {
        return view('livewire..prestamos.prestamos-tabla');
    }
}
