@extends('admin.layout')

@section('titulo')
Editar producto
@endsection

@section('contenido')
    
<form action="{{ route('producto.update', $producto->id) }}" enctype="multipart/form-data" method="POST">
  @csrf
  @method('PUT')
  <input type="hidden" name="estado" value="{{ $producto->estado }}">
    <div class="mb-6">
      <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
      <input type="text" value="{{ $producto->nombre }}" name="nombre" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="guantes, botas, etc..." required>
      @error('nombre')
        <div class="bg-red-500 p-2 mt-2 rounded-sm font-bold text-white uppercase">
          <p class="">{{ $message }}</p>
        </div>
      @enderror
    </div>
    <div class="mb-6">
      <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
      <input type="number" value="{{ $producto->cantidad }}" name="cantidad" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
      @error('cantidad')
      <div class="bg-red-500 p-2 mt-2 rounded-sm font-bold text-white uppercase">
        <p class="">{{ $message }}</p>
      </div>
      @enderror
    </div>

    <div class="flex items-start mb-6">
        <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area del producto</label>
        <select id="area" name="area" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="" disabled>Seleccione un area</option>
          <option value="tecnologicos" {{ $producto->area === 'tecnologicos' ? 'selected' : '' }}>Tecnológicos</option>
          <option value="industriales" {{ $producto->area === 'industriales' ? 'selected' : '' }}>Industriales</option>
          <option value="alimentacion" {{ $producto->area === 'alimentacion' ? 'selected' : '' }}>Alimentación</option>
          <option value="textiles" {{ $producto->area === 'textiles' ? 'selected' : '' }}>Textiles</option>
          <option value="salud" {{ $producto->area === 'salud' ? 'selected' : '' }}>Salud</option>
          <option value="automotriz" {{ $producto->area === 'automotriz' ? 'selected' : '' }}>Automotriz</option>
          <option value="construccion" {{ $producto->area === 'construccion' ? 'selected' : '' }}>Construcción</option>
          <option value="electrodomesticos" {{ $producto->area === 'electrodomesticos' ? 'selected' : '' }}>Electrodomésticos</option>
          <option value="entretenimiento" {{ $producto->area === 'entretenimiento' ? 'selected' : '' }}>Entretenimiento</option>
          <option value="moda" {{ $producto->area === 'moda' ? 'selected' : '' }}>Moda</option>
          <option value="muebles" {{ $producto->area === 'muebles' ? 'selected' : '' }}>Muebles</option>
          <option value="deportes" {{ $producto->area === 'deportes' ? 'selected' : '' }}>Deportes</option>
          <option value="juegos" {{ $producto->area === 'juegos' ? 'selected' : '' }}>Juegos</option>
          <option value="jardineria" {{ $producto->area === 'jardineria' ? 'selected' : '' }}>Jardinería</option>
          <option value="libros" {{ $producto->area === 'libros' ? 'selected' : '' }}>Libros</option>
          <option value="musica" {{ $producto->area === 'musica' ? 'selected' : '' }}>Música</option>
          <option value="juguetes" {{ $producto->area === 'juguetes' ? 'selected' : '' }}>Juguetes</option>
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
          
          @foreach ($areas as $area )
          <option value="{{ $area->nombre }}" {{ $producto->proveedor === $area->nombre ? 'selected' : '' }}>
            {{ $area->nombre }}
          </option>          
          @endforeach
      </select>
      @error('proveedor')
      <div class="bg-red-500 mt-2 p-2 rounded-sm font-bold text-white uppercase">
        <p class="">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar producto</button>
</form>  
@endsection