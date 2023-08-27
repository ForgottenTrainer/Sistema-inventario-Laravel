<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;

class AreasController extends Controller
{
    //

    public function index()
    {
        return view('admin.area.index');
    }

    public function show()
    {
        return view('admin.area.show');
    }

    public function edit($id)
    {
        $areas = Areas::find($id);

        return view('admin.area.edit', compact('areas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           'nombre' => 'required',
           'direccion' => 'required',
           'telefono' => 'required|numeric',
           'correo' => 'required|email',
           'tproducto' => 'required'
        ]);

        $areas = Areas::find($id);
        $areas->fill($request->all());
        $areas->save();

        session()->flash('mensaje', 'Editado correctamente');
        return redirect()->route('area.edit', $id);

    }

    public function delete($id)
    {
        $areas = Areas::find($id);
        $areas->delete();

        return view('admin.area.index');
    }
}
