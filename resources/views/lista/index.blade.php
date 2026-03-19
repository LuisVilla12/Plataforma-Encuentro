
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Confirmación de registro al 3er. Encuentro de CA's
        </h2>
    </x-slot>
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 my-4">
        {{-- Buscador --}}
        <form method="GET" action="{{ route('formulario_asistencia.index') }}" class="w-full md:w-1/3">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar asistente..."
                    class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">

                <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                </svg>
            </div>

            @if (request('search'))
                <a href="{{ route('formulario_asistencia.index') }}"
                    class="inline-block mt-1 text-sm text-gray-500 hover:text-indigo-600">
                    Limpiar búsqueda
                </a>
            @endif
        </form>
    </div>
    <div class="shadow-md overflow-x-auto rounded-lg mt-5">
        @if ($datos->count() > 0)
            <div class="hidden md:block">
                <table class="w-full border bg-white shadow rounded">
                    <thead class="bg-[#611232]">
                        <tr>
                            <th class="p-2 text-white">N° </th>
                            <th class="p-2 text-white">Nombre completo </th>
                            <th class="p-2 text-white">Instituto</th>
                            <th class="p-2 text-white">Estatus</th>
                            <th class="p-2 text-white">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $dato)
                            <tr class="border-t {{ $dato->confirmacion==1 ? 'bg-red-100' : 'bg-green-100' }} hover:bg-gray-300 transition">
                                <td class="p-2 text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-2 text-center">
                                    {{ $dato->nombre . ' ' . $dato->apellidoP . ' ' . $dato->apellidoM }}
                                </td>
                                <td class="p-2">
                                    {{ $dato->institucion }}
                                </td>
                                <td class="p-2 text-center">
                                    {{ $dato->confirmacion==2? 'Confirmado' : 'Pendiente' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <div class="flex justify-center items-center gap-4">
                                        @if($dato->confirmacion==1)
                                        <form action="{{ route('lista.update', ['dato' => $dato]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="inline-flex items-center gap-1 text-green-600 hover:text-green-800 transition">
                                                <x-heroicon-o-check class="w-4 h-4" />
                                                <span class="hidden sm:inline">Confirmar</span>
                                            </button>
                                        </form>
                                        <span class="hidden sm:inline text-gray-300">•</span>

                                        @endif

                                        {{-- Editar --}}
                                        <a href="{{ route('formulario_asistencia.edit', ['dato' => $dato]) }}"
                                            class="inline-flex items-center gap-1 text-gray-600 hover:text-indigo-600 transition">
                                            <x-heroicon-o-pencil-square class="w-4 h-4" />
                                            <span class="hidden sm:inline">Editar</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- CARDS: visible en tablet y móvil -->
            <div class="md:hidden space-y-4">
                @foreach ($datos as $dato)
                    <div class="border rounded-lg shadow bg-white p-4">
                        <div class="mt-2">
                            <div class="mb-2 text-sm text-gray-500">
                                <span>Nombre completo:</span>
                                <span class="font-medium text-gray-800">
                                    {{ $dato->nombre }}
                                </span>
                            </div>
                            <div class="">
                                <p class="mb-2 text-sm">Institución:
                                    <span class="font-semibold">
                                        {{ $dato->institucion }}
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center justify-end mt-4 gap-4">
                            {{-- Ver --}}
                            <a href="{{ route('formulario_asistencia.show', ['dato' => $dato]) }}"
                                class="inline-flex items-center gap-1 text-gray-600 hover:text-blue-600 transition">
                                <x-heroicon-o-eye class="w-4 h-4" />
                                <span class="hidden sm:inline">Ver</span>
                            </a>
                            {{-- Editar --}}
                            <a href="{{ route('formulario_asistencia.edit', ['dato' => $dato]) }}"
                                class="inline-flex items-center gap-1 text-gray-600 hover:text-indigo-600 transition">
                                <x-heroicon-o-pencil-square class="w-4 h-4" />
                                <span class="hidden sm:inline">Editar</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white py-4 mt-3">
                <p class="text-sm text-gray-600 ml-6 text-center"> No hay registros</p>
            </div>
        @endif
        @if ($datos->count() > 0)
            <div class="bg-white py-4 my-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <p class="text-sm text-gray-600 ml-6">
                    Mostrando
                    <span class="font-medium">{{ $datos->firstItem() }}</span>
                    a
                    <span class="font-medium">{{ $datos->lastItem() }}</span>
                    de
                    <span class="font-medium">{{ $datos->total() }}</span>
                    registros
                </p>
                {{ $datos->links() }}
            </div>
        @endif

    </div>

</x-app-layout>
