@extends('admin.layout')

@section('titulo')
    Dashboard
@endsection

@section('contenido')
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-gray-800 shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-white font-semibold leading-normal text-sm">Areas</p>
                                <h5 class="mb-0 font-bold text-white">
                                    {{ $areas->count() }}
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-700 to-pink-500">
                                <i class="fa-solid fa-user-plus leading-none ext-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-gray-800 shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-white font-semibold leading-normal text-sm">Productos</p>
                                <h5 class="mb-0 font-bold text-white">
                                    {{ $productos->count() }}

                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-green-700 to-cyan-500">
                                <i class="fa-solid fa-box leading-none text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-gray-800 shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-white font-semibold leading-normal text-sm">Usuarios</p>
                                <h5 class="mb-0 font-bold text-white">
                                    {{ $users->count() }}
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-700 to-gray-900">
                                <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                                <i class="fa-solid fa-user-tie leading-non text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-gray-800 shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-white font-semibold leading-normal text-sm">Alquiler</p>
                                <h5 class="mb-0 font-bold text-white">
                                    {{ $alquiler->count() }}
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-indigo-500">
                                <i class="fa-solid fa-clipboard leading-none text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Section de recomendaciones y atajos ============== -->

    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full px-3 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-gray-800 text-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <p class="pt-2 mb-1 font-semibold">Crear nuevos usuarios al sistema</p>
                                <h5 class="font-bold mt-5">Registra nuevos usuarios para que ingresen al sistema</h5>

                                <a class="mt-auto mb-0 font-semibold leading-normal text-sm group text-slate-300"
                                    href="javascript:;">
                                    Registrar
                                    <i class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"
                                        aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="max-w-full px-3 mt-12 ml-auto text-center lg:mt-0 lg:w-5/12 lg:flex-none">
                            <div class="h-full bg-gradient-to-tl from-purple-700 to-pink-500 rounded-xl">
                                <div class="relative flex items-center justify-center h-full">
                                    <img class="relative z-20 w-full pt-6"
                                    src="{{ asset('images/avatar.svg') }}" alt="avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <div
                class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-gray-800 bg-clip-border p-4">
                <div class="relative h-full overflow-hidden bg-cover rounded-xl"
                    style="background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                    <span
                        class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80"></span>
                    <div class="relative z-10 flex flex-col flex-auto h-full p-4">
                        <h5 class="pt-2 mb-6 font-bold text-white">¿Problemas con el sistema?</h5>
                        <p class="text-white">Envianos un mensaje y nosotros te ayudaremos a solucionarlo</p>
                        <a class="mt-auto mb-0 font-semibold leading-normal text-white group text-sm" href="javascript:;">
                            Enviar mensaje.
                            <i class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"
                                aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection
