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
                            <button data-producto-id="{{ $producto->id }}" class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer delete-producto-btn">Eliminar</button>
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
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-producto-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productoId = button.getAttribute('data-producto-id');

                    Swal.fire({
                        title: 'Estas a punto de eliminar este producto',
                        text: 'Esta acción es irreversible',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Eliminar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.delete(`/eliminar-producto/${productoId}`)
                                .then(response => {
                                    Swal.fire(
                                        'Producto eliminado',
                                        'El producto ha sido eliminado correctamente',
                                        'success'
                                    );
                                    setTimeout(() => {
                                        location.reload(); 
                                    }, 2000);
                                    
                                })
                                .catch(error => {
                                    console.error(error);
                                    Swal.fire(
                                        'Error',
                                        'Ha ocurrido un error al intentar eliminar el producto',
                                        'error'
                                    );
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
