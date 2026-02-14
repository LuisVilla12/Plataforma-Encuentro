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
            Detalles del revisor {{ $revisor->id }}
        </h1>
        <form method="POST" >
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre completo: *</label>
                <input type="text" name="name" id="name" readonly autofocus value="{{ $revisor->name }}" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('name')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Area del trabajo: *</label>
                <input type="text" name="area" id="area" readonly autofocus value="{{ $revisor->area }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('area')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Institución: *</label>
                <input type="text" name="institucion" id="institucion" readonly autofocus value="{{ $revisor->institucion }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('institucion')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Correo electrónico: *</label>
                <input type="email" name="email" id="email" readonly autofocus  value="{{ $revisor->email }}"                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                @error('email')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-end mt-4">

            </div>
        </form>
        <div class="flex justify-end">
                <a href="{{ route('revisores.index') }}"
                    class="text-center mt-4 bg-[#051a39] hover:bg-gray-800 text-white px-4 py-2 rounded-md text-sm transition duration-200">
                    Regresar
                </a>
            </div>

    </div>

</body>

</html>


{{-- </x-guest-layout> --}}
