<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;
use Livewire\WithPagination;

class ProductoTablero extends Component
{
    public $productos;
    public TaskModel $producto;
    public $search = '';

    use WithPagination;

    public function mount()
    {
        $this->productos = TaskModel::orderBy('id', 'desc')->get();
        $this->producto = new TaskModel();
    }

    public function updated()
    {
        $this->productos = TaskModel::where('nombre', 'like', '%'.$this->search.'%')
            ->orWhere('proveedor', 'like', "%$this->search%")
            ->orWhere('area', 'like', "%$this->search%")
            ->get();
        
    }

    public function render()
    {

        return view('livewire.producto-tablero');
    }
}
