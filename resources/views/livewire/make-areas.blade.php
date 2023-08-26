<div>
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Proveedor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo de productos
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Direccion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telefono
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Correo
                        </th>              
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>

                @forelse ($areas as $area)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $area->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $area->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $area->tproducto }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $area->direccion }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $area->telefono }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $area->correo}}
                        </td>
                        <td class="px-6 py-4 flex">
                            <a href="{{ route('area.edit', $area->id) }}" class="showModal font-medium text-blue-600 dark:text-blue-500 hover:underline mr-5">Editar</a>
                            <button type="button" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                        </td>
                    </tr>             
                @empty
                    <p class="text-indigo-300 font-bold uppercase text-center mb-2">
                        No hay areas ingresadas
                    </p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>







  
  