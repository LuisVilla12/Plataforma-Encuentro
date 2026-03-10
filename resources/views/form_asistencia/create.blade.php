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

        <form action="{{ route('formulario_asistencia.store') }}" id="myForm" method="POST"
            class="flex flex-col gap-4">
            @csrf
            <!-- apellido P -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Apellido paterno: *</label>
                <input type="text" name="apellidoP" id="apellidoP" value="{{ old('apellidoP') }}" required
                    placeholder="Ingrese su apellido paterno"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('apellidoP')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- apellido M -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Apellido materno: *</label>
                <input type="text" name="apellidoM" id="apellidoM" value="{{ old('apellidoM') }}" required
                    placeholder="Ingrese su apellido materno"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('apellidoM')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- nombre -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombres: *</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required
                    placeholder="Ingrese su nombre"
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
            <!-- Correo electronico -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Correo electrónico: *
                </label>
                <input type="email" name="correo" id="correo" required placeholder="Correo electrónico"
                    value="{{ old('correo') }}"
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
                    value="{{ old('celular') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('celular')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Modalidad de participación: *
                </label>

                <div class="flex items-center space-x-6">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="modalidad_participacion[]" value="Asistente"
                            class="rounded border-gray-300 text-blue-900 focus:ring-blue-900">
                        <span class="text-sm text-gray-700">Asistente</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="modalidad_participacion[]" value="Ponente de cartel"
                            class="rounded border-gray-300 text-blue-900 focus:ring-blue-900">
                        <span class="text-sm text-gray-700">Ponente de cartel</span>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="modalidad_participacion[]" value="Participante de prototipo"
                            class="rounded border-gray-300 text-blue-900 focus:ring-blue-900">
                        <span class="text-sm text-gray-700">Participante de prototipo</span>
                    </label>

                </div>

                @error('modalidad_participacion')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nombre del cuerpo academico: *
                </label>
                <input type="text" name="nombre_ca" id="nombre_ca" required placeholder="Nombre del cuerpo academico"
                    value="{{ old('nombre_ca') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('nombre_ca')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Clave del cuerpo academico: *
                </label>
                <input type="text" name="clave_ca" id="clave_ca" required
                    placeholder="Clave del cuerpo academico" value="{{ old('clave_ca') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('clave_ca')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Requiere oficio de invitación: *
                </label>
                <select name="requiere_oficio" id="requiere_oficio" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                @error('requiere_oficio')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Nombre de oficio --}}
            <div id="nombreOficioContainer" class="hidden">
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nombre a quien va dirigido el oficio: *
                </label>
                <input type="text" name="nombre_oficio" id="nombre_oficio" value="{{ old('nombre_oficio') }}"
                    placeholder="Ingrese el nombre de su institución"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('nombre_oficio')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- EVENTO -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    ¿Como te enteraste del evento?: *
                </label>
                <select name="interes" id="interes" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="1">Red social</option>
                    <option value="2">Medios de comunicación</option>
                    <option value="3">Amigos o familiares</option>
                    <option value="4">Otro</option>
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
            <button type="submit" class=" bg-[#611232]  text-white py-2 rounded-md text-sm transition duration-200">
                Registrar
            </button>
            <button type="submit" class=" bg-[#611232]  text-white py-2 rounded-md text-sm transition duration-200">
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
    document.addEventListener("DOMContentLoaded", function() {
        const selectInstitucion = document.getElementById("institucion");
        const otraContainer = document.getElementById("otraInstitucionContainer");
        const otraInput = document.getElementById("otra_institucion");
        const selecOficio = document.getElementById("requiere_oficio");
        const nombreOficioContainer = document.getElementById("nombreOficioContainer");
        const nombreOficioInput = document.getElementById("nombreOficio");

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
        selecOficio.addEventListener("change", function() {
            if (this.value === "Si") {
                nombreOficioContainer.classList.remove("hidden");
            } else {
                nombreOficioContainer.classList.add("hidden");
            }
        });
    });
    const form = document.getElementById('myForm');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        // obtener valores
        const nombre = document.getElementById('nombre').value;
        const apellidoP = document.getElementById('apellidoP').value;
        const apellidoM = document.getElementById('apellidoM').value;
        const correo = document.getElementById('correo').value;
        const celular = document.getElementById('celular').value;
        const clave_ca = document.getElementById('clave_ca').value;
        const nombre_ca = document.getElementById('nombre_ca').value;
        const institucion = document.getElementById('institucion').value;
        const otra_institucion = document.getElementById('otra_institucion').value;
        const interes = document.getElementById('interes').value;
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

            <p class="text-sm text-gray-700 font-bold">Autores: <span class='font-normal'>${nombre} ${apellidoP} ${apellidoM}</span></p>

            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
            Institución: <span class='font-normal'>${institucion}</span>
            </p>
            ${otra_institucion ? `<p class="text-sm text-gray-700 font-bold" style="margin-top:10px">Otra institución: <span class='font-normal'>${otra_institucion}</span></p>` : ''}

            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
            Correo electrónico: <span class='font-normal'>${correo}</span>
            </p>

            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
            Celular: <span class='font-normal'>${celular}</span>
            </p>

                            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
            Nombre CA: <span class='font-normal'>${nombre_ca}</span>
            </p>

                        <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
            Clave CA: <span class='font-normal'>${clave_ca}</span>
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
