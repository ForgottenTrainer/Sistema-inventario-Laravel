<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\AreasExport;
use App\Models\Areas;
use PDF;
use Excel;

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
    public function pdf()
    {
        $productos = Areas::all();

        //Ignoren el error en el PDF si funciona
        $pdf = PDF::loadView('admin.area.pdf',['productos' => $productos]);

        //return $pdf->stream();
        return $pdf->download('reportes-del-mes');
    }
    public function excel()
    {
        return Excel::download(new AreasExport, 'reporte-areas.xlsx');
    }

    public function delete($id)
    {
        $areas = Areas::find($id);
        $areas->delete();

        return view('admin.area.index');
    }
}
