<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2o. Encuentro de CA's</title>

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
            Registro de capítulo de libro
        </h1>

        <p class="text-center text-sm text-gray-600 mb-6">
            Completa los siguientes campos para registrar tu participación.
        </p>

        <form action="{{ route('formulario_capitulo.store') }}" id="myForm" method="POST"
            enctype="multipart/form-data" class="flex flex-col gap-4">
            @csrf
            <!-- Autores -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Indica los nombres de los autores *
                </label>
                <input type="text" name="autores" id="autores" required
                    placeholder="Villa-Juárez, Jazmin; Alemán-Gutiérrez, María Rebeca..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('autores')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Institución -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Institución de procedencia *
                </label>
                <input type="text" name="institucion" id="institucion" required
                    placeholder="Nombre de la institución"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('institucion')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Archivo word capitulo -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">
                    Sube tu capitulo del libro en formato word:*
                </label>
                <input type="file" name="url_capitulo" id="url_capitulo" required
                    accept=".docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                    class="mt-2 w-full text-sm border border-gray-300 rounded-md p-2 file:bg-blue-900 file:text-white file:border-0 file:px-4 file:py-2 file:rounded-md file:cursor-pointer">
                @error('url_capitulo')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Archivo word resumen -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">
                    Sube tu resumen del capitulo del libro en formato word:*
                </label>
                <input type="file" name="url_resumen" id="url_resumen" required
                    accept=".docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                    class="mt-2 w-full text-sm border border-gray-300 rounded-md p-2 file:bg-blue-900 file:text-white file:border-0 file:px-4 file:py-2 file:rounded-md file:cursor-pointer">
                @error('url_resumen')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón -->
            <button type="submit"
                class="mt-4 bg-[#051a39] hover:bg-gray-800 text-white py-2 rounded-md text-sm transition duration-200">
                Enviar
            </button>

        </form>

        <p class="text-xs text-gray-500 text-center mt-4">
            * Todos los campos son obligatorios
        </p>

    </div>

</body>

</html>
