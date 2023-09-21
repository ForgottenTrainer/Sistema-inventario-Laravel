<div>
    <a href="{{ route('alquiler.show') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar alquiler</a>

    <div class="px-6 py-4 relative">
        <x-text-input id="buscado" type="text" wire:model="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar productos, proveedores del producto, el area del producto"/>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Empleado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Herramientas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estatus
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Inicio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($alquilers as $a)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $a->empleado }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $a->herramienta }}
                        </td>
                        <td class="px-6 py-4">
                            @if($a->estatus == 'Activo')
                                <span class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded bg-amber-100 text-amber-800 dark:bg-amber-900 dark:text-amber-300">
                                    {{ $a->estatus }}
                                </span>
                            @elseif($a->estatus == 'Finalizado')
                                <span class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                    {{ $a->estatus }}
                                </span>
                            @elseif($a->estatus == 'Retardo')
                                <span class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                    {{ $a->estatus }}
                                </span>
                            
                            @elseif($a->estatus == 'Cancelado')
                                <span class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                    {{ $a->estatus }}
                                </span>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4">
                            {{ $a->inicio }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $a->fin }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('alquiler.pdf', $a->id) }}" class="font-medium text-amber-600 dark:text-amber-500 hover:underline mr-1">Contrato</a>
                            <a href="{{ route('edit.alquiler', $a->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-1">Editar</a>
                            <a href="{{ route('alquiler.edit', $a->id) }}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Ver mas</a>
                        </td>
                    </tr>                   
                @empty
                    
                @endforelse

            </tbody>
        </table>
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







  
  