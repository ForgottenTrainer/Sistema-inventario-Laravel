<?php

namespace App\Http\Controllers;

use App\Exports\TaskExport;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Areas;
use PDF;
use Excel;
use Illuminate\Support\Facades\App;

class TaskController extends Controller
{
    //
    public function index()
    {
        $areas = Areas::all();
        return view('admin.producto.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required|gt:0|numeric',
        ]);

        $producto = Task::create([
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'area' => $request->area,
            'proveedor' => $request->proveedor,
            'estado' => 1
        ]);

        $producto->save();

        return redirect()->route('producto.index')->with('success', 'Producto agregado exitosamente.');
    }

    public function show($id)
    {
        $producto = Task::find($id);
        $areas = Areas::all();
    
        return view('admin.producto.show', compact('producto', 'areas'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required|numeric|min:0',
        ]);

        $producto = Task::find($id);

        $producto->fill($request->all());
    
        // Actualizar estado en función de la cantidad
        $producto->estado = $request->cantidad > 0 ? 1 : 0;
    
        $producto->save();

        return view('admin.producto.index');
    }

    public function pdf()
    {
        $productos = Task::all();

        //Ignoren el error en el PDF si funciona
        $pdf = PDF::loadView('admin.producto.pdf',['productos' => $productos]);

        //return $pdf->stream();
        return $pdf->download('reportes-del-mes');
    }
    public function excel()
    {
        return Excel::download(new TaskExport, 'reporte.xlsx');
    }
    

    public function delete($id)
    {
        $producto = Task::find($id);
        $producto->delete();

        return view('admin.producto.index');
    }
}
