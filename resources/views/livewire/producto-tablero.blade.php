<div>
    <div class="px-6 py-4 relative">
        <x-text-input id="buscado" type="text" wire:model="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar productos, proveedores del producto, el area del producto"/>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cantidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Area
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Proveedor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $producto->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $producto->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->cantidad }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->area }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->proveedor }}
                        </td>
                        <td class="px-6 py-4 flex">
                            <a href="{{ route('producto.show', $producto->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-5">Editar</a>
                            <form action="{{ route('producto.delete', $producto->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                            </form>
                            
                        </td>
                    </tr>                   
                @empty
                    <p class="text-indigo-300 font-bold uppercase text-center">
                        No hay productos disponibles
                    </p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
