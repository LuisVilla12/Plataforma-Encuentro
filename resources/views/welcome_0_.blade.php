<!doctype html>
<html lang="es" class="scroll-smooth scroll-pt-24">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>III Encuentro de CA's</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- JS externo -->
  <script src="assets/main.js" defer></script>

  <!-- Config rápida de Tailwind -->
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

          <p class="text-sm font-extrabold">Regístrate:</p>

          <a href="https://encuentro-ca.itsx.edu.mx/registrar-asistencia"
            class="rounded-xl bg-accent px-2 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
            Asistencia
          </a>
          <a href="https://encuentro-ca.itsx.edu.mx/registrar-cursos"
            class="rounded-xl bg-accent px-2 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
            Cursos
          </a>
          <a href="https://encuentro-ca.itsx.edu.mx/registrar-cartel"
            class="rounded-xl bg-accent px-2 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
            Carteles
          </a>
          <a href="https://encuentro-ca.itsx.edu.mx/registrar-prototipo"
            class="rounded-xl bg-accent px-2 py-2 text-sm font-semibold text-white hover:bg-sand hover:text-ink transition">
            Prototipo
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
          <a href="https://encuentro-ca.itsx.edu.mx/registrar-cartel"
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

  <!-- HERO -->
  <section id="inicio" class="relative overflow-hidden">
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-primary via-red-950 to-primary2"></div>
    <div class="absolute inset-0 -z-10 opacity-15"
      style="background-image: radial-gradient(circle at 20% 20%, white 0 1px, transparent 1px), radial-gradient(circle at 80% 30%, white 0 1px, transparent 1px); background-size: 44px 44px;">
    </div>

    <div class="mx-auto max-w-7xl px-4 py-10 md:py-14">
      <div class="rounded-2xl border border-white/15 bg-white/10 p-4">
        <img src="assets/pleca.svg" alt="Logos oficiales" />
      </div>

      <div class="mt-10 grid gap-10 md:grid-cols-2 md:items-center">
        <div>
          <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 font-semibold text-white">
            <span class="h-3 w-3 rounded-full bg-emerald-400"></span>
            26 y 27 de marzo de 2026 • TecNM/ITS Perote
          </span>

          <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-white md:text-5xl">
            III Encuentro de Cuerpos Académicos
          </h1>

          <h2 class="mt-4 text-2xl font-semibold tracking-tight text-white/90 md:text-3xl">
            “Acercando la tecnología a la sustentabilidad con enfoque social para fortalecer la ciencia e innovación”
          </h2>

          <p class="mt-4 max-w-xl text-white/80">
            Participa con carteles, capítulo de libro, prototipos, cursos y visitas. Consulta la convocatoria y registra
            tu
            participación.
          </p>

          <div class="mt-6 flex flex-col gap-3 sm:flex-row">
            <a href="assets/3ECA_Convocatoria2026.pdf" target="_blank" rel="noopener noreferrer"
              class="rounded-xl bg-white px-5 py-3 text-center text-sm font-extrabold text-primary hover:bg-gray-100 transition">
              Ver convocatoria
            </a>
            <a href="#masinfo"
              class="rounded-xl bg-accent px-5 py-3 text-center text-sm font-extrabold text-white hover:bg-sand hover:text-ink transition">
              Más información
            </a>
          </div>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow-lg md:p-8">
          <h2 class="text-lg font-extrabold text-gray-900">Accesos rápidos</h2>
          <p class="mt-1 text-sm text-gray-600">Atajos a secciones clave del sitio.</p>

          <div class="mt-5 grid grid-cols-2 gap-3 text-sm">
            <a href="#programa" class="rounded-2xl bg-gray-50 p-4 hover:bg-sand transition">
              <p class="text-xs font-semibold text-gray-500">Sección</p>
              <p class="mt-1 font-extrabold">Programa</p>
            </a>
            <a href="#cursos" class="rounded-2xl bg-gray-50 p-4 hover:bg-sand transition">
              <p class="text-xs font-semibold text-gray-500">Sección</p>
              <p class="mt-1 font-extrabold">Cursos</p>
            </a>
            <a href="#carteles" class="rounded-2xl bg-gray-50 p-4 hover:bg-sand transition">
              <p class="text-xs font-semibold text-gray-500">Sección</p>
              <p class="mt-1 font-extrabold">Carteles</p>
            </a>
            <a href="#prototipo" class="rounded-2xl bg-gray-50 p-4 hover:bg-sand transition">
              <p class="text-xs font-semibold text-gray-500">Sección</p>
              <p class="mt-1 font-extrabold">Prototipo</p>
            </a>
            <a href="#capitulo" class="rounded-2xl bg-gray-50 p-4 hover:bg-sand transition">
              <p class="text-xs font-semibold text-gray-500">Sección</p>
              <p class="mt-1 font-extrabold">Capítulo de libro</p>
            </a>
            <a href="#publicaciones" class="rounded-2xl bg-gray-50 p-4 hover:bg-sand transition">
              <p class="text-xs font-semibold text-gray-500">Sección</p>
              <p class="mt-1 font-extrabold">Publicaciones</p>
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
        <h2 class="text-2xl font-extrabold">Novedades</h2>
      </div>
    </div>
    <!-- Carrusel con flechas a los lados -->
    <div class="mt-6 relative" id="carousel">
      <!-- Flecha izquierda -->
      <button id="prevBtn" type="button" aria-label="Anterior"
        class="absolute left-3 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white/90 p-3 shadow-md ring-1 ring-black/10 hover:bg-white focus:outline-none">
        <svg class="h-5 w-5 text-primary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd"
            d="M12.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L8.414 10l4.293 4.293a1 1 0 010 1.414z"
            clip-rule="evenodd" />
        </svg>
      </button>
      <div class="overflow-hidden rounded-3xl border bg-white shadow-md">
        <div id="track" class="flex transition-transform duration-500">
          <!-- Slide 0 -->
          <a class="relative min-w-full"> <img src="assets/co.png" class="h-[320px] w-full object-cover md:h-[520px]"
              alt="Programa" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/25 to-transparent"></div>
            <div class="absolute bottom-0 p-6 md:p-8">
              <p class="text-xs font-extrabold text-white/80">Comité organizador</p>
              <h3 class="mt-1 text-3xl font-extrabold text-white">ITESXAL-CA-04 Ingeniería e Innovación Sustentable
              </h3>
              <p class="mt-1 text-sm text-white/80">TecNM/ITS Xalapa</p>
            </div>
          </a>
          <!-- Slide 1 -->
          <a href="#programa" class="relative min-w-full"> <img src="assets/agenda.png"
              class="h-[320px] w-full object-cover md:h-[520px]" alt="Programa" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/25 to-transparent"></div>
            <div class="absolute bottom-0 p-6 md:p-8">
              <p class="text-xs font-extrabold text-white/80">Sección</p>
              <h3 class="mt-1 text-3xl font-extrabold text-white">Programa</h3>
              <p class="mt-1 text-sm text-white/80">Día 1 y Día 2.</p>
            </div>
          </a>
          <!-- Slide 2 -->
          <a href="#carteles" class="relative min-w-full"> <img src="assets/cartel.png"
              class="h-[320px] w-full object-cover md:h-[520px]" alt="Carteles" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/25 to-transparent"></div>
            <div class="absolute bottom-0 p-6 md:p-8">
              <p class="text-xs font-extrabold text-white/80">Categoría</p>
              <h3 class="mt-1 text-3xl font-extrabold text-white">Carteles</h3>
              <p class="mt-1 text-sm text-white/80">Requisitos y registro.</p>
            </div>
          </a>
          <!-- Slide 3 -->
          <a href="#capitulo" class="relative min-w-full"> <img src="assets/libro.png"
              class="h-[320px] w-full object-cover md:h-[520px]" alt="Capítulo" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/25 to-transparent"></div>
            <div class="absolute bottom-0 p-6 md:p-8">
              <p class="text-xs font-extrabold text-white/80">Categoría</p>
              <h3 class="mt-1 text-3xl font-extrabold text-white">Capítulo de libro</h3>
              <p class="mt-1 text-sm text-white/80">Lineamientos y entrega.</p>
            </div>
          </a>
          <!-- Slide 4 -->
          <a href="#prototipo" class="relative min-w-full"> <img src="assets/prototipo.png"
              class="h-[320px] w-full object-cover md:h-[520px]" alt="Prototipo" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/25 to-transparent"></div>
            <div class="absolute bottom-0 p-6 md:p-8">
              <p class="text-xs font-extrabold text-white/80">Categoría</p>
              <h3 class="mt-1 text-3xl font-extrabold text-white">Prototipo</h3>
              <p class="mt-1 text-sm text-white/80">Registro y evaluación.</p>
            </div>
          </a>
          <!-- Slide 5 -->
          <a href="#publicaciones" class="bg-primary relative min-w-full"> <img src="assets/book1.jpg"
              class="h-[320px] w-full object-contain md:h-[520px]" alt="Libro" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/25 to-transparent"></div>
            <div class="absolute bottom-0 p-6 md:p-8">
              <p class="text-xs font-extrabold text-white/80">Categoría</p>
              <h3 class="mt-1 text-3xl font-extrabold text-white">Publicaciones</h3>
              <p class="mt-1 text-sm text-white/80">“Ciencia e innovación sustentable: Alianzas tecnológicas para
                transformar el desarrollo social”</p>
            </div>
          </a>
          <!-- Slide 6 -->
          <a class="bg-primary relative min-w-full"> <img src="assets/Market_poster.png"
              class="h-[320px] w-full md:h-[520px] object-contain" alt="Mercado" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/25 to-transparent"></div>
            <div class="absolute bottom-0 p-6 md:p-8">
              <p class="text-xs font-extrabold text-white/80">Categoría</p>
              <h3 class="mt-1 text-3xl font-extrabold text-white">Publicaciones</h3>
              <p class="mt-1 text-sm text-white/80">Mercadito de productos artesanales</p>
            </div>
          </a>
        </div>
      </div>
      <!-- Flecha derecha -->
      <button id="nextBtn" type="button" aria-label="Siguiente"
        class="absolute right-3 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white/90 p-3 shadow-md ring-1 ring-black/10 hover:bg-white focus:outline-none">
        <svg class="h-5 w-5 text-primary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd"
            d="M7.293 4.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L11.586 10 7.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd" />
        </svg>
      </button>
      <!-- Dots -->
      <div class="mt-4 flex justify-center gap-2" id="dots"></div>
    </div>
  </section>

  <!-- MÁS INFO (nuevo) -->
  <section id="masinfo" class="border-y bg-white">
    <div class="mx-auto max-w-7xl px-4 py-14">
      <div class="grid gap-10 lg:grid-cols-3">
        <div class="lg:col-span-2">
          <h2 class="text-2xl font-extrabold">Más información</h2>
          <p class="mt-2 text-sm text-gray-700">
            <b>Objetivo:</b> Fomentar la colaboración e intercambio científico y tecnológico entre los Cuerpos
            Académicos,
            fortaleciendo sus quehaceres educativos, científicos, tecnológicos y de innovación a favor del desarrollo
            sustentable,
            con énfasis en la sustentabilidad con enfoque social.
          </p>

          <div class="mt-6 grid gap-4 md:grid-cols-2">
            <div class="rounded-3xl border bg-white p-6 shadow-sm">
              <p class="text-sm font-extrabold text-primary">Actividades del encuentro</p>
              <ul class="mt-3 list-disc pl-5 text-sm text-gray-700">
                <li>Cursos pre-congreso (virtuales)</li>
                <li>Talleres presenciales</li>
                <li>Visita a la Fortaleza de San Carlos</li>
                <li>Conferencias</li>
                <li>Exposición de carteles y prototipos</li>
                <li>Mesas de diálogo</li>
                <li>Presentación del Libro 2025 “Ciencia e innovación sustentable: Alianzas tecnológicas para
                  transformar el desarrollo social”</li>
                <li>Convocatoria del Libro "Acercando la tecnología y la sustentabilidad 2026"</li>
              </ul>
            </div>

            <div class="rounded-3xl border bg-white p-6 shadow-sm">
              <p class="text-sm font-extrabold text-primary">Ejes temáticos</p>
              <ul class="mt-3 list-disc pl-5 text-sm text-gray-700">
                <li>Procesos productivos, energías renovables, electromovilidad y semiconductores</li>
                <li>Medio Ambiente, Biotecnología y Sustentabilidad</li>
                <li>Sistema de Gestión Económico Administrativo y Sociedad</li>
                <li>Tecnología de la información y comunicación</li>
                <li>Innovación en Alimentos, Nutrición y Bienestar</li>
              </ul>
            </div>
          </div>

          <div class="mt-6 rounded-3xl bg-gray-50 p-6">
            <p class="text-sm font-extrabold text-gray-900">Conferencia magistral</p>
            <p class="mt-2 text-sm text-gray-700">
              <b>“El proceso de la investigación en los ITS Retos y Estrategias”</b> — Dr. Jorge Estevéz Lavín
              ITS/Tierra Blanca<br />
              <b>Viernes 27 de marzo de 2026</b>, 11:00 h • TecNM/ITS Perote
            </p>
          </div>
        </div>

        <div class="rounded-3xl border bg-white p-6 shadow-sm">
          <h3 class="text-lg font-extrabold">Fechas importantes</h3>
          <div class="mt-4 grid gap-3 text-sm">
            <div class="rounded-2xl bg-gray-50 p-4">
              <p class="text-xs font-extrabold text-gray-500">Evento</p>
              <p class="mt-1 font-extrabold text-primary">26-27 marzo 2026</p>
              <p class="mt-1 text-xs text-gray-600">Sede: TecNM/ITS Perote</p>
            </div>

            <div class="rounded-2xl bg-gray-50 p-4">
              <p class="text-xs font-extrabold text-gray-500">Resumen y cartel</p>
              <p class="mt-1 font-extrabold">Recepción: <span class="text-primary">hasta 20 marzo 2026</span></p>
              <p class="mt-1 font-extrabold">Aceptación: <span class="text-primary">23 marzo 2026</span></p>
            </div>

            <div class="rounded-2xl bg-gray-50 p-4">
              <p class="text-xs font-extrabold text-gray-500">Prototipos</p>
              <p class="mt-1 font-extrabold">Postulación: <span class="text-primary">hasta 20 marzo 2026</span></p>
              <p class="mt-1 font-extrabold">Aceptación: <span class="text-primary">23 marzo 2026</span></p>
            </div>

            <div class="rounded-2xl bg-gray-50 p-4">
              <p class="text-xs font-extrabold text-gray-500">Capítulos (extenso)</p>
              <p class="mt-1 font-extrabold">Recepción: <span class="text-primary">30 abril 2026</span></p>
              <p class="mt-1 text-xs text-gray-600">Más fechas en sección “Capítulo de libro”.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PROGRAMA -->
  <section id="programa" class="mx-auto max-w-7xl px-4 py-14">
    <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
      <div>
        <h2 class="text-2xl font-extrabold">Programa del evento</h2>
        <p class="mt-1 text-sm text-gray-600">
          Lugar general: <b>Explanada del ITS Perote</b> (salvo donde se indique).
        </p>
      </div>

      <!-- Tabs -->
      <div class="mt-4 flex gap-2 md:mt-0">
        <a href="assets/3ECA_programa.pdf" target="_blank" rel="noopener noreferrer"
          class="rounded-xl bg-accent px-5 py-3 text-center text-sm font-extrabold text-white hover:bg-sand hover:text-ink transition">
          Ver PDF
        </a>
        <button type="button"
          class="program-tab rounded-xl bg-primary px-4 py-2 text-sm font-extrabold text-white hover:bg-primary2 transition"
          data-target="dia1" aria-pressed="true">
          Día 1 (Jue 26)
        </button>
        <button type="button"
          class="program-tab rounded-xl border px-4 py-2 text-sm font-extrabold hover:bg-gray-100 transition"
          data-target="dia2" aria-pressed="false">
          Día 2 (Vie 27)
        </button>
      </div>
    </div>

    <!-- Día 1 -->
    <div id="dia1" class="program-panel mt-8">
      <div class="rounded-3xl border bg-white shadow-sm overflow-hidden">
        <div class="bg-primary px-6 py-4 text-white">
          <p class="text-sm font-extrabold">Día 1 • Jueves 26 de marzo de 2026</p>
          <p class="text-sm text-white/80">Lugar: Explanada ITS Perote • Maestro de ceremonias: Emmanuel Reyes Zapata
          </p>
        </div>

        <div class="p-6">
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
              <thead>
                <tr class="bg-gray-100 text-gray-700">
                  <th class="px-1 py-3 md:px-3 text-[10px] md:text-sm font-extrabold text-center">Hora <br
                      class="md:hidden">inicio
                  </th>
                  <th class="px-1 py-3 md:px-3 text-[10px] md:text-sm font-extrabold text-center">Hora <br
                      class="md:hidden">término</th>
                  <th class="px-3 py-3 text-xs md:text-sm text-left font-extrabold text-center md:text-left">Actividad
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y">
                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">8:30</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">9:00</td>
                  <td class="px-3 py-3">Registro de participantes</td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">9:00</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">9:45</td>
                  <td class="px-3 py-3 justify-center">
                    <div class="flex items-center justify-center gap-2 md:justify-start">
                      <span
                        class="inline-flex rounded-full bg-sand px-3 py-1 text-sm font-extrabold text-ink">Inauguración</span>
                    </div>
                    <div class="mt-2 grid gap-1 text-sm text-gray-700">
                      <p class="text-justify"><b>9:00-9:10</b> <br class="md:hidden"> Mensaje de bienvenida (Director
                        ITS Perote)</p>
                      <p class="text-justify"><b>9:10-9:15</b> <br class="md:hidden"> Presentación presídium e invitados
                      </p>
                      <p class="text-justify"><b>9:15-9:25</b> <br class="md:hidden"> Mensaje director ITSX
                        (Trascendencia de los CA´s en los Institutos)</p>
                      <p class="text-justify"><b>9:25-9:35</b> <br class="md:hidden"> Mensaje directora COVEICYDET</p>
                      <p class="text-justify"><b>9:35-s9:45</b> <br class="md:hidden"> Declaratoria inaugural</p>
                    </div>
                  </td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">9:45</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">10:00</td>
                  <td class="px-3 py-3">Coffee Break</td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">10:00</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">11:30</td>
                  <td class="px-3 py-3">Presentación de carteles y prototipos de los CA’s</td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">11:30</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">14:00</td>
                  <td class="px-3 py-3">
                    <div class="flex items-center justify-center gap-2 md:justify-start">
                      <span
                        class="inline-flex items-center rounded-full bg-primary/10 px-3 py-1 text-sm font-extrabold text-primary">Mesas
                        temáticas</span>
                    </div>
                    <p class="mt-2 text-sm text-gray-700">
                      Lugar: <b>Aulas ITS Perote</b>
                    </p>
                    <div class="mt-3 grid gap-2">
                      <div class="rounded-2xl bg-gray-50 p-1 md:p-4 hover:bg-sand/80">
                        <p class="font-extrabold">Mesa 1 - Edificio C - Aula C1</p>
                        <p class="text-sm text-gray-700">Procesos Productivos, energías renovables, electromovilidad y
                          semiconductores.</p>
                        <p class="mt-1 text-xs text-gray-600">Responsables: Hugo Amores Pérez, Luis de Jesús Montero
                          García, Daniel Bello Parra</p>
                      </div>
                      <div class="rounded-2xl bg-gray-50 p-1 md:p-4 hover:bg-sand/80">
                        <p class="font-extrabold">Mesa 2 - Edificio E - Aula E1</p>
                        <p class="text-sm text-gray-700">Medio Ambiente, Biotecnología y Sustentabilidad.</p>
                        <p class="mt-1 text-xs text-gray-600">Responsables: Juan Carlos Moreno Seceña, Fabiola Lango
                          Reynoso, María del Refugio Castañeda, Daniel Alejandro García López</p>
                      </div>
                      <div class="rounded-2xl bg-gray-50 p-1 md:p-4 hover:bg-sand/80">
                        <p class="font-extrabold">Mesa 3 - Edificio C - Aula C2</p>
                        <p class="text-sm text-gray-700">Sistema de Gestión Económico Admvo. y Sociedad.</p>
                        <p class="mt-1 text-xs text-gray-600">Responsables: Dulce María Ángeles Martínez, Sagrario
                          Alejandre Apolinar, Francisco Hernández Quinto</p>
                      </div>
                      <div class="rounded-2xl bg-gray-50 p-1 md:p-4 hover:bg-sand/80">
                        <p class="font-extrabold">Mesa 4 - Edificio I - Aula I1</p>
                        <p class="text-sm text-gray-700">Tecnología de la información y comunicación.</p>
                        <p class="mt-1 text-xs text-gray-600">Responsables: María Salomé Alejandre Apolinar, Virginia
                          Lagunes
                          Barradas, Irma A. García González</p>
                      </div>
                      <div class="rounded-2xl bg-gray-50 p-1 md:p-4 hover:bg-sand/80">
                        <p class="font-extrabold">Mesa 5 - Edificio C - Aula C3</p>
                        <p class="text-sm text-gray-700">Innovación en Alimentos, Nutrición y bienestar.</p>
                        <p class="mt-1 text-xs text-gray-600">Responsables: José Armando Lozada García, Cristina López
                          Méndez,
                          Lilia Ortiz Rodríguez</p>
                      </div>
                    </div>

                    <div class="mt-4 rounded-2xl border border-primary/15 bg-primary/5 p-4">
                      <p class="text-sm font-extrabold text-primary">Detalles:</p>
                      <ul class="mt-2 list-disc pl-5 text-sm text-gray-700">
                        <li><b>11:30-11:45</b> <br class="md:hidden"> Distribución en aulas para presentación de
                          diálogos</li>
                        <li><b>11:45-13:15</b> <br class="md:hidden"> Diálogos de CA’s (por áreas temáticas)</li>
                        <li><b>13:15-14:00</b> <br class="md:hidden"> Acuerdos / minuta de trabajo</li>
                      </ul>
                    </div>
                  </td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">14:00</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">15:00</td>
                  <td class="px-3 py-3">
                    Box Lunch / Verbena
                    <p class="mt-1 text-xs text-gray-600">Lugar: Domo Explanada ITS Perote</p>
                  </td>
                </tr>
                <!-- Talleres Jueves-->
                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">15:00</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">17:00</td>
                  <td class="px-3 py-3">
                    Talleres / Visita a la Fortaleza de San Carlos
                    <div class="mt-4 grid gap-3">
                      <div class="rounded-2xl bg-sand p-4 shadow-sm hover:bg-sand/30">
                        <p class="text-sm font-extrabold text-primary text-justify">El camino a la consolidación de
                          cuerpos académicos</p>
                        <p class="mt-1 text-sm text-gray-700">Dr. Jorge Estevéz Lavín - ITS Tierra Blanca</p>
                        <p class="mt-1 text-sm text-gray-700">Edificio C - Aula C1</p>
                      </div>

                      <div class="rounded-2xl bg-sand p-4 shadow-sm hover:bg-sand/30">
                        <p class="text-sm font-extrabold text-primary text-justify">Aplicando la IA en la educación
                          superior</p>
                        <p class="mt-1 text-sm text-gray-700">Mtro. José Clemente Hdz. - Sintérgica AI</p>
                        <p class="mt-1 text-sm text-gray-700">Edificio B - Lab. Cómputo - Aula B1</p>
                      </div>

                      <div class="rounded-2xl bg-sand p-4 shadow-sm hover:bg-sand/30">
                        <p class="text-sm font-extrabold text-primary text-justify">Propiedad intelectual y agenda en
                          ciencia y
                          tecnología para el posicionamiento académico</p>
                        <p class="mt-1 text-sm text-gray-700">Lic. Sandra Cisneros Benítez - IMPI/COVEICYDET</p>
                        <p class="mt-1 text-sm text-gray-700">Edificio I - Aula I7</p>
                      </div>

                      <div class="rounded-2xl bg-sand p-4 shadow-sm hover:bg-sand/30">
                        <p class="text-sm font-extrabold text-primary text-justify">De la investigación a la Innovación:
                          Estrategias
                          de colaboración científica Transferencia tecnológica</p>
                        <p class="mt-1 text-sm text-gray-700">Dr. Rubén Posadas Gómez - CRODE Orizaba</p>
                        <p class="mt-1 text-sm text-gray-700">Edificio C - Aula C3</p>
                      </div>

                      <div class="rounded-2xl bg-sand p-4 shadow-sm hover:bg-sand/30">
                        <p class="text-sm font-extrabold text-primary text-justify">Asesoramiento y conformacion de los
                          nodos de
                          impulso a la economía social y solidaria (Nodess)</p>
                        <p class="mt-1 text-sm text-gray-700">Dra. Jacel Adame García - IT Ursulo Galván</p>
                        <p class="mt-1 text-sm text-gray-700">Edificio C - Aula C2 </p>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>


          <!-- Presídium / Invitados -->
          <div class="mt-8 grid gap-4 md:grid-cols-2">
            <details class="rounded-3xl border bg-white p-5 shadow-sm">
              <summary class="cursor-pointer select-none text-sm font-extrabold text-primary">
                Presídium
              </summary>
              <ul class="mt-3 list-disc pl-5 text-sm text-gray-700">
                <li>Dr. David Agustín Jiménez Rojas — Subsecretario de Educación Media Superior</li>
                <li>Dr. Sidney René Toledo Martínez — Director del ITS Xalapa</li>
                <li>Dr. Rodrigo Rodríguez Franco — Director del ITS Perote</li>
                <li>Dra. María Graciela Hernández y Orduña — Directora del Consejo Veracruzano de Investigación
                  Científica y Desarrollo Tecnológico (COVEICYDET)</li>
              </ul>
            </details>

            <details class="rounded-3xl border bg-white p-5 shadow-sm">
              <summary class="cursor-pointer select-none text-sm font-extrabold text-primary">
                Invitados (TecNM/ITS Xalapa / TecNM/ITS Perote)
              </summary>
              <div class="mt-3 grid gap-3 text-sm text-gray-700">
                <div>
                  <p class="font-extrabold">TecNM/ITS Xalapa</p>
                  <ul class="mt-1 list-disc pl-5">
                    <li>Mtra. Judith Amaya Domínguez — Directora Académica</li>
                    <li>Mtra. Perla Guadalupe Pérez Montiel — Subdirectora Académica</li>
                    <li>Mtra. María Magdalena Martínez González — Subdirectora de Posgrado e Investigación</li>
                  </ul>
                </div>
                <div>
                  <p class="font-extrabold">TecNM/ITS Perote</p>
                  <ul class="mt-1 list-disc pl-5">
                    <li>Dra. Fabiola Sandoval Salas — Directora Académica</li>
                    <li>Dr. David Medina Hernández — Subdirector Académico</li>
                    <li>Mtra. Matilde Itzel Aquino Aguilar — Subdirectora de Posgrado e Investigación</li>
                  </ul>
                </div>
              </div>
            </details>
          </div>
        </div>
      </div>
    </div>

    <!-- Día 2 -->
    <div id="dia2" class="program-panel mt-8 hidden">
      <div class="rounded-3xl border bg-white shadow-sm overflow-hidden">
        <div class="bg-primary2 px-6 py-4 text-white">
          <p class="text-sm font-extrabold">Día 2 • Viernes 27 de marzo de 2026</p>
          <p class="text-sm text-white/80">Lugar: Explanada ITS Perote • Maestro de ceremonias: Emmanuel Reyes Zapata
          </p>
        </div>

        <div class="p-6">
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
              <thead>
                <tr class="bg-gray-100 text-gray-700">
                  <th class="px-1 py-3 md:px-3 text-[10px] md:text-sm font-extrabold text-center">Hora <br
                      class="md:hidden">inicio
                  </th>
                  <th class="px-1 py-3 md:px-3 text-[10px] md:text-sm font-extrabold text-center">Hora <br
                      class="md:hidden">término</th>
                  <th class="px-3 py-3 text-xs md:text-sm text-left font-extrabold text-center md:text-left">Actividad
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y">
                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">9:00</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">11:00</td>
                  <td class="px-3 py-3">Talleres / Visita a la Fortaleza de San Carlos
                    <!-- Talleres presenciales -->
                    <div class="mt-4 grid gap-3">
                      <div class="rounded-2xl bg-sand p-4 shadow-sm hover:bg-sand/30">
                        <p class="text-sm font-extrabold text-primary text-justify">El camino a la consolidación de
                          cuerpos
                          académicos</p>
                        <p class="mt-1 text-sm text-gray-700">Dr. Jorge Estevéz Lavín - ITS Tierra Blanca</p>
                        <p class="mt-1 text-sm text-gray-700">Edificio C - Aula C1</p>
                      </div>

                      <div class="rounded-2xl bg-sand p-4 shadow-sm hover:bg-sand/30">
                        <p class="text-sm font-extrabold text-primary text-justify">Aplicando la IA en la educación
                          superior</p>
                        <p class="mt-1 text-sm text-gray-700">Mtro. José Clemente Hdz. - Sintérgica AI</p>
                        <p class="mt-1 text-sm text-gray-700">Edificio B - Lab. Cómputo - Aula B1</p>
                      </div>

                      <div class="rounded-2xl bg-sand p-4 shadow-sm hover:bg-sand/30">
                        <p class="text-sm font-extrabold text-primary text-justify">Propiedad intelectual y agenda en
                          ciencia y
                          tecnología para el posicionamiento académico</p>
                        <p class="mt-1 text-sm text-gray-700">Lic. Sandra Cisneros Benítez - IMPI/COVEICYDET</p>
                        <p class="mt-1 text-sm text-gray-700">Edificio I - Aula I7</p>
                      </div>

                      <div class="rounded-2xl bg-sand p-4 shadow-sm hover:bg-sand/30">
                        <p class="text-sm font-extrabold text-primary text-justify">De la investigación a la Innovación:
                          Estrategias
                          de colaboración científica Transferencia tecnológica</p>
                        <p class="mt-1 text-sm text-gray-700">Dr. Rubén Posadas Gómez - CRODE Orizaba</p>
                        <p class="mt-1 text-sm text-gray-700">Edificio C - Aula C3</p>
                      </div>
                      <div class="rounded-2xl bg-sand p-4 shadow-sm hover:bg-sand/30">
                        <p class="text-sm font-extrabold text-primary text-justify">Asesoramiento y conformacion de los
                          nodos de
                          impulso a la economía social y solidaria (Nodess)</p>
                        <p class="mt-1 text-sm text-gray-700">Dra. Jacel Adame García - IT Ursulo Galván</p>
                        <p class="mt-1 text-sm text-gray-700">Edificio C - Aula C2 </p>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">11:00</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">12:00</td>
                  <td class="px-3 py-3">
                    Conferencia Magistral: <b>“El proceso de la investigación en los ITS Retos y Estrategias”</b>
                    <span class="text-sm text-gray-600">Conferencista: Dr. Jorge Estevéz Lavín ITS/Tierra Blanca</span>
                  </td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">12:00</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">12:15</td>
                  <td class="px-3 py-3">Coffee Break</td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">12:15</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">12:45</td>
                  <td class="px-3 py-3">Presentación del libro 2o. Encuentro CA’s: <b>"Ciencia e Innovación Sustentable:
                      Alianzas tecnológicas para transformar el desarrollo Social"</b></td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">12:45</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">13:00</td>
                  <td class="px-3 py-3">Mensaje por comité organizador</td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">13:00</td>
                  <td class="px-1 py-3 md:px-3 font-semibold text-center text-xs md:text-sm">13:30</td>
                  <td class="px-3 py-3">
                    Mensaje a participantes y <b>clausura</b> por el Director ITS Perote
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CURSOS (ampliada) -->
  <section id="cursos" class="mx-auto max-w-7xl px-4 py-14">
    <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
      <div>
        <h2 class="text-2xl font-extrabold">Cursos pre-congreso</h2>
        <p class="mt-1 text-sm text-gray-600">Valor curricular <b>40 h</b>, <b>cupo limitado</b>, modalidad
          <b>virtual</b>.
          Gratuitos.
        </p>
      </div>
      <a href="https://encuentro-ca.itsx.edu.mx/registrar-cursos" target="_blank" rel="noopener noreferrer"
        class="mt-3 md:mt-0 inline-flex items-center justify-center rounded-xl bg-primary px-5 py-3 text-sm font-extrabold text-white hover:bg-primary2 transition">
        Registrar curso
      </a>
    </div>

    <div class="mt-8 grid gap-4 md:grid-cols-2">
      <div class="rounded-3xl border bg-white p-6 shadow-sm">
        <p class="text-sm font-extrabold text-primary">Redacción de Artículos científicos</p>
        <p class="mt-2 text-sm text-gray-700">
          <b>Fechas:</b> 12, 13, 16, 17 y 18 de marzo 2026<br />
          <b>Horario:</b> 17:00 a 20:00 h<br />
          <b>Modalidad:</b> Virtual<br />
          <b>Cupo:</b> 25 personas<br /><br />
          <b>Requisitos:</b>
        <ul class="list-disc text-sm pl-5 mt-1 text-gray-700">
          <li>Tener buena conexión a internet.</li>
          <li>Contar con datos experimentales publicables.</li>
          <li>Descargar la versión gratuita de ENDNOTE.</li>
          <li>Disponibilidad de tiempo para las actividades asíncronas y entregables.</li>
        </ul>
        </p>
        <p class="mt-3 text-xs text-gray-600">
          Instructoras: Dra. Fabiola Sandoval Salas / Dra. AnaBerta Cardador Martínez (Tecnológico de Monterrey Campus
          Querétaro)
        </p>
      </div>

      <div class="rounded-3xl border bg-white p-6 shadow-sm">
        <p class="text-sm font-extrabold text-primary">Metodología para la potencialización de proyectos innovadores</p>
        <p class="mt-2 text-sm text-gray-700">
          <b>Fechas:</b> 19, 20, 23, 24 y 25 de marzo 2026<br />
          <b>Horario:</b> 17:00 a 20:00 h<br />
          <b>Modalidad:</b> Virtual<br />
          <b>Cupo:</b> 40 personas
        </p>
        <p class="mt-3 text-xs text-gray-600">
          Instructor(es): Dr. Jonathan Villanueva Tavira (CENIDET) / Dra. Margarita Tecpoyotl Torres (CIICAP-UAEM) / Dr.
          Manuel Juárez Pacheco (CENIDET)
        </p>
      </div>

    </div>
    <p class="mt-3 text-sm text-gray-600">
      Nota: Para inscribirse en estos cursos es necesario registrar antes su participación en cartel, prototipo o
      capítulo de libro.
    </p>
  </section>

  <!-- CARTELES (ampliada) -->
  <section id="carteles" class="mx-auto max-w-7xl px-4 py-14">
    <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
      <div>
        <h2 class="text-2xl font-extrabold">Carteles</h2>
        <p class="mt-1 text-sm text-gray-600">
          Presenta investigaciones y proyectos. Se publicará <b>resumen y cartel</b> en la memoria del evento con ISBN.
        </p>
      </div>
      <a href="https://encuentro-ca.itsx.edu.mx/registrar-cartel" target="_blank" rel="noopener noreferrer"
        class="mt-3 md:mt-0 inline-flex items-center justify-center rounded-xl bg-accent px-5 py-3 text-sm font-extrabold text-white hover:bg-sand hover:text-ink transition">
        Registrar cartel
      </a>
    </div>

    <div class="mt-8 grid gap-4 lg:grid-cols-3">
      <div class="rounded-3xl border bg-white p-6 shadow-sm lg:col-span-2">
        <p class="text-sm font-extrabold text-primary">Lineamientos principales</p>
        <ul class="mt-3 list-disc pl-5 text-sm text-gray-700">
          <li>Enviar el cartel en formato editable <b>.pptx</b>.</li>
          <li>Imágenes a la plataforma en <b>.png</b> o <b>.jpg</b>.</li>
          <li>Máximo <b>5 autores</b> por resumen.</li>
          <li>Solo trabajos <b>no publicados</b> y no sometidos a dictamen en otros medios.</li>
          <li>El día del evento: llevar el cartel impreso en <b>papel bond (tamaño: 0.90 x 1.20 m)</b>.</li>
        </ul>

        <div class="mt-5 rounded-2xl bg-gray-50 p-4">
          <p class="text-sm font-extrabold text-gray-900">Fechas importantes</p>
          <ul class="mt-2 list-disc pl-5 text-sm text-gray-700">
            <li><b>Recepción de cartel y resumen:</b> hasta el <span class="font-extrabold text-primary">20 de marzo
                2026</span>
            </li>
            <li><b>Cartas de aceptación:</b> <span class="font-extrabold text-primary">23 de marzo 2026</span></li>
          </ul>
        </div>
      </div>

      <div class="rounded-3xl border bg-white p-6 shadow-sm">
        <p class="text-sm font-extrabold text-primary">Ejes temáticos</p>
        <ul class="mt-3 list-disc pl-5 text-sm text-gray-700">
          <li>Procesos productivos, energías renovables, electromovilidad y semiconductores.</li>
          <li>Medio Ambiente, Biotecnología y Sustentabilidad.</li>
          <li>Sistema de Gestión Económico Administrativo y Sociedad.</li>
          <li>Tecnología de la información y comunicación.</li>
          <li>Innovación en Alimentos, Nutrición y Bienestar.</li>
        </ul>

        <div class="mt-5">
          <a href="assets/PlantillaCartel2026.pptx" target="_blank" rel="noopener noreferrer"
            class="block bg-sand rounded-xl border px-4 py-2 text-center text-sm font-extrabold hover:bg-gray-200 hover:text-ink hover:text-primary transition">
            Plantilla de cartel (.pptx)
          </a>
          <a href="assets/FormatoResumenCartel2026.docx" target="_blank" rel="noopener noreferrer"
            class="block bg-sand rounded-xl border px-4 py-2 text-center text-sm font-extrabold hover:bg-gray-200 hover:text-ink hover:text-primary transition">
            Formato de resumen (.docx)
          </a>
          <a href="assets/FormatoCartaCesionDerechos2026.docx" target="_blank" rel="noopener noreferrer"
            class="block bg-sand rounded-xl border px-4 py-2 text-center text-sm font-extrabold hover:bg-gray-200 hover:text-ink hover:text-primary transition">
            Carta Cesión de Derechos (.docx)
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- PROTOTIPO (ampliada) -->
  <section id="prototipo" class="mx-auto max-w-7xl px-4 py-14">
    <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
      <div>
        <h2 class="text-2xl font-extrabold">Prototipos</h2>
        <p class="mt-1 text-sm text-gray-600">
          Exposición de desarrollos tecnológicos/innovaciones. Requiere <b>ficha técnica impresa (doble carta)</b> y
          prototipo funcional.
        </p>
      </div>
      <a href="https://encuentro-ca.itsx.edu.mx/registrar-prototipo" target="_blank" rel="noopener noreferrer"
        class="mt-3 md:mt-0 inline-flex items-center justify-center rounded-xl bg-accent px-5 py-3 text-sm font-extrabold text-white hover:bg-sand hover:text-ink transition">
        Registrar prototipo
      </a>
    </div>

    <div class="mt-8 grid gap-4 md:grid-cols-2">
      <div class="rounded-3xl border bg-white p-6 shadow-sm">
        <p class="text-sm font-extrabold text-primary">Fechas importantes</p>
        <ul class="mt-3 list-disc pl-5 text-sm text-gray-700">
          <li><b>Postulación:</b> hasta el <span class="font-extrabold text-primary">20 de marzo 2026</span></li>
          <li><b>Cartas de aceptación:</b> <span class="font-extrabold text-primary">23 de marzo 2026</span></li>
        </ul>
      </div>

      <div class="rounded-3xl border bg-white p-6 shadow-sm">
        <a href="assets/FormatoFichaTecnica2026.docx" target="_blank" rel="noopener noreferrer"
          class="block bg-sand rounded-xl border px-4 py-2 text-center text-sm font-extrabold hover:bg-gray-200 hover:text-ink hover:text-primary transition">Formato
          ficha técnica (.docx)
        </a>
        <p class="text-sm font-extrabold text-primary"><br>Nota (requerimientos especiales)</p>
        <p class="mt-3 text-sm text-gray-700">
          Si el prototipo requiere condiciones especiales, informar con al menos <b>5 días</b> antes del evento a:
          <a class="font-extrabold text-primary hover:underline"
            href="mailto:encuentro_ca@itsx.edu.mx">encuentro_ca@itsx.edu.mx</a>
        </p>
      </div>
    </div>
  </section>

  <!-- CAPÍTULO (ampliada) -->
  <section id="capitulo" class="mx-auto max-w-7xl px-4 py-14">
    <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
      <div>
        <h2 class="text-2xl font-extrabold">Capítulo de libro</h2>
        <p class="mt-1 text-sm text-gray-600">
          Solo para trabajos presentados en cartel y <b>con invitación</b> para continuar a extenso (capítulo).
        </p>
      </div>
    </div>

    <div class="mt-8 grid gap-4 lg:grid-cols-3">
      <div class="rounded-3xl border bg-white p-6 shadow-sm lg:col-span-2">
        <p class="text-sm font-extrabold text-primary">Lineamientos</p>
        <ul class="mt-3 list-disc pl-5 text-sm text-gray-700">
          <li>Trabajos no publicados y no sometidos a dictamen en otros medios.</li>
          <li>Máximo <b>5 autores</b>.</li>
          <li>Revisión antiplagio y revisión por pares a doble ciego.</li>
          <li>Dictámenes: Publicable sin cambios / Publicable con cambios / No publicable.</li>
        </ul>

        <div class="mt-5 rounded-2xl bg-gray-50 p-4">
          <p class="text-sm font-extrabold text-gray-900">Formato de nombre de archivo</p>
          <p class="mt-2 text-sm text-gray-700">
            Subir el extenso como: <b>3ECA_Institucion_1er apellido_2o. Apellido.docx</b> (ej.
            <b>3ECA_ITSX_Alejandre_Apolinar.docx</b>)
          </p>
        </div>
      </div>

      <div class="rounded-3xl border bg-white p-6 shadow-sm">
        <p class="text-sm font-extrabold text-primary">Cronograma editorial</p>
        <ul class="mt-3 list-disc pl-5 text-sm text-gray-700">
          <li><b>Recepción:</b> 30 abril 2026</li>
          <li><b>Revisión:</b> 4 mayo - 31 julio 2026</li>
          <li><b>Aceptación/Rechazo:</b> 3 - 28 agosto 2026</li>
          <li><b>Correcciones:</b> 1 - 10 septiembre 2026</li>
          <li><b>Primer borrador:</b> 1 - 30 octubre 2026</li>
          <li><b>Maquetado:</b> 03 - 26 noviembre 2026</li>
          <li><b>ISBN:</b> enero 2027</li>
          <li><b>Publicación:</b> agosto 2027 (límite)</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- PUBLICACIONES (nuevo) -->
  <section id="publicaciones" class="border-y bg-white">
    <div class="mx-auto max-w-7xl px-4 py-14">
      <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
        <div>
          <h2 class="text-xl font-extrabold">Publicaciones</h2>
          <p class="mt-1 text-sm text-gray-600">Libros y memorias relacionadas con el Encuentro.</p>
        </div>
      </div>

      <div class="mt-8 grid gap-4 md:grid-cols-2">
        <div class="rounded-3xl border bg-white p-6 shadow-sm">
          <p class="text-xs font-extrabold text-gray-500">Libro (PDF)</p>
          <p class="mt-2 text-lg font-extrabold text-primary">“Ciencia e innovación sustentable: Alianzas tecnológicas
            para transformar el desarrollo social”</p>
          <p class="mt-2 text-sm text-gray-700">Presentación del libro 2025 dentro del evento y descarga oficial.</p>
          <div>
            <img src="assets/book1.jpg" alt="Portada del libro 2025"
              class="mt-4 h-auto w-full rounded-lg object-cover shadow-sm">
          </div>
          <a href="https://ciencia.covecyt.gob.mx/wp-content/uploads/2025/10/LIBRO_Acercando-la-tecnologia-a-la-sustentabilidad_2025_.pdf"
            target="_blank" rel="noopener noreferrer"
            class="mt-4 inline-flex items-center justify-center rounded-xl bg-primary px-5 py-3 text-sm font-extrabold text-white hover:bg-primary2 transition">
            Abrir PDF</a>
          <a href="/assets/NR_610770.pdf" target="_blank" rel="noopener noreferrer"
            class="mt-4 inline-flex items-center justify-center rounded-xl bg-accent px-5 py-3 text-sm font-extrabold text-white hover:bg-primary2 transition">
            INDAUTOR</a>
        </div>

        <div class="rounded-3xl bg-gray-50 p-6">
          <p class="text-sm font-extrabold text-gray-900">Convocatoria libro 2026</p>
          <p class="mt-2 text-lg font-extrabold text-primary">Próximamente se publicarán más detalles.</p>
          <div>
            <img src="assets/proximamente.png" alt="Portada del libro 2025"
              class="mt-4 h-auto w-full rounded-lg object-cover shadow-sm">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- GALERÍA -->
  <section id="galeria" class="border-y bg-white">
    <div class="mx-auto max-w-7xl px-4 py-14">
      <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
        <div>
          <h2 class="text-2xl font-extrabold">Galería</h2>
          <p class="mt-1 text-sm text-gray-600">Fotos de ediciones anteriores del Encuentro de Cuerpos Académicos.</p>
        </div>
      </div>

      <div class="mt-8 grid gap-4 md:grid-cols-2">
        <!-- Carrusel 1 -->
        <div class="rounded-3xl border bg-white p-6 shadow-sm">
          <p class="mt-2 text-lg font-extrabold text-primary text-center">1er Encuentro de Cuerpos Académicos "Acercando
            la tecnología a la sustentabilidad"</p>
          <p class="mt-2 text-sm text-gray-700 text-center">11-12 de enero de 2024</p>
          <p class="mt-2 text-sm text-gray-700 text-center">Sede: UV e ITSX</p>

          <div class="mt-5 relative" id="gal1Carousel">
            <!-- Flecha izquierda -->
            <button id="gal1Prev" type="button" aria-label="Anterior"
              class="absolute left-2 md:left-3 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white/90 p-3 shadow-md ring-1 ring-black/10 hover:bg-white focus:outline-none">
              <svg class="h-5 w-5 text-primary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M12.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L8.414 10l4.293 4.293a1 1 0 010 1.414z"
                  clip-rule="evenodd" />
              </svg>
            </button>

            <div class="overflow-hidden rounded-2xl border bg-white shadow-sm">
              <div id="gal1Track" class="flex transition-transform duration-500"></div>
            </div>

            <!-- Flecha derecha -->
            <button id="gal1Next" type="button" aria-label="Siguiente"
              class="absolute right-2 md:right-3 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white/90 p-3 shadow-md ring-1 ring-black/10 hover:bg-white focus:outline-none">
              <svg class="h-5 w-5 text-primary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M7.293 4.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L11.586 10 7.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </button>
          </div>

          <div class="hidden mt-4 flex items-center justify-center md:flex md:gap-1" id="gal1Dots"></div>
        </div>

        <!-- Carrusel 2 -->
        <div class="rounded-3xl border bg-white py-5 md:p-6">
          <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
              <p class="mt-2 text-lg font-extrabold text-primary text-center">2.° Encuentro de Cuerpos Académicos
                "Acercando la tecnología y la sustentabilidad para la atención a temas prioritarios"</p>
              <p class="mt-1 text-sm text-gray-700 text-center">27-28 de marzo de 2025</p>
              <p class="mt-1 text-sm text-gray-700 text-center">Sede: TecNM/IT Boca del Río</p>
            </div>
          </div>

          <div class="mt-5 relative" id="gal2Carousel">
            <!-- Flecha izquierda -->
            <button id="gal2Prev" type="button" aria-label="Anterior"
              class="absolute left-2 md:left-3 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white/90 p-3 shadow-md ring-1 ring-black/10 hover:bg-white focus:outline-none">
              <svg class="h-5 w-5 text-primary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M12.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L8.414 10l4.293 4.293a1 1 0 010 1.414z"
                  clip-rule="evenodd" />
              </svg>
            </button>

            <div class="overflow-hidden rounded-2xl border bg-white shadow-sm">
              <div id="gal2Track" class="flex transition-transform duration-500"></div>
            </div>

            <!-- Flecha derecha -->
            <button id="gal2Next" type="button" aria-label="Siguiente"
              class="absolute right-2 md:right-3 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white/90 p-3 shadow-md ring-1 ring-black/10 hover:bg-white focus:outline-none">
              <svg class="h-5 w-5 text-primary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M7.293 4.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L11.586 10 7.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </button>
          </div>

          <div class="hidden mt-4 items-center justify-center md:flex  md:gap-1" id="gal2Dots"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- SEDE -->
  <section id="sede" class="border-y bg-white">
    <div class="mx-auto max-w-7xl px-4 py-14">
      <div class="grid gap-8 md:grid-cols-2 md:items-start">
        <div class="rounded-3xl border bg-white p-6 shadow-sm">
          <h2 class="text-2xl font-extrabold">Sede: Instituto Tecnológico Superior de Perote</h2>
          <p class="mt-2 text-sm text-gray-600">Perote, Veracruz.</p>

          <div class="mt-6 rounded-3xl bg-gray-50 p-6">
            <p class="text-sm font-extrabold">Dirección</p>
            <p class="mt-2 text-sm text-gray-600">
              Km. 2.5 Carretera Federal Perote - México Col. Centro Perote, Ver. C.P. 91270
            </p>
          </div>
          <div class="mt-6 rounded-3xl bg-gray-50 p-6">
            <p class="text-sm font-extrabold">Croquis ITS Perote</p>

            <!-- Imagen clickeable -->
            <img id="croquisImg" src="assets/croquis.jpg" alt="Croquis de ubicación del ITS Perote"
              class="mt-6 h-auto w-full cursor-zoom-in rounded-lg object-cover shadow-sm">
          </div>

          <!-- MODAL / LIGHTBOX -->
          <div id="imgModal" class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/80 p-4"
            aria-hidden="true">
            <div class="relative max-h-[92vh] max-w-5xl">
              <!-- Botón cerrar -->
              <button id="closeModal" type="button"
                class="absolute -right-3 -top-3 rounded-full bg-white/95 p-2 shadow-md ring-1 ring-black/10 hover:bg-white"
                aria-label="Cerrar">
                <svg class="h-5 w-5 text-gray-800" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>
              </button>

              <!-- Imagen grande -->
              <img id="modalImg" src="" alt="" class="max-h-[92vh] w-auto rounded-2xl bg-white shadow-2xl">
            </div>
          </div>

        </div>
        <div class="rounded-3xl border bg-white p-4 shadow-sm">
          <p class="px-2 pt-2 text-sm font-extrabold">Mapa</p>
          <div class="mt-3 overflow-hidden rounded-2xl">
            <iframe title="Mapa Tec de Perote" class="h-[360px] w-full" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              src="https://www.google.com/maps?q=Tecnol%C3%B3gico%20de%20Perote&output=embed">
            </iframe>
          </div>
        </div>



      </div>
    </div>
  </section>

  <section id="hospedaje" class="border-y bg-white">
    <!-- HOSPEDAJE (hoteles) -->
    <div class="mx-auto max-w-7xl px-4 py-14">
      <div class="grid gap-8 md:grid-cols-2 md:items-start">
        <div>
          <h2 class="text-2xl font-extrabold">Hospedaje en Perote</h2>
          <p class="mt-1 text-sm text-gray-600">
            Opciones cercanas a la sede. <span class="font-semibold">Tarifas sujetas a cambio</span>.
          </p>
        </div>
      </div>

      <div class="mt-5 grid gap-4 md:grid-cols-2">
        <!-- Hotel 1 -->
        <article class="rounded-3xl border bg-white p-5 shadow-sm">
          <div class="flex items-start justify-between gap-3">
            <div>
              <h4 class="text-base font-extrabold text-gray-900">HOTEL RESTAURANT LA BRUMA </h4>
              <p class="mt-1 text-sm text-gray-600 whitespace-pre-line">
                Juan Escutia Sur 2 B, Centro, 91273 Perote, Ver.
              </p>
            </div>
            <a href="https://maps.app.goo.gl/Dqj9DCjPeQ8iWr68A" target="_blank" rel="noopener noreferrer"
              class="shrink-0 rounded-xl border bg-gray-50 px-3 py-2 text-xs font-extrabold hover:bg-gray-100">
              Ver mapa
            </a>
          </div>

          <div class="mt-4 grid gap-2 text-sm">
            <div class="flex flex-wrap items-center gap-2">
              <span class="text-xs font-extrabold text-gray-500">Tel:</span>
              <a href="tel:+522828253069" class="font-extrabold text-primary hover:underline">2828253069</a>
            </div>

            <div class="rounded-2xl bg-gray-50 p-3">
              <p class="text-xs font-extrabold text-gray-500">Tarifa / habitaciones</p>
              <p class="mt-1 whitespace-pre-line">Sencilla - 1 cama queen $900 (máximo 2 personas)
                Doble - 2 matrimoniales $1,250 (máximo 4 personas)</p>
            </div>

            <div class="grid gap-2 sm:grid-cols-3">
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Convenio</p>
                <p class="mt-1 font-semibold">No</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Desayuno</p>
                <p class="mt-1 whitespace-pre-line">No incluye</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Check-in</p>
                <p class="mt-1 font-semibold">15:00</p>
              </div>
            </div>
          </div>
        </article>

        <!-- Hotel 2 -->
        <article class="rounded-3xl border bg-white p-5 shadow-sm">
          <div class="flex items-start justify-between gap-3">
            <div>
              <h4 class="text-base font-extrabold text-gray-900">HOTEL CAFÉ ROMA RESTAURANT</h4>
              <p class="mt-1 text-sm text-gray-600 whitespace-pre-line">
                José María Morelos 1, Centro, 91270 Perote, Ver.
              </p>
            </div>
            <a href="https://maps.app.goo.gl/dgf3PUV6SVXZ9CMc6" target="_blank" rel="noopener noreferrer"
              class="shrink-0 rounded-xl border bg-gray-50 px-3 py-2 text-xs font-extrabold hover:bg-gray-100">
              Ver mapa
            </a>
          </div>

          <div class="mt-4 grid gap-2 text-sm">
            <div class="flex flex-wrap items-center gap-2">
              <span class="text-xs font-extrabold text-gray-500">Tel:</span>
              <a href="tel:+522828253186" class="font-extrabold text-primary hover:underline">2828253186</a>
            </div>

            <div class="rounded-2xl bg-gray-50 p-3">
              <p class="text-xs font-extrabold text-gray-500">Tarifa / habitaciones</p>
              <p class="mt-1 whitespace-pre-line">Sencilla - 1 cama queen $1,300
                Doble - 1 cama queen + 1 cama individual $1,500</p>
            </div>

            <div class="grid gap-2 sm:grid-cols-3">
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Convenio</p>
                <p class="mt-1 font-semibold">No</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Desayuno</p>
                <p class="mt-1 whitespace-pre-line">No incluye</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Check-in</p>
                <p class="mt-1 font-semibold">12:00</p>
              </div>
            </div>
          </div>
        </article>

        <!-- Hotel 3 -->
        <article class="rounded-3xl border bg-white p-5 shadow-sm">
          <div class="flex items-start justify-between gap-3">
            <div>
              <h4 class="text-base font-extrabold text-gray-900">RESTAURANT Y HOTEL HOSTERIA COVADONGA</h4>
              <p class="mt-1 text-sm text-gray-600 whitespace-pre-line">
                Alejandro Von Humboldt Sur 109, Miguel Hidalgo y Costilla, 91270 Perote, Ver.
              </p>
            </div>
            <a href="https://maps.app.goo.gl/oys3jHHymaKTr9Pt7" target="_blank" rel="noopener noreferrer"
              class="shrink-0 rounded-xl border bg-gray-50 px-3 py-2 text-xs font-extrabold hover:bg-gray-100">
              Ver mapa
            </a>
          </div>

          <div class="mt-4 grid gap-2 text-sm">
            <div class="flex flex-wrap items-center gap-2">
              <span class="text-xs font-extrabold text-gray-500">Tel:</span>
              <a href="tel:+522828252642" class="font-extrabold text-primary hover:underline">2828252642</a>
            </div>

            <div class="rounded-2xl bg-gray-50 p-3">
              <p class="text-xs font-extrabold text-gray-500">Tarifa / habitaciones</p>
              <p class="mt-1 whitespace-pre-line">1 cama matrimonia $650
                1 cama matrimonial + 1 individual $750
                2 camas matrimoniales $850
                1 cama matrimonial + 2 camas individuales $950</p>
            </div>

            <div class="grid gap-2 sm:grid-cols-3">
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Convenio</p>
                <p class="mt-1 font-semibold">No</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Desayuno</p>
                <p class="mt-1 whitespace-pre-line">No incluye</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Check-in</p>
                <p class="mt-1 font-semibold">15:00</p>
              </div>
            </div>
          </div>
        </article>

        <!-- Hotel 4 -->
        <article class="rounded-3xl border bg-white p-5 shadow-sm">
          <div class="flex items-start justify-between gap-3">
            <div>
              <h4 class="text-base font-extrabold text-gray-900">HOTEL MARIA ESTHER</h4>
              <p class="mt-1 text-sm text-gray-600 whitespace-pre-line">
                Xalapa - Puebla, Heroico Colegio Militar, 91273 Perote, Ver.
              </p>
            </div>
            <a href="https://maps.app.goo.gl/aZ89swGGLNQUTqSJ9" target="_blank" rel="noopener noreferrer"
              class="shrink-0 rounded-xl border bg-gray-50 px-3 py-2 text-xs font-extrabold hover:bg-gray-100">
              Ver mapa
            </a>
          </div>

          <div class="mt-4 grid gap-2 text-sm">
            <div class="flex flex-wrap items-center gap-2">
              <span class="text-xs font-extrabold text-gray-500">Tel:</span>
              <a href="tel:+522828250469" class="font-extrabold text-primary hover:underline">2828250469</a>
            </div>

            <div class="rounded-2xl bg-gray-50 p-3">
              <p class="text-xs font-extrabold text-gray-500">Tarifa / habitaciones</p>
              <p class="mt-1 whitespace-pre-line">Sencilla - 1 cama matrimonial $600
                Doble - 2 matrimoniales $800
                Bungalo - 1 matrimonial + 2 matrimonial + 2 matrimoniales + 1 individual $2,200 ( depende las
                personas)</p>
            </div>

            <div class="grid gap-2 sm:grid-cols-3">
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Convenio</p>
                <p class="mt-1 font-semibold">No</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Desayuno</p>
                <p class="mt-1 whitespace-pre-line">No incluye</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Check-in</p>
                <p class="mt-1 font-semibold">12:00</p>
              </div>
            </div>
          </div>
        </article>

        <!-- Hotel 5 -->
        <article class="rounded-3xl border bg-white p-5 shadow-sm">
          <div class="flex items-start justify-between gap-3">
            <div>
              <h4 class="text-base font-extrabold text-gray-900">HOTEL MANSION HUMBOLDT</h4>
              <p class="mt-1 text-sm text-gray-600 whitespace-pre-line">
                Alejandro Von Humboldt Sur 23, Centro, 91270 Perote, Ver.
              </p>
            </div>
            <a href="https://maps.app.goo.gl/QRbzqGuJcWa45mop8" target="_blank" rel="noopener noreferrer"
              class="shrink-0 rounded-xl border bg-gray-50 px-3 py-2 text-xs font-extrabold hover:bg-gray-100">
              Ver mapa
            </a>
          </div>

          <div class="mt-4 grid gap-2 text-sm">
            <div class="flex flex-wrap items-center gap-2">
              <span class="text-xs font-extrabold text-gray-500">Tel:</span>
              <a href="tel:+522821598850" class="font-extrabold text-primary hover:underline">2821598850</a>
            </div>

            <div class="rounded-2xl bg-gray-50 p-3">
              <p class="text-xs font-extrabold text-gray-500">Tarifa / habitaciones</p>
              <p class="mt-1 whitespace-pre-line">1 cama matrimonial $495
                2 camas matrimoniales + 1 cama individual $860
                2 camas individuales $540
                1 cama matrimonial + 1 cama individual $630
                2 camas matrimoniales $730</p>
            </div>

            <div class="grid gap-2 sm:grid-cols-3">
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Convenio</p>
                <p class="mt-1 font-semibold">No</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Desayuno</p>
                <p class="mt-1 whitespace-pre-line">No incluye</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Check-in</p>
                <p class="mt-1 font-semibold">12:00</p>
              </div>
            </div>
          </div>
        </article>

        <!-- Hotel 6 -->
        <article class="rounded-3xl border bg-white p-5 shadow-sm">
          <div class="flex items-start justify-between gap-3">
            <div>
              <h4 class="text-base font-extrabold text-gray-900">HOTEL DEL CENTRO, PEROTE</h4>
              <p class="mt-1 text-sm text-gray-600 whitespace-pre-line">
                C. José María Pino Suárez 17, Centro, 91270 Perote, Ver.
              </p>
            </div>
            <a href="https://maps.app.goo.gl/8fi1dmAfn67x39mq5" target="_blank" rel="noopener noreferrer"
              class="shrink-0 rounded-xl border bg-gray-50 px-3 py-2 text-xs font-extrabold hover:bg-gray-100">
              Ver mapa
            </a>
          </div>

          <div class="mt-4 grid gap-2 text-sm">
            <div class="flex flex-wrap items-center gap-2">
              <span class="text-xs font-extrabold text-gray-500">Tel:</span>
              <a href="tel:+522828251462" class="font-extrabold text-primary hover:underline">2828251462</a>
              <a href="tel:+522828251452" class="font-extrabold text-primary hover:underline">2828251452</a>
            </div>

            <div class="rounded-2xl bg-gray-50 p-3">
              <p class="text-xs font-extrabold text-gray-500">Tarifa / habitaciones</p>
              <p class="mt-1 whitespace-pre-line">Depende las personas y ubicación de habitación</p>
            </div>

            <div class="grid gap-2 sm:grid-cols-3">
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Convenio</p>
                <p class="mt-1 font-semibold">No</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Desayuno</p>
                <p class="mt-1 whitespace-pre-line">No incluye</p>
              </div>
              <div class="rounded-2xl bg-gray-50 p-3">
                <p class="text-xs font-extrabold text-gray-500">Check-in</p>
                <p class="mt-1 font-semibold">13:00</p>
              </div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-primary text-white">
    <div class="mx-auto max-w-7xl px-4 py-10">
      <div class="grid gap-6 md:grid-cols-3">
        <div>
          <p class="text-sm font-extrabold">III Encuentro de Cuerpos Académicos</p>
          <p class="mt-2 text-sm text-white/75">Sede: Instituto Tecnológico Superior de Perote • TecNM</p>
        </div>

        <div>
          <p class="text-sm font-extrabold">Contacto</p>
          <p class="mt-2 text-sm text-white/75">
            Correo: <a class="font-extrabold hover:underline"
              href="mailto:encuentro_ca@itsx.edu.mx">encuentro_ca@itsx.edu.mx</a>
          </p>



          <!-- Redes sociales -->
          <div class="mt-4 flex items-center gap-3">
            <a href="https://www.facebook.com/people/Encuentro-CAs/61573119758181/" target="_blank"
              rel="noopener noreferrer"
              class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-3 py-2 text-sm font-semibold hover:bg-white/20 transition"
              aria-label="Facebook">
              <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path
                  d="M22 12a10 10 0 10-11.6 9.9v-7H8v-3h2.4V9.5A3.3 3.3 0 0114 6h2v3h-2c-.6 0-1 .4-1 1v2h3l-.5 3H13v7A10 10 0 0022 12z" />
              </svg>
              Facebook
            </a>
          </div>
        </div>

        <div>
          <p class="text-sm font-extrabold">Registro</p>
          <a class="mt-2 block text-sm text-white/75 hover:underline" href="https://encuentro-ca.itsx.edu.mx/"
            target="_blank" rel="noopener noreferrer">
            encuentro-ca.itsx.edu.mx
          </a>
        </div>
      </div>

      <p class="mt-8 text-xs text-white/50">© <span id="year"></span> Todos los derechos reservados.</p>
    </div>
  </footer>
  <button id="btnSubir" onclick="irArriba()"
    class="hidden text-xl fixed bottom-6 right-1 md:right-6 bg-primary2 text-white p-3 rounded-full shadow-lg hover:scale-110 transition">
    ↑
  </button>
</body>

</html>