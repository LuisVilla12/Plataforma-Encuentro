<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3o. Encuentro de CA's</title>

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
                    Indica los nombres de los autores: *
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
                    Institución de procedencia: *
                </label>
                <select name="institucion" id="institucion" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                    <option value="" disabled selected>Selecciona tu institución</option>
                    @foreach ($instituciones as $institucion)
                        <option value="{{ $institucion->nombre }}">{{ $institucion->nombre }}</option>
                    @endforeach
                </select>
                @error('institucion')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Archivo word resumen -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">
                    Sube tu resumen formato word:*
                </label>
                <input type="file" name="url_resumen" id="url_resumen" required
                    accept=".docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                    class="mt-2 w-full text-sm border border-gray-300 rounded-md p-2 file:bg-[#611232] file:text-white file:border-0 file:px-4 file:py-2 file:rounded-md file:cursor-pointer">
                @error('url_resumen')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
                        <!-- Archivo word capitulo -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">
                    Sube tu resumen en extenso en formato word:*
                </label>
                <input type="file" name="url_capitulo" id="url_capitulo" required
                    accept=".docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                    class="mt-2 w-full text-sm border border-gray-300 rounded-md p-2 file:bg-[#611232] file:text-white file:border-0 file:px-4 file:py-2 file:rounded-md file:cursor-pointer">
                @error('url_capitulo')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="confirmacion" value="1" required
                        class="mr-2 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">

                    <span class="text-sm text-gray-700">
                        Confirmo que los datos ingresados son correctos
                    </span>
                </label>
                @error('confirmacion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <!-- Botón -->
            <button type="submit"
                class=" bg-[#611232] text-white py-2 rounded-md text-sm transition duration-200">
                Enviar
            </button>

        </form>

        <p class="text-xs text-gray-500 text-center mt-4">
            * Todos los campos son obligatorios
        </p>

    </div>

</body>

</html>

<script>
const form = document.getElementById('myForm');
form.addEventListener('submit', function(e) {
    e.preventDefault();
    // obtener valores
    const autores = document.getElementById('autores').value;
    const institucion = document.getElementById('institucion').value;
    const resumenFile = document.getElementById('url_resumen').files[0];
    const capituloFile = document.getElementById('url_capitulo').files[0];
    const confirmacion = document.querySelector('input[name="confirmacion"]').checked;

    // validar checkbox
    if (!confirmacion) {
        Swal.fire({
            icon: 'warning',
            title: 'Debes confirmar los datos',
            confirmButtonColor: '#611232'
        });
        return;
    }

    // nombres de archivos
    const resumenNombre = resumenFile ? resumenFile.name : "No seleccionado";
    const capituloNombre = capituloFile ? capituloFile.name : "No seleccionado";

    // construir html del modal
    const htmlPreview = `
        <div style="text-align:left; font-size:14px">

            <p class="text-sm text-gray-700 font-bold">Autores: <span class='font-normal'>${autores}</span></p>

            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
            Institución: <span class='font-normal'>${institucion}</span>
            </p>

            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
            Archivo resumen: <span class='font-normal'>${resumenNombre}</span>
            </p>

            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
            Archivo capítulo: <span class='font-normal'>${capituloNombre}</span>
            </p>

            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px; color:green">
            ✔ Datos confirmados por el usuario
            </p>

        </div>
    `;

    // mostrar modal
    Swal.fire({
        title: 'Confirmar registro',
        html: htmlPreview,
        width: 600,
        showCancelButton: true,
        confirmButtonText: 'Enviar',
        cancelButtonText: 'Editar',
        confirmButtonColor: '#611232',
        cancelButtonColor: '#6b7280'
    }).then((result) => {

        if (result.isConfirmed) {

            Swal.fire({
                title: 'Enviando...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => Swal.showLoading()
            });

            form.submit();
        }

    });

});
</script>
