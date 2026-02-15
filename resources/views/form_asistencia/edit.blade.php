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
            Registro de asistencia al 3er. Encuentro de CA's
        </h1>

        <p class="text-center text-sm text-gray-600 mb-6">
            Completa los siguientes campos para registrar tu participación.
        </p>

        <form action="{{ route('formulario_asistencia.update', ['dato' => $dato]) }}" id="" method="POST"
            class="flex flex-col gap-4">
            @csrf
            @method('PUT')
            <!-- nombre -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre completo: *</label>
                <input type="text" name="nombre" id="nombre" value="{{ $dato->nombre }}" required
                    placeholder="Ingrese su nombre completo"
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
                    placeholder="Nombre de la institución" value="{{ $dato->institucion }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('institucion')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Correo electronico -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Correo electrónico: *
                </label>
                <input type="email" name="correo" id="correo" required placeholder="Correo electrónico"
                    value="{{ $dato->correo }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('correo')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Telefono: *
                </label>
                <input type="tel" name="celular" id="celular" required placeholder="Número de teléfono"
                    value="{{ $dato->celular }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('celular')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nombre del cuerpo academico: *
                </label>
                <input type="text" name="nombre_ca" id="nombre_ca" required placeholder="Nombre del cuerpo academico"
                    value="{{ $dato->nombre_ca }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('nombre_ca')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Clave del cuerpo academico: *
                </label>
                <input type="text" name="clave_ca" id="clave_ca" required placeholder="Clave del cuerpo academico"
                    value="{{ $dato->clave_ca }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('clave_ca')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Curso -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    ¿Como te enteraste del evento?: *
                </label>
                <select name="interes" id="interes" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                    <option value="1" {{ $dato->interes == 1 ? 'selected' : '' }}>Red social</option>
                    <option value="2" {{ $dato->interes == 2 ? 'selected' : '' }}>Medios de comunicación</option>
                    <option value="3" {{ $dato->interes == 3 ? 'selected' : '' }}>Amigos o familiares</option>
                    <option value="4" {{ $dato->interes == 4 ? 'selected' : '' }}>Otro</option>
                </select>
                @error('interes')
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
            <div class="flex justify-between">
                <a href="{{ route('formulario_asistencia.index') }}"
                    class="text-center mt-4 bg-[#051a39] hover:bg-gray-800 text-white px-4 py-2 rounded-md text-sm transition duration-200">
                    Regresar
                </a>
                <button type="submit"
                    class="mt-4 bg-[#051a39] hover:bg-gray-800 text-white py-2 rounded-md text-sm transition duration-200">
                    Actualizar registro
                </button>
            </div>

        </form>

        <p class="text-xs text-gray-500 text-center mt-4">
            * Todos los campos son obligatorios
        </p>

    </div>

</body>

</html>
