<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;

class Producto extends Component
{
    public $productos;
    public TaskModel $producto;

    public function mount()
    {
        $this->productos = TaskModel::orderBy('id', 'desc')->get();
        $this->producto = new TaskModel();
    }

    public function render()
    {
        return view('livewire.producto');
    }
}
