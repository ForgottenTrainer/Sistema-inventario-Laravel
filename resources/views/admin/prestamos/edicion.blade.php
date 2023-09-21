@extends('admin.layout')

@section('titulo')
    Editar alquiler
@endsection

@section('contenido')
<div class="">
    <label for="nombre" class="text-slate-200 text-sm ml-2">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ $alquiler->empleado }}" class="mb-6 bg-gray-100 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" >

    <label for="nombre" class="text-slate-200 text-sm ml-2">Herramienta</label>
    <input type="text" value="{{ $alquiler->herramienta }}" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  >

    <div class="grid md:grid-cols-2 md:gap-6 mt-2">
        <div class="relative z-0 w-full mb-6 group">
            <label for="nombre" class="text-slate-200 text-sm ml-2">Fecha de inicio</label>
            <input type="text" value="{{ $alquiler->inicio }}" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" >
    
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="nombre" class="text-slate-200 text-sm ml-2">Fecha de entrega</label>
            <input type="text" value="{{ $alquiler->fin }}" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" >
    
        </div>
    </div>
    <div class="flex">
        <form action="{{ route("alquiler.update", $alquiler->id) }}" method="post">
            @csrf
            <input hidden type="text" name="estado" value="Finalizado">
            <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Finalizar</button>
        </form>
        <form action="{{ route("alquiler.cancel", $alquiler->id) }}" method="post">
            @csrf
            <input hidden type="text" name="estado" value="Cancelado">
            <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Cancelar</button>
        </form>
    </div>
</div>
@endsection