@extends('admin.layout')

@section('titulo')
    Editar alquiler
@endsection

@section('contenido')
<div class="">
    @if(session('error'))
    <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 absolute top-5 right-5" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">{{ session('error') }}</div>
        <button id="close" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif

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
        <form action="{{ route("alquiler.active", $alquiler->id) }}" method="post">
            @csrf
            <input hidden type="text" name="estado" value="Activo">
            <button type="submit" class="text-white bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-amber-300 dark:focus:ring-amber-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Activar</button>
        </form>
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toast = document.querySelector('#toast-danger');
    const button = document.querySelector('#close');

    if (button) {
        button.addEventListener('click', () => {
            toast.classList.add('hidden');
        });
    }
});

</script>