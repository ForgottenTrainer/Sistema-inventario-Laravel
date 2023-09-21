@extends('admin.layout')


@section('titulo')
Editar Alquiler de {{ $alquiler->empleado }}
@endsection


@section('contenido')
   <form action="{{ route('update.alquiler', $alquiler->id) }}" method="POST">
       @csrf
       @method('PUT')


       @error('empleado') <span class="text-red-500">{{ $message }}</span> @enderror
       @error('herramienta') <span class="text-red-500">{{ $message }}</span> @enderror
       @error('inicio') <span class="text-red-500">{{ $message }}</span> @enderror
       @error('fin') <span class="text-red-500">{{ $message }}</span> @enderror


       <label for="nombre" class="text-slate-200 text-sm ml-2">Nombre</label>
       <input type="text" name="empleado" id="nombre" value="{{ $alquiler->empleado }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >


       <label for="producto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Producto a alquilar</label>
       <select name="herramienta" id="producto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
           <option value="">Seleccione un producto</option>
           @foreach ($productos as $producto)
           <option value="{{ $producto->nombre }}" {{ $producto->nombre == $alquiler->herramienta ? 'selected' : '' }}>{{ $producto->nombre }}</option>          
           @endforeach
       </select>  


       <div class="grid md:grid-cols-2 md:gap-6 mt-2">
           <div class="relative z-0 w-full mb-6 group">
               <label for="nombre" class="text-slate-200 text-sm ml-2">Fecha de inicio</label>
               <input type="date" name="inicio" value="{{ $alquiler->inicio }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
      
           </div>
           <div class="relative z-0 w-full mb-6 group">
               <label for="nombre" class="text-slate-200 text-sm ml-2">Fecha de entrega</label>
               <input type="date" name="fin" value="{{ $alquiler->fin }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
           </div>
           
       </div>
       <button type="submit" class="text-white bg-amber-700 hover:bg-amber-800 focus:outline-none focus:ring-4 focus:ring-amber-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800">Actualizar</button>
   </form>
@endsection
