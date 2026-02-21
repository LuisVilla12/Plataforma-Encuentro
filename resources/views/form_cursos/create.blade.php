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
        @if (session('error'))
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-md mb-4">
                {{ session('error') }}
            </p>
        @endif
        <h1 class="text-xl text-center font-semibold text-gray-800 mb-2 mt-6">
            Registro de cursos Pre-Congreso Virtuales
        </h1>

        <p class="text-center text-sm text-gray-600 mb-6">
            Completa los siguientes campos para registrar tu participación.
        </p>

        <form action="{{ route('formulario_cursos.store') }}" id="myForm" method="POST" class="flex flex-col gap-4">
            @csrf
            <!-- apellido P -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Apellido paterno: *</label>
                <input type="text" name="apellidoP" id="apellidoP" value="{{ old('apellidoP') }}" required placeholder="Ingrese su apellido paterno"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('apellidoP')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- apellido M -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Apellido materno: *</label>
                <input type="text" name="apellidoM" id="apellidoM" value="{{ old('apellidoM') }}" required placeholder="Ingrese su apellido materno"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('apellidoM')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- nombre -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombres: *</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required placeholder="Ingrese su nombre"
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
            <!-- Correo electronico -->
            <div class="">
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Correo electrónico: *
                </label>
                <input type="email" name="correo" id="correo" required
                    placeholder="Correo electrónico" value="{{ old('correo') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('correo')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Curso -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Curso: *
                </label>
                <select name="curso" id="curso" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                    <option value="" disabled selected>Selecciona el curso</option>
                    <option value="1">Redacción de Artículos científicos</option>
                    <option value="2">Metodología para la potencialización de proyectos innovadores </option>
                </select>
                @error('curso')
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
                class=" bg-[#611232] hover:bg-gray-800 text-white py-2 rounded-md text-sm transition duration-200">
                Registrar
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
    const name = document.getElementById('nombre').value;
    const apellidoP = document.getElementById('apellidoP').value;
    const apellidoM = document.getElementById('apellidoM').value;
    const institucion = document.getElementById('institucion').value;
    const correo = document.getElementById('correo').value;
    const curso = document.getElementById('curso').value;
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

    // construir html del modal
    const htmlPreview = `
        <div style="text-align:left; font-size:14px">

            <p class="text-sm text-gray-700 font-bold">Nombre: <span class='font-normal'>${name}</span></p>
            <p class="text-sm text-gray-700 font-bold">Apellido Paterno: <span class='font-normal'>${apellidoP}</span></p>
            <p class="text-sm text-gray-700 font-bold">Apellido Materno: <span class='font-normal'>${apellidoM}</span></p>
            <p class="text-sm text-gray-700 font-bold">Correo: <span class='font-normal'>${correo}</span></p>
            <p class="text-sm text-gray-700 font-bold">Curso: <span class='font-normal'>${curso}</span></p>
            <p class="text-sm text-gray-700 font-bold">Institución: <span class='font-normal'>${institucion}</span></p>


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
