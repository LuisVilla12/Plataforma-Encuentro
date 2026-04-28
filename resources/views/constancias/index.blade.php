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


<body class="bg-gray-100 font-sans mx-auto">
    <header class="sticky top-0 z-50 border-b bg-white backdrop-blur">
        <div class="mx-auto max-w-7xl px-5">
      <div class="flex h-20 items-center justify-between">
        <!-- Logo -->
        <a href="#inicio" class="flex items-center gap-3">
          <div
            class="grid h-10 w-10 place-items-center overflow-hidden rounded-xl bg-primary text-white font-extrabold">
            <img src="assets/logo_CA.jpeg" alt="Logo" class="h-full w-full object-cover" />
          </div>
          <div class="leading-tight">
            <p class="text-sm font-extrabold">III Encuentro de Cuerpos Académicos</p>
            <p class="text-xs text-gray-600">Sede: TecNM/ITS Perote</p>
          </div>
        </a>
        <div class="hidden h-10 w-px bg-black/20 md:block"></div>
        <!-- Menú (desktop) -->
        <nav class="hidden items-center gap-3 md:flex">
          <!-- Publicaciones (dropdown) -->
          <div class="relative group" id="publicacionesMenu">
            <button type="button"
              class="inline-flex items-center gap-2 rounded-xl px-1 py-2 text-sm font-semibold text-gray-700 hover:text-primary hover:bg-gray-50 transition">
              Publicaciones
              <svg class="h-4 w-4 text-gray-500 transition group-hover:rotate-180" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </button>

            <!-- Dropdown -->
            <div id="publicacionesDropdown"
              class="invisible absolute right-0 mt-2 w-72 rounded-2xl border bg-white shadow-lg opacity-0 transition-all duration-200 group-hover:visible group-hover:opacity-100">
              <div class="p-3 space-y-3">

                <!-- LIBRO -->
                <div>
                  <p class="text-xs font-extrabold text-gray-500">Libro</p>
                  <a href="https://ciencia.covecyt.gob.mx/wp-content/uploads/2025/10/LIBRO_Acercando-la-tecnologia-a-la-sustentabilidad_2025_.pdf"
                    target="_blank" rel="noopener noreferrer"
                    class="mt-2 block rounded-xl p-3 hover:bg-gray-50 transition">
                    <p class="text-sm font-extrabold text-primary">
                      Acercando la tecnología a la sustentabilidad 2025
                    </p>
                    <p class="text-xs text-gray-600">Descargar PDF</p>
                  </a>
                </div>

                <!-- MEMORIA -->
                <div>
                  <p class="text-xs font-extrabold text-gray-500">Memoria</p>
                  <div class="mt-2 rounded-xl bg-gray-50 p-3 text-sm text-gray-500">
                    Próximamente disponible
                  </div>
                </div>

              </div>
            </div>
          </div>

          <a href="#sede"
            class="text-sm font-semibold text-gray-700 hover:text-primary transition rounded-xl px-2 py-2 hover:bg-gray-50">
            Sede
          </a>

          <a href="#galeria"
            class="text-sm font-semibold text-gray-700 hover:text-primary transition rounded-xl px-2 py-2 hover:bg-gray-50">
            Galería
          </a>


          <div class="hidden h-10 w-px bg-black/20 md:block"></div>

          <a href="https://encuentro-ca.itsx.edu.mx/login"
            class="rounded-xl bg-primary px-2 py-2 text-sm font-semibold text-white hover:bg-primary2 transition">
            Login
          </a>
        </nav>

        <!-- Botón móvil (hamburguesa -> X) -->
        <button id="menuBtn"
          class="md:hidden inline-flex items-center justify-center rounded-xl border px-3 py-2 text-sm font-semibold hover:bg-gray-100"
          aria-expanded="false" aria-controls="mobileMenu" aria-label="Abrir menú" type="button">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path id="iconHamburger" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"></path>
            <path id="iconClose" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Menú móvil -->
      <div id="mobileMenu" class="hidden pb-3 md:hidden">
        <div class="grid gap-2 pt-2">
          <details class="rounded-xl border bg-white">
            <summary
              class="cursor-pointer select-none px-3 py-2 text-sm font-extrabold text-gray-800 list-none flex items-center justify-between">
              Publicaciones
            </summary>

            <div class="px-3 pb-3 space-y-3">

              <div>
                <p class="text-xs font-extrabold text-gray-500">Libro</p>
                <a href="https://ciencia.covecyt.gob.mx/wp-content/uploads/2025/10/LIBRO_Acercando-la-tecnologia-a-la-sustentabilidad_2025_.pdf"
                  target="_blank"
                  class="mt-2 block rounded-xl bg-gray-50 px-3 py-2 text-sm font-semibold hover:bg-gray-100">
                  Acercando la tecnología a la sustentabilidad 2025
                </a>
              </div>

              <div>
                <p class="text-xs font-extrabold text-gray-500">Memoria</p>
                <div class="mt-2 rounded-xl bg-gray-50 px-3 py-2 text-sm text-gray-500">
                  Próximamente disponible
                </div>
              </div>

            </div>
          </details>

          <a href="#sede" class="rounded-xl border px-3 py-2 text-sm font-semibold hover:bg-gray-100">
            Sede
          </a>

          <a href="#galeria" class="rounded-xl border px-3 py-2 text-sm font-semibold hover:bg-gray-100">
            Galería
          </a>

          <div class="h-px bg-black/10 my-2"></div>
          <p class="text-sm font-semibold text-primary">Regístrate:</p>
          <a href="https://encuentro-ca.itsx.edu.mx/registrar-asistencia"
            class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
            Asistencia
          </a>
          <a href="https://encuentro-ca.itsx.edu.mx/registrar-cursos"
            class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
            Cursos
          </a>
          <a id="btnCarteles2"
            href="https://encuentro-ca.itsx.edu.mx/registrar-cartel"
            class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
            Carteles
          </a>
          <a href="https://encuentro-ca.itsx.edu.mx/registrar-prototipo"
            class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
            Prototipo
          </a>
          <a href="https://encuentro-ca.itsx.edu.mx/login"
            class="rounded-xl bg-primary px-3 py-2 text-sm font-semibold text-white hover:bg-primary2 transition">
            Login
          </a>
        </div>
      </div>
        </div>
    </header>

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 my-4 mx-auto w-10/12">
        {{-- Buscador --}}
        <form method="GET" action="{{ route('formulario_asistencia.index') }}" class="w-full md:w-1/3">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar asistente..."
                    class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">

                <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                </svg>
            </div>

            @if (request('search'))
                <a href="{{ route('formulario_asistencia.index') }}"
                    class="inline-block mt-1 text-sm text-gray-500 hover:text-indigo-600">
                    Limpiar búsqueda
                </a>
            @endif
        </form>
    </div>
    <div class="shadow-md overflow-x-auto rounded-lg mt-5 w-10/12 mx-auto">
        @if ($datos->count() > 0)
            <div class="hidden md:block">
                <table class="w-full border bg-white shadow rounded">
                    <thead class="bg-[#611232]">
                        <tr>
                            <th class="p-2 text-white">N° </th>
                            <th class="p-2 text-white">Nombre completo </th>
                            <th class="p-2 text-white">Instituto</th>
                            <th class="p-2 text-white">Participacion</th>
                            <th class="p-2 text-white">Constancia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $dato)
                            <tr class="border-t">
                                <td class="p-2 text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-2 text-center">
                                    {{ $dato->nombre . ' ' . $dato->apellidoP . ' ' . $dato->apellidoM }}
                                </td>
                                <td class="p-2">
                                    {{ $dato->institucion }}
                                </td>
                                <td class="p-2"> Asistencia</td>
                                <td class="p-2">
                                    <a href="{{ route('constancias.descargar',['dato' => $dato,'tipo' => 'asistente']) }}"
                                        target="_blank"><x-heroicon-o-document-text class="w-4 h-4" /></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- CARDS: visible en tablet y móvil -->
            <div class="md:hidden space-y-4">
                @foreach ($datos as $dato)
                    <div class="border rounded-lg shadow bg-white p-4">
                        <div class="mt-2">
                            <div class="mb-2 text-sm text-gray-500">
                                <span>Nombre completo:</span>
                                <span class="font-medium text-gray-800">
                                    {{ $dato->nombre }}
                                </span>
                            </div>
                            <div class="">
                                <p class="mb-2 text-sm">Institución:
                                    <span class="font-semibold">
                                        {{ $dato->institucion }}
                                    </span>
                                </p>
                            </div>
                            <div class="">
                                <p class="mb-2 text-sm">Correo electrónico:
                                    <span class="font-semibold">
                                        {{ $dato->correo }}
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center justify-end mt-4 gap-4">
                            {{-- Ver --}}
                            <a href="{{ route('formulario_asistencia.show', ['dato' => $dato]) }}"
                                class="inline-flex items-center gap-1 text-gray-600 hover:text-blue-600 transition">
                                <x-heroicon-o-eye class="w-4 h-4" />
                                <span class="hidden sm:inline">Ver</span>
                            </a>
                            {{-- Editar --}}
                            <a href="{{ route('formulario_asistencia.edit', ['dato' => $dato]) }}"
                                class="inline-flex items-center gap-1 text-gray-600 hover:text-indigo-600 transition">
                                <x-heroicon-o-pencil-square class="w-4 h-4" />
                                <span class="hidden sm:inline">Editar</span>
                            </a>
                            <span class="hidden sm:inline text-gray-300">•</span>
                            {{-- Eliminar --}}
                            <form action="{{ route('formulario_asistencia.destroy', ['dato' => $dato]) }}"
                                method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center gap-1 text-gray-500 hover:text-red-600 transition"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                    <x-heroicon-o-trash class="w-4 h-4" />
                                    <span class="hidden sm:inline">Eliminar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white py-4 mt-3">
                <p class="text-sm text-gray-600 ml-6 text-center"> No hay registros</p>
            </div>
        @endif
        {{-- @if ($datos->count() > 0)
            <div class="bg-white py-4 my-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <p class="text-sm text-gray-600 ml-6">
                    Mostrando
                    <span class="font-medium">{{ $datos->firstItem() }}</span>
                    a
                    <span class="font-medium">{{ $datos->lastItem() }}</span>
                    de
                    <span class="font-medium">{{ $datos->total() }}</span>
                    registros
                </p>
                {{ $datos->links() }}
            </div>
        @endif  --}}
    </div>
</body>