<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Catálogo de Almacenes
        </h2>
    </x-slot>
    <div class="shadow-md overflow-x-auto rounded-lg mt-5">
        @if ($datos->count() > 0)
            <div class="hidden md:block">
                <table class="w-full border bg-white shadow rounded">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2">Autores </th>
                            <th class="p-2">Instituto</th>
                            <th class="p-2">Capitulo</th>
                            <th class="p-2">Resumen</th>
                            <th class="p-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $dato)
                            <tr class="border-t">
                                <td class="p-2 text-center">
                                    {{ $dato->autores }}
                                </td>
                                <td class="p-2">
                                    {{ $dato->institucion }}
                                </td>
                                <td class="p-2">
                                    <a href="{{ asset('storage/' . $dato->url_capitulo) }}" target="_blank"><x-heroicon-o-document-text class="w-4 h-4" />
</a>
                                </td>
                                 <td class="p-2">
                                    <a href="{{ asset('storage/' . $dato->url_resumen) }}" target="_blank"> <x-heroicon-o-document-text class="w-4 h-4" />
</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <div class="flex justify-center items-center gap-4">
                                        {{-- Ver --}}
                                        <a href="{{ route('formulario_capitulo.show', ['dato' => $dato]) }}"
                                            class="inline-flex items-center gap-1 text-gray-600 hover:text-blue-600 transition">
                                            <x-heroicon-o-eye class="w-4 h-4" />
                                            <span class="hidden sm:inline">Ver</span>
                                        </a>
                                        <span class="hidden sm:inline text-gray-300">•</span>
                                        {{-- Editar --}}
                                        <a href=""
                                            class="inline-flex items-center gap-1 text-gray-600 hover:text-indigo-600 transition">
                                            <x-heroicon-o-pencil-square class="w-4 h-4" />
                                            <span class="hidden sm:inline">Editar</span>
                                        </a>
                                        <span class="hidden sm:inline text-gray-300">•</span>

                                        {{-- Eliminar --}}
                                        <form action="" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="inline-flex items-center gap-1 text-gray-500 hover:text-red-600 transition"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                                <x-heroicon-o-trash class="w-4 h-4" />
                                                <span class="hidden sm:inline">Eliminar</span>
                                            </button>
                                        </form>
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
                                <span>Autores:</span>
                                <span class="font-medium text-gray-800">
                                    {{ $dato->autores }}
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
                            <a href=""
                                class="inline-flex items-center gap-1 text-gray-600 hover:text-blue-600 transition">
                                <x-heroicon-o-eye class="w-4 h-4" />
                                <span class="hidden sm:inline">Ver</span>
                            </a>
                            <span class="hidden sm:inline text-gray-300">•</span>
                            {{-- Editar --}}
                            <a href=""
                                class="inline-flex items-center gap-1 text-gray-600 hover:text-indigo-600 transition">
                                <x-heroicon-o-pencil-square class="w-4 h-4" />
                                <span class="hidden sm:inline">Editar</span>
                            </a>
                            <span class="hidden sm:inline text-gray-300">•</span>

                            {{-- Eliminar --}}
                            <form action="" method="POST" class="inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="inline-flex items-center gap-1 text-gray-500 hover:text-red-600 transition"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                    <x-heroicon-o-trash class="w-4 h-4" />
                                    <span class="hidden sm:inline">Eliminar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white py-4 mt-3">
                <p class="text-sm text-gray-600 ml-6 text-center"> No hay almacenes registrados</p>
            </div>
        @endif
        {{-- @if ($almacenes->count() > 0)
            <div class="bg-white py-4 my-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <p class="text-sm text-gray-600 ml-6">
                    Mostrando
                    <span class="font-medium">{{ $almacenes->firstItem() }}</span>
                    a
                    <span class="font-medium">{{ $almacenes->lastItem() }}</span>
                    de
                    <span class="font-medium">{{ $almacenes->total() }}</span>
                    registros
                </p>

                {{ $almacenes->links() }}
            </div>
        @endif --}}

    </div>

</x-app-layout>
