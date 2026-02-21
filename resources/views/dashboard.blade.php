<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __("¡Bienvenido al panel de administración del 3er Encuentro de Cuerpos Academicos!") }}
                </div>
            @if(auth()->user()->tipo == 1)
                 <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">

                <!-- Asistentes -->
                <a href="{{ route('formulario_asistencia.index') }}"
                   class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition duration-300 border hover:border-blue-900">
                    <h3 class="text-lg font-semibold text-gray-800">Asistentes</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Gestión de registros de asistentes
                    </p>
                </a>

                <!-- Cursos -->
                <a href="{{ route('formulario_cursos.index') }}"
                   class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition duration-300 border hover:border-blue-900">
                    <h3 class="text-lg font-semibold text-gray-800">Cursos</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Administración de cursos
                    </p>
                </a>

                <!-- Capítulos -->
                <a href="{{ route('formulario_capitulo.index') }}"
                   class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition duration-300 border hover:border-blue-900">
                    <h3 class="text-lg font-semibold text-gray-800">Capítulos</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Registro de capítulos de libro
                    </p>
                </a>

                <!-- Prototipos -->
                <a href="{{ route('formulario_prototipo.index') }}"
                   class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition duration-300 border hover:border-blue-900">
                    <h3 class="text-lg font-semibold text-gray-800">Prototipos</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Gestión de prototipos registrados
                    </p>
                </a>

                <!-- Carteles -->
                <a href="{{ route('formulario_cartel.index') }}"
                   class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition duration-300 border hover:border-blue-900">
                    <h3 class="text-lg font-semibold text-gray-800">Carteles</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Administración de carteles
                    </p>
                </a>

                <!-- Revisores -->
                <a href="{{ route('revisores.index') }}"
                   class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition duration-300 border hover:border-blue-900">
                    <h3 class="text-lg font-semibold text-gray-800">Revisores</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Gestión de revisores
                    </p>
                </a>

            </div>
            @endif
        </div>
    </div>
</x-app-layout>
