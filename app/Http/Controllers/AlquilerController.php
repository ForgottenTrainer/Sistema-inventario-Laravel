<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Task;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Carbon;


class AlquilerController extends Controller
{
    //
    public function index()
    {
        return view('admin.prestamos.index');
    }

    public function show()
    {
        return view('admin.prestamos.show');
    }

    public function edit($id)
    {
        $alquiler = Alquiler::find($id);
        $productos = Alquiler::all();

        return view('admin.prestamos.edicion', compact('alquiler', 'productos'));
    }

    public function edicion($id, Request $request)
    {
        $productos = Task::all();
        $alquiler = Alquiler::find($id);
        return view('admin.prestamos.edit', compact('alquiler', 'productos'));

    }

    public function actualizar($id, Request $request)
    {
        $request->validate([
            'empleado' => 'required',
            'herramienta' => 'required',
            'inicio' => 'required',
            'fin' => 'required'
        ]);

        $alquiler = Alquiler::find($id);
        $alquiler->fill($request->all());
        $alquiler->save();
        
        return redirect()->route('alquiler.index');
    }

    public function update($id, Request $request)
    {
        $alquiler = Alquiler::find($id);

        if ($alquiler) {
            $alquiler->update(['estatus' => $request->estado]);
        }
    
        return redirect()->route('alquiler.index');
    }
    public function cancel($id, Request $request)
    {
        $alquiler = Alquiler::find($id);

        if ($alquiler) {
            $alquiler->update(['estatus' => $request->estado]);
        }
    
        return redirect()->route('alquiler.index');
    }

    public function activar($id, Request $request)
    {
        $alquiler = Alquiler::find($id);
    
        if ($alquiler) {
            // Verificar si la fecha actual es posterior a la fecha de finalización
            if (Carbon::now()->greaterThan($alquiler->fin)) {
                return redirect()->back()->with('error', 'No puedes activar el alquiler después de la fecha de finalización.');
            }
    
            // Si la fecha actual no es superior a la fecha fin, entonces actualiza el estado
            $alquiler->update(['estatus' => $request->estado]);
        }
    
        return redirect()->route('alquiler.index');
    }
    

    public function pdf($id)
    {
        $productos = Alquiler::find($id);

        //Ignoren el error en el PDF si funciona
        $pdf = PDF::loadView('admin.prestamos.pdf',['productos' => $productos]);

        //return $pdf->stream();
        return $pdf->stream();
    }
}
