<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __("¡Bienvenido al panel de administración del 3er Encuentro de Cuerpos Academicos!") }}
                </div>

        {{-- <x-dashboard-card href="{{ route('proveedores.index') }}" bg="bg-blue-50 dark:bg-blue-900/20" title="Proveedores"
            desc="Gestión de proveedores" iconBg="bg-blue-500">
            <x-slot:icon>
                <x-heroicon-o-truck class="w-6 h-6" />
            </x-slot:icon>
        </x-dashboard-card> --}}
        </div>
    </div>
</x-app-layout>
