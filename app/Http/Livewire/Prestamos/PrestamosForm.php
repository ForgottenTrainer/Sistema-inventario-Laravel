<?php

namespace App\Http\Livewire\Prestamos;

use Livewire\Component;

class PrestamosForm extends Component
{
    public $count = 0;

    public function bajar()
    {
        if($this->count > 0) {
            $this->count--;
        }
        
    }


    public function incrementar()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire..prestamos.prestamos-form');
    }
}
