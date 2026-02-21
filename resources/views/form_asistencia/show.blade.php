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

        <h1 class="text-xl text-center font-semibold text-gray-800 mb-2 mt-6">
            Registro de asistencia al 3er. Encuentro de CA's
        </h1>
        <p class="text-center text-sm text-gray-600 mb-6">
            Detalles del registro de asistencia.
        <div>
            <!-- nombre -->
            <div class="mt-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre completo: *</label>
                <input type="text" name="nombre" id="nombre" value="{{ $dato->nombre }}" readonly
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
            </div>

            <!-- Institución -->
            <div class="mt-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Institución de procedencia: *
                </label>
                <input type="text" name="institucion" id="institucion" readonly
                    placeholder="Nombre de la institución" value="{{ $dato->institucion }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
            </div>
            <!-- Correo electronico -->
            <div class="mt-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Correo electrónico: *
                </label>
                <input type="email" name="correo" id="correo" required
                    placeholder="Correo electrónico" value="{{ $dato->correo }}" readonly
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
            </div>
            <div class="mt-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Telefono: *
                </label>
                <input type="tel" name="celular" id="celular" required
                    placeholder="Número de teléfono" value="{{ $dato->celular }}" readonly
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
            </div>
            <div class="mt-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nombre del cuerpo academico: *
                </label>
                <input type="text" name="nombre_ca" id="nombre_ca"  readonly
                    placeholder="Nombre del cuerpo academico" value="{{ $dato->nombre_ca }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
            </div>
            <div class="mt-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Clave del cuerpo academico: *
                </label>
                <input type="text" name="clave_ca" id="clave_ca" readonly
                    placeholder="Clave del cuerpo academico" value="{{ $dato->clave_ca }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
            </div>
            <!-- Curso -->
            <div class="mt-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    ¿Como te enteraste del evento?: *
                </label>
                <select name="interes" id="interes" readonly
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                    <option value="1" {{ $dato->interes == 1 ? 'selected' : '' }}>Red social</option>
                    <option value="2" {{ $dato->interes == 2 ? 'selected' : '' }}>Medios de comunicación</option>
                    <option value="3" {{ $dato->interes == 3 ? 'selected' : '' }}>Amigos o familiares</option>
                    <option value="4" {{ $dato->interes == 4 ? 'selected' : '' }}   >Otro</option>
                </select>

            </div>
            <div class="flex justify-end">
                <a href="{{ route('formulario_asistencia.index') }}"
                    class="text-center mt-4 bg-[#611232] hover:bg-gray-800 text-white px-4 py-2 rounded-md text-sm transition duration-200">
                    Regresar
                </a>
            </div>

        </div>
    </div>

</body>

</html>
