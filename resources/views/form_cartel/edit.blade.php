<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>III Encuentro de CA's</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="max-w-xl mx-auto mt-12 bg-white shadow-md rounded-lg px-8 py-6">

        {{-- <img src="Encabezado.jpeg" alt="encabezado" class="w-full h-20 object-cover my-4"> --}}
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: "Éxito",
                        text: "{{ session('success') }}",
                        icon: "success",
                        draggable: true,
                        timer: 4000,
                        showConfirmButton: false
                    });
                });
            </script>
        @endif
        <h1 class="text-xl text-center font-semibold text-gray-800 mb-2 mt-6">
            Editar registro de cartel de investigación
        </h1>

        <p class="text-center text-sm text-gray-600 mb-6">
            Completa los siguientes campos para registrar tu participación.
        </p>

        <form action="{{ route('formulario_cartel.update', $dato) }}" id="myForm" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
            @csrf
            @method('PUT')
            <!-- Autores -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Autores: *
                </label>

                <div id="contenedor-autores">
                    <div class="flex mb-2">
                        {{-- <input type="text" name="autores[]" required
                            placeholder="Apellido Paterno Apellido Materno Nombres"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900"> --}}
                    </div>
                </div>

                <button type="button" onclick="agregarAutor()"
                    class="bg-[#611232] text-white px-3 py-1 rounded text-sm">
                    + Agregar autor
                </button>

                @error('autores.*')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Institucion --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Institución de procedencia: *
                </label>
                <input type="text" name="institucion" id="institucion" value="{{ $dato->institucion }}" required
                    placeholder="Ingrese su institucion"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('institucion')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Nombre --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nombre del cartel: *
                </label>
                <input type="text" name="nombre" id="nombre" value="{{ $dato->nombre }}" required
                    placeholder="Ingrese el nombre del cartel"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('nombre')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Correo --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Correo institucional: *
                </label>
                <input type="email" name="correo" id="correo" value="{{ $dato->correo }}" required
                    placeholder="Ingrese su correo institucional"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('correo')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Correo --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Correo institucional: *
                </label>
                <input type="email" name="correo" id="correo" value="{{ $dato->correo }}" required
                    placeholder="Ingrese su correo institucional"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('correo')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Temática: *
                </label>
                <select name="tematica" id="tematica" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                    <option value="" disabled selected>Selecciona la temática</option>
                    <option {{ $dato->tematica == "Procesos productivos, energías renovables, electromovilidad y semiconductores" ? 'selected' : '' }} value="Procesos productivos, energías renovables, electromovilidad y semiconductores">
                        Procesos productivos, energías renovables, electromovilidad y semiconductores
                    </option>
                    <option {{ $dato->tematica == "Medio Ambiente, Biotecnología y Sustentabilidad" ? 'selected' : '' }} value="Medio Ambiente, Biotecnología y Sustentabilidad">Medio Ambiente, Biotecnología y Sustentabilidad</option>
                    <option {{ $dato->tematica == "Sistema de Gestión Económico Administrativo y Sociedad" ? 'selected' : '' }} value="Sistema de Gestión Económico Administrativo y Sociedad">Sistema de Gestión Económico Administrativo y Sociedad</option>
                    <option {{ $dato->tematica == "Tecnología de la información y comunicación" ? 'selected' : '' }} value="Tecnología de la información y comunicación">Tecnología de la información y comunicación</option>
                    <option {{ $dato->tematica == "Innovación en Alimentos, Nutrición y Bienestar" ? 'selected' : '' }} value="Innovación en Alimentos, Nutrición y Bienestar">Innovación en Alimentos, Nutrición y Bienestar</option>
                    <option {{ $dato->tematica == "Por asignar" ? 'selected' : '' }} value="Por asignar">Por asignar</option>
                </select>
                @error('tematica')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center gap-4">
                <label class="block text-sm font-semibold text-gray-700">
                    Resumen de cartel (máx 1MB):*
                </label>

                <div id="resumen_actual" class="flex items-center gap-2">
                    <a href="{{ route('formulario_cartel.descargar',['dato' => $dato,'tipo' => 'resumen']) }}" target="_blank">
                        <x-heroicon-o-document-text class="w-5 h-5 text-blue-700" />
                    </a>

                    <button type="button" onclick="quitarArchivo('resumen')"
                        class="bg-red-600 text-white px-2 py-1 rounded text-xs">
                        Quitar
                    </button>
                </div>

                <input type="file" name="url_resumen" id="input_resumen" class="hidden"
                    accept=".docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document">

                <input type="hidden" name="eliminar_resumen" id="eliminar_resumen" value="0">
            </div>

            @error('url_resumen')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div class="flex items-center gap-4">
                <label class="block text-sm font-semibold text-gray-700">
                    Cartel (máx 3MB):*
                </label>

                <div id="cartel_actual" class="flex items-center gap-2">
                    <a href="{{ route('formulario_cartel.descargar',['dato' => $dato,'tipo' => 'cartel']) }}" target="_blank">
                        <x-heroicon-o-document-text class="w-5 h-5 text-blue-700" />
                    </a>

                    <button type="button" onclick="quitarArchivo('cartel')"
                        class="bg-red-600 text-white px-2 py-1 rounded text-xs">
                        Quitar
                    </button>
                </div>

                <input type="file" name="url_cartel" id="input_cartel" class="hidden"
                    accept=".pptx,application/vnd.openxmlformats-officedocument.presentationml.presentation">

                <input type="hidden" name="eliminar_cartel" id="eliminar_cartel" value="0">
            </div>

            @error('url_cartel')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div class="flex items-center gap-4">
                <label class="block text-sm font-semibold text-gray-700">
                    Imágenes del cartel (máx 5MB):*
                </label>

                <div id="zip_actual" class="flex items-center gap-2">
                    <a href="{{ route('formulario_cartel.descargar',['dato' => $dato,'tipo' => 'zip']) }}" target="_blank">
                        <x-heroicon-o-document-text class="w-5 h-5 text-blue-700" />
                    </a>

                    <button type="button" onclick="quitarArchivo('zip')"
                        class="bg-red-600 text-white px-2 py-1 rounded text-xs">
                        Quitar
                    </button>
                </div>

                <input type="file" name="url_zip" id="input_zip" class="hidden" accept=".zip,application/zip">

                <input type="hidden" name="eliminar_zip" id="eliminar_zip" value="0">
            </div>

            @error('url_zip')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div class="flex items-center gap-4">
                <label class="block text-sm font-semibold text-gray-700">
                    Cesión de derechos (máx 1MB):*
                </label>

                <div id="cesion_actual" class="flex items-center gap-2">
                    <a href="{{ route('formulario_cartel.descargar',['dato' => $dato,'tipo' => 'cesion']) }}" target="_blank">
                        <x-heroicon-o-document-text class="w-5 h-5 text-blue-700" />
                    </a>

                    <button type="button" onclick="quitarArchivo('cesion')"
                        class="bg-red-600 text-white px-2 py-1 rounded text-xs">
                        Quitar
                    </button>
                </div>

                <input type="file" name="url_cesion_derechos" id="input_cesion" class="hidden"
                    accept=".pdf,application/pdf">

                <input type="hidden" name="eliminar_cesion" id="eliminar_cesion" value="0">
            </div>

            @error('url_cesion_derechos')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div class="flex items-center gap-4">
                <label class="block text-sm font-semibold text-gray-700">
                    INE (máx 1MB):*
                </label>

                <div id="cesion_actual" class="flex items-center gap-2">
                    <a href="{{ route('formulario_cartel.descargar',['dato' => $dato,'tipo' => 'ine']) }}" target="_blank">
                        <x-heroicon-o-document-text class="w-5 h-5 text-blue-700" />
                    </a>

                    <button type="button" onclick="quitarArchivo('cesion')"
                        class="bg-red-600 text-white px-2 py-1 rounded text-xs">
                        Quitar
                    </button>
                </div>

                <input type="file" name="url_cesion_derechos" id="input_cesion" class="hidden"
                    accept=".pdf,application/pdf">

                <input type="hidden" name="eliminar_cesion" id="eliminar_cesion" value="0">
            </div>

            @error('url_cesion_derechos')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror

            {{-- Confirmación --}}
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
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('formulario_cartel.index') }}" class="bg-[#A57F2C] text-white px-8 py-2 uppercase rounded text-sm">
                    Regresar
                </a>
                <button type="submit"
                    class=" bg-[#611232] text-white px-8 py-2 rounded-md text-sm transition uppercase duration-200">
                    Actualizar
                </button>
            </div>

        </form>

        <p class="text-xs text-gray-500 text-center mt-4">
            * Todos los campos son obligatorios
        </p>

    </div>

</body>

</html>
<script>
    const autores = @json($dato->autores);

    function quitarArchivo(tipo) {

        document.getElementById(tipo + "_actual").style.display = "none";

        document.getElementById("input_" + tipo).classList.remove("hidden");

        document.getElementById("eliminar_" + tipo).value = 1;

    }
    document.addEventListener("DOMContentLoaded", function() {
        if (autores && autores.length > 0) {
            autores.forEach(autor => {
                agregarAutor(autor);
            });
        }


        // Validar tamaño de archivo
        // document.getElementById('url_resumen').addEventListener('change', function() {
        //     const file = this.files[0];
        //     const maxSize = 1 * 1024 * 1024; // 1MB
        //     if (file && file.size > maxSize) {
        //         alert("El archivo no puede ser mayor a 1MB");
        //         this.value = "";
        //     }
        // });
        // // Validar tamaño de archivo
        // document.getElementById('url_cartel').addEventListener('change', function() {
        //     const file = this.files[0];
        //     const maxSize = 3 * 1024 * 1024; // 3MB
        //     if (file && file.size > maxSize) {
        //         alert("El archivo no puede ser mayor a 3MB");
        //         this.value = "";
        //     }
        // });
        // // Validar tamaño de archivo
        // document.getElementById('url_zip').addEventListener('change', function() {
        //     const file = this.files[0];
        //     const maxSize = 5 * 1024 * 1024; // 5MB
        //     if (file && file.size > maxSize) {
        //         alert("El archivo no puede ser mayor a 5MB");
        //         this.value = "";
        //     }
        // });
        // // sesion
        // document.getElementById('url_cesion_derechos').addEventListener('change', function() {
        //     const file = this.files[0];
        //     const maxSize = 1 * 1024 * 1024; // 1MB
        //     if (file && file.size > maxSize) {
        //         alert("El archivo no puede ser mayor a 1MB");
        //         this.value = "";
        //     }
        // });
        // // Validar tamaño de archivo
        // document.getElementById('url_ine').addEventListener('change', function() {
        //     const file = this.files[0];
        //     const maxSize = 1 * 1024 * 1024; // 1MB
        //     if (file && file.size > maxSize) {
        //         alert("El archivo no puede ser mayor a 1MB");
        //         this.value = "";
        //     }
        // });
    });

    function agregarAutor(valor = "") {

        const contenedor = document.getElementById('contenedor-autores');

        const div = document.createElement('div');
        div.classList.add('flex', 'mb-2');

        div.innerHTML = `
        <input type="text" name="autores[]" required
            value="${valor}"
            placeholder="Apellido Paterno Apellido Materno Nombres"
            class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">

        <button type="button" onclick="this.parentElement.remove()"
            class="ml-2 bg-[#611232] text-white px-2 rounded">
            X
        </button>
    `;

        contenedor.appendChild(div);
    }
    const form = document.getElementById('myForm');
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const autoresInputs = document.querySelectorAll('input[name="autores[]"]');
        let autores = [];
        autoresInputs.forEach(input => {
            if (input.value.trim() !== "") {
                autores.push(input.value.trim());
            }
        });
        const autoresLista = autores.map(a => `<li>${a}</li>`).join("");
        const institucion = document.getElementById('institucion').value;
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
        const htmlPreview = `
        <div style="text-align:left; font-size:14px">
            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
                Autores:
            </p>
            <ul style="margin-left:20px; margin-top:5px; margin-bottom:10px;">
                ${autoresLista}
            </ul>
            <p class="text-sm text-gray-700 font-bold" style="margin-top:10px">
            Institución: <span class='font-normal'>${institucion}</span>
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
            confirmButtonText: 'Actualizar',
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
