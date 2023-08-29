<div>
    <div class="px-6 py-4 relative">
        <x-text-input id="buscado" type="text" wire:model="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar productos, proveedores del producto, el area del producto"/>
    </div>
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
                            <button wire:click="$emit('deletePost', {{$area->id}})" type="button" class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer">Eliminar</button>
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
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('deletePost', areaId => {
            Swal.fire({
                title: 'Estas a punto de eliminar el area',
                text: "Esta acción es irreversivle",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('make-areas', 'delete', areaId)
                    Swal.fire(
                    'Area eliminada',
                    'Excelente, el area ya se elimino',
                    'success'
                    )
                }
            })
        })
    </script>
@endpush







  
  