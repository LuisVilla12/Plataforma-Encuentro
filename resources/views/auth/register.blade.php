{{-- <x-guest-layout> --}}
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
            Registro de revisores para el 3er. Encuentro de CA's
        </h1>

        <p class="text-center text-sm text-gray-600 mb-6">
            Completa los siguientes campos para registrar tu participación.
        </p>

        <form method="POST" action="{{ route('register') }}" id="myForm">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre completo: *</label>
                <input type="text" name="name" id="name" required autofocus
                    placeholder="Ingrese su nombre completo"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('name')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Area del trabajo: *</label>
                <input type="text" name="area" id="area" required autofocus
                    placeholder="Ingrese su área de trabajo"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('area')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- instituciones --}}
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
                    <option value="Otra">Otra</option>
                </select>
                @error('institucion')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
             <div id="otraInstitucionContainer" class="mt-2 hidden">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Especifica tu institución: *</label>
                <input type="text" name="otra_institucion" id="otra_institucion"
                    value="{{ old('otra_institucion') }}" placeholder="Ingrese el nombre de su institución"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
            </div>
            <div class="mt-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Correo electrónico: *</label>
                <input type="email" name="email" id="email" required autofocus
                    placeholder="Ingrese su correo electrónico"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('email')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Contraseña: *</label>
                <input type="password" name="password" id="password" required autofocus
                    placeholder="Ingrese su contraseña"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('password')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Confirmar contraseña: *</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required autofocus
                    placeholder="Confirme su contraseña"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('password_confirmation')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Registrarse') }}
                </x-primary-button>
            </div>
        </form>
        <p class="text-xs text-gray-500 text-center mt-4">
            * Todos los campos son obligatorios
        </p>

    </div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectInstitucion = document.getElementById("institucion");
        const otraContainer = document.getElementById("otraInstitucionContainer");
        const otraInput = document.getElementById("otra_institucion");

        selectInstitucion.addEventListener("change", function() {
            if (this.value === "Otra") {
                otraContainer.classList.remove("hidden");
                otraInput.setAttribute("required", "required");
            } else {
                otraContainer.classList.add("hidden");
                otraInput.removeAttribute("required");
                otraInput.value = "";
            }
        });
    });
    const form = document.getElementById('myForm');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        // obtener valores
        const nombre = document.getElementById('nombre').value;
        const correo = document.getElementById('correo').value;
        const institucion = document.getElementById('institucion').value;
        const otra_institucion = document.getElementById('otra_institucion').value;

        // construir html del modal
        const htmlPreview = `
        <div style="text-align:left; font-size:14px">

            <p class="text-sm text-gray-700 font-bold">Autores: <span class='font-normal'>${nombre} </span></p>

            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
            Institución: <span class='font-normal'>${institucion}</span>
            </p>
            ${otra_institucion ? `<p class="text-sm text-gray-700 font-bold" style="margin-top:10px">Otra institución: <span class='font-normal'>${otra_institucion}</span></p>` : ''}

            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
            Correo electrónico: <span class='font-normal'>${correo}</span>
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

</html>


{{-- </x-guest-layout> --}}
