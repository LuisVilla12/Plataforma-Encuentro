<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3ro Encuentro de CA's</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="max-w-xl mx-auto mt-12 bg-white shadow-md rounded-lg px-8 py-6">

        {{-- <img src="Encabezado.jpeg" alt="encabezado" class="w-full h-20 object-cover my-4"> --}}
        @if (session('success'))
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-md mb-4">
                {{ session('success') }}
            </p>
        @endif
        <h1 class="text-xl text-center font-semibold text-gray-800 mb-2 mt-6">
            Registro {{ $dato->id }} del capitulo de libro
        </h1>

        <div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Indica los nombres de los autores *
                </label>
                <input type="text" name="autores" id="autores" value="{{ $dato->autores }}" readonly
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900 mb-2">
            </div>

            <!-- Institución -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Institución de procedencia *
                </label>
                <input type="text" name="institucion" id="institucion" readonly value="{{ $dato->institucion }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900 mb-2">
            </div>

            <!-- Archivo word capitulo -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <a href="{{ asset('storage/' . $dato->url_capitulo) }}" class="flex items-center mb-2"
                        target="_blank">
                        <x-heroicon-o-document-text class="w-6 h-6" /> Capítulo del libro
                    </a>
                </label>

            </div>

            <!-- Archivo word resumen -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <a href="{{ asset('storage/' . $dato->url_resumen) }}" class="flex items-center mb-2"
                        target="_blank">
                        <x-heroicon-o-document-text class="w-6 h-6" /> Resumen del capítulo del
                        libro
                    </a>
                </label>
            </div>

        </div>
        {{-- Listado de comentarios --}}
        <div class="mt-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Comentarios y observaciones: *
            </label>
            <ul class="list-disc list-inside text-gray-700">
                @foreach ($dato->observaciones as $observacion)
                    <li class="text-sm font-semibold text-gray-700 mb-2">
                        {{ $observacion->observacion }}</li>
                @endforeach
            </ul>
        {{-- Observaciones y comentarios: --}}
        <form action="{{ route('observaciones.create',['dato'=>$dato]) }}" id="" method="POST" class="flex flex-col gap-4 mt-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Añadir comentarios u observaciones: *
                    </label>
                    <textarea name="observacion" id="observacion" rows="4" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900 mb-2"
                        placeholder="Escribe tus comentarios u observaciones aquí..."></textarea>
                    <div>
                        <input type="hidden" name="capitulo_id" value="{{ $dato->id }}">
                    </div>
                     <div>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    </div>
                    <!-- Botón -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="mt-4 px-6 bg-green-500 hover:bg-green-500 text-white py-2 rounded-md text-sm transition duration-200">
                            Añadir comentario
                        </button>
                    </div>

                </div>
            </form>
        {{-- Solo admin puede ver las asignaciones de revisores --}}
        @if(auth()->user()->tipo == 1)
        <div class="mt-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Revisores asignados: *
                </label>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach ($dato->asignacionesRevision as $asignacion)
                        <li class="text-sm font-semibold text-gray-700 mb-2">{{ $asignacion->revisor->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($dato->asignacionesRevision->count()<2 and auth()->user()->tipo == 1)
            <form action="{{ route('asignar.create') }}" id="myForm" method="POST" class="flex flex-col gap-4 mt-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Asignar revisor: *
                    </label>
                    <select name="user_id" id="user_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                        <option value="" disabled selected>Selecciona un revisor</option>
                        @foreach ($revisores as $revisor)
                            <option value="{{ $revisor->id }}">{{ $revisor->name }}</option>
                        @endforeach
                    </select>
                    <div>
                        <input type="hidden" name="capitulo_id" value="{{ $dato->id }}">
                    </div>
                    <!-- Botón -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="mt-4 px-6 bg-[#051a39] hover:bg-gray-800 text-white py-2 rounded-md text-sm transition duration-200">
                            Asignar revisor
                        </button>
                    </div>

                </div>
            </form>
        @endif
        @if(auth()->user()->tipo == 1)
            <div class="flex justify-end">
            <a href="{{ route('formulario_capitulo.index') }}"
                class="text-center mt-4 bg-[#051a39] hover:bg-gray-800 text-white px-4 py-2 rounded-md text-sm transition duration-200">
                Regresar
            </a>
        @else
            <div class="">
            <a href="{{ route('asignar.index') }}"
                class="text-center mt-4 bg-[#051a39] hover:bg-gray-800 text-white px-4 py-2 rounded-md text-sm transition duration-200">
                Regresar
            </a>
        @endif


    </div>

</body>

</html>
