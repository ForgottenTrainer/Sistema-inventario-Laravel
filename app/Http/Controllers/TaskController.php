<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function index()
    {
        return view('admin.producto.create');
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
            'estado' => 1
        ]);

        $producto->save();

        return redirect()->route('producto.index')->with('success', 'Producto agregado exitosamente.');
    }

    public function show($id)
    {
        $producto = Task::find($id);
        return view('admin.producto.show', compact('producto'));
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

    public function delete($id)
    {
        $producto = Task::find($id);
        $producto->delete();

        return view('admin.producto.index');
    }
}
