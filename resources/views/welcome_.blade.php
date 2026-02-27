<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>III Encuentro de CA's </title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- JS externo -->
    <script src="assets/main.js" defer></script>

    <!-- Config rápida de Tailwind (colores y fuente) -->
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#611232",
              primary2: "#9B2247",
              accent: "#A57F2C",
              sand: "#E6D194",
              ink: "#161A1D",
            },
          },
        },
      };
    </script>
  </head>

  <body class="bg-gray-50 text-gray-900">
    <!-- NAVBAR STICKY -->
    <header class="sticky top-0 z-50 border-b bg-white/90 backdrop-blur">
      <div class="mx-auto max-w-7xl px-4">
        <div class="flex h-16 items-center justify-between">
          <!-- Logo -->
          <a href="https://encuentro-ca.itsx.edu.mx/" class="flex items-center gap-3">
            <div class="grid h-10 w-10 place-items-center rounded-xl bg-primary text-white font-extrabold overflow-hidden">
              <img src="assets/logo_CA.jpeg" alt="Logo" class="h-full w-full object-cover" />
            </div>
            <div class="leading-tight">
              <p class="text-sm font-extrabold">III Encuentro de Cuerpos Académicos</p>
            </div>
          </a>

          <div class="hidden h-10 w-px bg-black/20 md:block"></div>

          <!-- Menú (desktop) -->
          <nav class="hidden items-center gap-3 md:flex">
            <p class="text-sm font-extrabold">Regístrate ahora:</p>

            <a href="https://encuentro-ca.itsx.edu.mx/formulario-asistencia/create"
              class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
              Asistencia
            </a>
            <a href="https://encuentro-ca.itsx.edu.mx/formulario-cursos/create"
              class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
              Cursos
            </a>
            <a href="https://encuentro-ca.itsx.edu.mx/formulario-cartel/create"
              class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
              Carteles
            </a>
            <a href="https://encuentro-ca.itsx.edu.mx/formulario-prototipo/create"
              class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
              Prototipo
            </a>
            <a href="https://encuentro-ca.itsx.edu.mx/registrar-capitulo/create"
              class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
              Capítulo de libro
            </a>

            <div class="hidden h-10 w-px bg-black/20 md:block"></div>

            <a href="https://encuentro-ca.itsx.edu.mx/login"
              class="rounded-xl bg-primary px-4 py-2 text-sm font-semibold text-white hover:bg-primary2 transition">
              Login
            </a>
          </nav>

          <!-- Botón móvil (hamburguesa que cambia a X) -->
          <button
            id="menuBtn"
            class="md:hidden inline-flex items-center justify-center rounded-xl border px-3 py-2 text-sm font-semibold hover:bg-gray-100"
            aria-expanded="false"
            aria-controls="mobileMenu"
          >
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <!-- ícono hamburguesa -->
              <path id="iconHamburger" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"></path>
              <!-- ícono X -->
              <path id="iconClose" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

        <!-- Menú móvil -->
        <div id="mobileMenu" class="hidden pb-3 md:hidden">
          <div class="grid gap-2">
            <a href="https://encuentro-ca.itsx.edu.mx/formulario-asistencia/create"
              class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
              Asistencia
            </a>
            <a href="https://encuentro-ca.itsx.edu.mx/formulario-cursos/create"
              class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
              Cursos
            </a>
            <a href="https://encuentro-ca.itsx.edu.mx/formulario-cartel/create"
              class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
              Carteles
            </a>
            <a href="https://encuentro-ca.itsx.edu.mx/formulario-prototipo/create"
              class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
              Prototipo
            </a>
            <a href="https://encuentro-ca.itsx.edu.mx/registrar-capitulo/create"
              class="rounded-xl bg-accent px-3 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
              Capítulo de libro
            </a>
            <a href="https://encuentro-ca.itsx.edu.mx/login"
              class="rounded-xl bg-primary px-3 py-2 text-sm font-semibold text-white hover:bg-primary2 transition">
              Login
            </a>
          </div>
        </div>
      </div>
    </header>

    <!-- HERO -->
    <section id="inicio" class="relative overflow-hidden">
      <div class="absolute inset-0 -z-10 bg-gradient-to-br from-primary via-red-950 to-primary2"></div>
      <div class="absolute inset-0 -z-10 opacity-15"
        style="background-image: radial-gradient(circle at 20% 20%, white 0 1px, transparent 1px), radial-gradient(circle at 80% 30%, white 0 1px, transparent 1px); background-size: 44px 44px;">
      </div>

      <div class="mx-auto max-w-7xl px-4 py-10 md:py-14">
        <!-- IMAGEN LOGOS OFICIALES -->
        <div class="rounded-2xl border border-white/15 bg-white/10 p-4">
          <img src="assets/logos-oficiales.jpg" alt="Logos oficiales" />
        </div>

        <div class="mt-10 grid gap-10 md:grid-cols-2 md:items-center">
          <div>
            <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 font-semibold text-white">
              <span class="h-3 w-3 rounded-full bg-emerald-400"></span>
              26-27 de marzo de 2026
            </span>

            <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-white md:text-5xl">
              III Encuentro de Cuerpos Académicos
            </h1>

            <h2 class="mt-4 text-3xl font-semibold tracking-tight text-white/90 md:text-4xl">
              "Acercando la tecnología y la sustentabilidad con enfoque social para fortalecer la ciencia e innovación"
            </h2>

            <p class="mt-4 max-w-xl text-white/80">
              Participa con carteles, capítulo de libro, prototipos y cursos. Consulta la convocatoria y registra tu participación.
            </p>

            <div class="mt-6 flex flex-col gap-3 sm:flex-row">
              <a href="#info" class="rounded-xl bg-white px-5 py-3 text-center text-sm font-extrabold text-primary hover:bg-gray-100 transition">
                Más información
              </a>
              <a href="docs/convocatoria.pdf" target="_blank"
                class="rounded-xl bg-accent px-5 py-3 text-center text-sm font-extrabold text-white hover:bg-sand hover:text-ink transition">
                Convocatoria (PDF)
              </a>
            </div>
          </div>

          <div class="rounded-3xl bg-white p-6 shadow-lg md:p-8">
            <h2 class="text-lg font-extrabold text-gray-900">Accesos rápidos</h2>
            <p class="mt-1 text-sm text-gray-600">Selecciona una categoría o descarga documentos.</p>

            <div class="mt-5 grid grid-cols-2 gap-3 text-sm">
              <a href="#carteles" class="rounded-2xl bg-gray-50 p-4 hover:bg-sand transition">
                <p class="text-xs font-semibold text-gray-500">Categoría</p>
                <p class="mt-1 font-extrabold">Carteles</p>
              </a>
              <a href="#capitulo" class="rounded-2xl bg-gray-50 p-4 hover:bg-sand transition">
                <p class="text-xs font-semibold text-gray-500">Categoría</p>
                <p class="mt-1 font-extrabold">Capítulo</p>
              </a>
              <a href="#prototipo" class="rounded-2xl bg-gray-50 p-4 hover:bg-sand transition">
                <p class="text-xs font-semibold text-gray-500">Categoría</p>
                <p class="mt-1 font-extrabold">Prototipo</p>
              </a>
              <a href="#cursos" class="rounded-2xl bg-gray-50 p-4 hover:bg-sand transition">
                <p class="text-xs font-semibold text-gray-500">Categoría</p>
                <p class="mt-1 font-extrabold">Cursos</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDER / CARRUSEL -->
    <section class="mx-auto max-w-7xl px-4 py-12">
      <div class="flex items-end justify-between gap-4">
        <div>
          <h2 class="text-2xl font-extrabold">Secciones destacadas</h2>
        </div>
        <!-- (Quitamos flechas de aquí: ahora van a los lados del carrusel) -->
      </div>

      <!-- Carrusel con flechas a los lados -->
      <div class="mt-6 relative">
        <!-- Flecha izquierda -->
        <button
          id="prevBtn"
          type="button"
          aria-label="Anterior"
          class="absolute left-3 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white/90 p-3 shadow-md ring-1 ring-black/10 hover:bg-white focus:outline-none"
        >
          <svg class="h-5 w-5 text-primary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L8.414 10l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
          </svg>
        </button>

        <div class="overflow-hidden rounded-3xl border bg-white shadow-md">
          <div id="track" class="flex transition-transform duration-500">
            <!-- Slide 1 -->
            <a href="#carteles" class="relative min-w-full">
              <img src="assets/proximamente.png" class="h-[320px] w-full object-cover md:h-[560px]" alt="Carteles" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
              <div class="absolute bottom-0 p-6 md:p-8">
                <p class="text-xs font-extrabold text-white/80">Categoría</p>
                <h3 class="mt-1 text-3xl font-extrabold text-white">Carteles</h3>
                <p class="mt-1 text-sm text-white/80">Requisitos, formato y envío.</p>
              </div>
            </a>

            <!-- Slide 2 -->
            <a href="#capitulo" class="relative min-w-full">
              <img src="assets/proximamente.png" class="h-[320px] w-full object-cover md:h-[560px]" alt="Capítulo" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
              <div class="absolute bottom-0 p-6 md:p-8">
                <p class="text-xs font-extrabold text-white/80">Categoría</p>
                <h3 class="mt-1 text-3xl font-extrabold text-white">Capítulo de libro</h3>
                <p class="mt-1 text-sm text-white/80">Lineamientos y plantilla.</p>
              </div>
            </a>

            <!-- Slide 3 -->
            <a href="#prototipo" class="relative min-w-full">
              <img src="assets/proximamente.png" class="h-[320px] w-full object-cover md:h-[560px]" alt="Prototipo" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
              <div class="absolute bottom-0 p-6 md:p-8">
                <p class="text-xs font-extrabold text-white/80">Categoría</p>
                <h3 class="mt-1 text-3xl font-extrabold text-white">Prototipo</h3>
                <p class="mt-1 text-sm text-white/80">Registro y evaluación.</p>
              </div>
            </a>

            <!-- Slide 4 -->
            <a href="#cursos" class="relative min-w-full">
            <img src="assets/proximamente.png" class="h-[320px] w-full object-cover md:h-[560px]" alt="Cursos" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-0 p-6 md:p-8">
                <p class="text-xs font-extrabold text-white/80">Categoría</p>
                <h3 class="mt-1 text-3xl font-extrabold text-white">Cursos</h3>
                <p class="mt-1 text-sm text-white/80">Catálogo y horarios.</p>
            </div>
            </a>
        </div>
        </div>

        <!-- Flecha derecha -->
        <button
        id="nextBtn"
        type="button"
        aria-label="Siguiente"
        class="absolute right-3 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white/90 p-3 shadow-md ring-1 ring-black/10 hover:bg-white focus:outline-none"
        >
        <svg class="h-5 w-5 text-primary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M7.293 4.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L11.586 10 7.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
        </button>

        <!-- Dots abajo -->
        <div class="mt-4 flex justify-center gap-2" id="dots"></div>
        </div>
    </section>

    <!-- MÁS INFORMACIÓN -->
    <section id="info" class="border-y bg-white">
      <div class="mx-auto max-w-7xl px-4 py-14">
        <div class="grid gap-10 md:grid-cols-2 md:items-start">
          <div>
            <h2 class="text-2xl font-extrabold">Más información y documentos</h2>
            <p class="mt-2 text-sm text-gray-600">
              Descarga la convocatoria y formatos. Puedes agregar más documentos.
            </p>

            <div class="mt-6 flex flex-col gap-3 sm:flex-row">
              <a href="docs/convocatoria.pdf" target="_blank"
                class="rounded-xl bg-primary px-5 py-3 text-center text-sm font-extrabold text-white hover:bg-primary2 transition">
                Convocatoria (PDF)
              </a>
              <a href="docs/formato-cartel.pdf" target="_blank"
                class="rounded-xl border px-5 py-3 text-center text-sm font-extrabold hover:bg-sand transition">
                Formato cartel
              </a>
              <a href="docs/lineamientos.pdf" target="_blank"
                class="rounded-xl border px-5 py-3 text-center text-sm font-extrabold hover:bg-sand transition">
                Lineamientos
              </a>
            </div>

            <div class="mt-8 rounded-3xl bg-gray-50 p-6">
              <p class="text-sm font-extrabold">Tip</p>
              <p class="mt-2 text-sm text-gray-600">
                Si aún no tienes PDFs, deja los botones y luego sustituyes los archivos en la carpeta <b>docs/</b>.
              </p>
            </div>
          </div>

          <div class="rounded-3xl border bg-white p-6 shadow-sm">
            <h3 class="text-lg font-extrabold">Fechas importantes</h3>
            <div class="mt-5 grid gap-3">
              <div class="rounded-2xl bg-gray-50 p-4">
                <p class="text-xs font-semibold text-gray-500">Recepción</p>
                <p class="mt-1 font-extrabold">[fecha]</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-4">
                <p class="text-xs font-semibold text-gray-500">Dictamen</p>
                <p class="mt-1 font-extrabold">[fecha]</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-4">
                <p class="text-xs font-semibold text-gray-500">Evento</p>
                <p class="mt-1 font-extrabold">[fecha]</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECCIONES DESTINO (placeholder bonito) -->
    <section id="carteles" class="mx-auto max-w-7xl px-4 py-14">
      <h2 class="text-2xl font-extrabold">Carteles</h2>
      <p class="mt-2 text-sm text-gray-600">Aquí va el registro o requisitos para carteles.</p>
    </section>

    <section id="capitulo" class="mx-auto max-w-7xl px-4 py-14">
      <h2 class="text-2xl font-extrabold">Capítulo de libro</h2>
      <p class="mt-2 text-sm text-gray-600">Aquí va el registro o requisitos para capítulo de libro.</p>
    </section>

    <section id="prototipo" class="mx-auto max-w-7xl px-4 py-14">
      <h2 class="text-2xl font-extrabold">Prototipo</h2>
      <p class="mt-2 text-sm text-gray-600">Aquí va el registro o requisitos para prototipo.</p>
    </section>

    <section id="cursos" class="mx-auto max-w-7xl px-4 py-14">
      <h2 class="text-2xl font-extrabold">Cursos</h2>
      <p class="mt-2 text-sm text-gray-600">Aquí va el catálogo de cursos.</p>
    </section>

    <!-- SEDE -->
    <section id="sede" class="border-y bg-white">
      <div class="mx-auto max-w-7xl px-4 py-14">
        <div class="grid gap-8 md:grid-cols-2 md:items-start">
          <div>
            <h2 class="text-2xl font-extrabold">Sede: Instituto Tecnológico Superior de Perote</h2>
            <p class="mt-2 text-sm text-gray-600">Perote, Veracruz.</p>

            <div class="mt-6 rounded-3xl bg-gray-50 p-6">
              <p class="text-sm font-extrabold">Indicaciones</p>
              <p class="mt-2 text-sm text-gray-600">
                Km. 2.5 Carretera Federal Perote - México Col. Centro Perote, Ver. C.P. 91270
              </p>
            </div>
          </div>

          <div class="rounded-3xl border bg-white p-4 shadow-sm">
            <p class="px-2 pt-2 text-sm font-extrabold">Mapa</p>
            <div class="mt-3 overflow-hidden rounded-2xl">
              <iframe
                title="Mapa Tec de Perote"
                class="h-[360px] w-full"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q=Tecnol%C3%B3gico%20de%20Perote&output=embed">
              </iframe>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-primary text-white">
      <div class="mx-auto max-w-7xl px-4 py-10">
        <div class="grid gap-6 md:grid-cols-3">
          <div>
            <p class="text-sm font-extrabold">III Encuentro de Cuerpos Académicos</p>
            <p class="mt-2 text-sm text-white/75">Instituto Tecnológico Superior de Perote • TecNM</p>
          </div>
          <div>
            <p class="text-sm font-extrabold">Contacto</p>
            <p class="mt-2 text-sm text-white/75">
              Correo: <span class="font-semibold">[correo@institucion.mx]</span><br />
              Tel: <span class="font-semibold">[teléfono]</span>
            </p>
          </div>
          <div>
            <p class="text-sm font-extrabold">Documentos</p>
            <p class="mt-2 text-sm text-white/75">Convocatoria • Formatos • Lineamientos</p>
          </div>
        </div>

        <p class="mt-8 text-xs text-white/50">© <span id="year"></span> Todos los derechos reservados.</p>
      </div>
    </footer>
  </body>
</html>
{{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
