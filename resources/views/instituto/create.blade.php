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
        @if (session('error'))
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-md mb-4">
                {{ session('error') }}
            </p>
        @endif
        <h1 class="text-xl text-center font-semibold text-gray-800 mb-2 mt-6">
            Registro de institutos al 3er. Encuentro de CA's
        </h1>

        <p class="text-center text-sm text-gray-600 mb-6">
            Completa los siguientes campos para registrar el instituto.
        </p>

        <form action="{{ route('instituto.store') }}" id="myForm" method="POST"
            class="flex flex-col gap-4">
            @csrf
            <!-- nombre -->
            <div class="mt-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre del instituto: *</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required
                    placeholder="Ingrese el nombre"
                    class="w-full mt-2 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('nombre')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Botón -->
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('instituto.index') }}" class="bg-[#A57F2C] text-white px-8 py-2 rounded text-sm">
                    Regresar
                </a>
                <button type="submit"
                    class=" bg-[#611232] text-white px-8 py-2 rounded-md text-sm transition duration-200">
                    Registrar
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
