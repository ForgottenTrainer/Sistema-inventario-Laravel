@extends('admin.layout')

@section('titulo')
Agregar producto
@endsection

@section('contenido')

@if(session('success'))
<div class="bg-green-200 text-green-800 p-4 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('producto.store') }}" enctype="multipart/form-data" method="POST">
  @csrf
    <div class="mb-6">
      <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
      <input type="text" name="nombre" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="guantes, botas, etc..." required>
      @error('nombre')
        <div class="bg-red-500 p-2 mt-2 rounded-sm font-bold text-white uppercase">
          <p class="">{{ $message }}</p>
        </div>
      @enderror
    </div>
    <div class="mb-6">
      <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
      <input type="number" name="cantidad" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
      @error('cantidad')
      <div class="bg-red-500 p-2 mt-2 rounded-sm font-bold text-white uppercase">
        <p class="">{{ $message }}</p>
      </div>
      @enderror
    </div>

    <div class="flex items-start mb-6">
        <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area del producto</label>
        <select id="area" name="area" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Seleccione un area</option>
            <option value="tecnologicos">Tecnológicos</option>
            <option value="industriales">Industriales</option>
            <option value="alimentacion">Alimentación</option>
            <option value="textiles">Textiles</option>
            <option value="salud">Salud</option>
            <option value="automotriz">Automotriz</option>
            <option value="construccion">Construcción</option>
            <option value="electrodomesticos">Electrodomésticos</option>
            <option value="entretenimiento">Entretenimiento</option>
            <option value="moda">Moda</option>
            <option value="muebles">Muebles</option>
            <option value="deportes">Deportes</option>
            <option value="juegos">Juegos</option>
            <option value="jardineria">Jardinería</option>
            <option value="libros">Libros</option>
            <option value="musica">Música</option>
            <option value="juguetes">Juguetes</option>
        </select>
        @error('area')
        <div class="bg-red-500 mt-2 p-2 rounded-sm font-bold text-white uppercase">
          <p class="">{{ $message }}</p>
        </div>
        @enderror
    </div>
    <div class="flex items-start mb-6">
      <label for="proveedor" class="pr-5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Proveedor</label>
      <select id="proveedor" name="proveedor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option selected>Seleccione un proveedor</option>
          @foreach ($areas as $area )
            <option value="{{ $area->nombre }}">{{ $area->nombre }}</option>
          @endforeach
      </select>
      @error('proveedor')
      <div class="bg-red-500 mt-2 p-2 rounded-sm font-bold text-white uppercase">
        <p class="">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar producto</button>
</form>  
@endsection