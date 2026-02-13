<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3er. Encuentro de CA's</title>

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
            Registro de cursos Pre-Congreso Virtuales
        </h1>

        <p class="text-center text-sm text-gray-600 mb-6">
            Completa los siguientes campos para registrar tu participación.
        </p>

        <form action="{{ route('formulario_cursos.store') }}" id="" method="POST" class="flex flex-col gap-4">
            @csrf
            <!-- nombre -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre completo: *</label>
                <input type="text" name="nombre" id="nombre" required value="{{ $dato->nombre }}" placeholder="Ingrese su nombre completo"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('nombre')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Institución -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Institución de procedencia: *
                </label>
                <input type="text" name="institucion" id="institucion" required
                    value="{{$dato->institucion }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('institucion')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Curso -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Curso *
                </label>
                <select name="curso" id="curso" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                    <option value="1" @if($dato->curso == 1) selected @endif>Redacción de Artículos científicos</option>
                    <option value="2" @if($dato->curso == 2) selected @endif>Metodología para la potencialización de proyectos innovadores </option>
                </select>
                @error('curso')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón -->
            <button type="submit"
                class="mt-4 bg-[#051a39] hover:bg-gray-800 text-white py-2 rounded-md text-sm transition duration-200">
                Registrar
            </button>

        </form>
        <p class="text-xs text-gray-500 text-center mt-4">
            * Todos los campos son obligatorios
        </p>
    </div>
</body>
</html>
