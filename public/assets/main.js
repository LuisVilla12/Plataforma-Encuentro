// assets/main.js

// ============ Helpers ============
function $(id) {
  return document.getElementById(id);
}

// ============ Footer year ============
(function footerYear() {
  const yearEl = $("year");
  if (yearEl) yearEl.textContent = new Date().getFullYear();
})();

// ============ Mobile menu (hamburger -> X) ============
(function mobileMenu() {
  const menuBtn = $("menuBtn");
  const mobileMenu = $("mobileMenu");
  const iconHamburger = $("iconHamburger");
  const iconClose = $("iconClose");

  if (!menuBtn || !mobileMenu) return;

  function setOpen(open) {
    mobileMenu.classList.toggle("hidden", !open);
    menuBtn.setAttribute("aria-expanded", String(open));
    menuBtn.setAttribute("aria-label", open ? "Cerrar menú" : "Abrir menú");

    if (iconHamburger && iconClose) {
      iconHamburger.classList.toggle("hidden", open);
      iconHamburger.classList.toggle("inline-flex", !open);

      iconClose.classList.toggle("hidden", !open);
      iconClose.classList.toggle("inline-flex", open);
    }
  }

  menuBtn.addEventListener("click", () => {
    const isOpen = menuBtn.getAttribute("aria-expanded") === "true";
    setOpen(!isOpen);
  });

  // Cierra menú al dar click en un link (móvil)
  mobileMenu.addEventListener("click", (e) => {
    const a = e.target.closest("a");
    if (a) setOpen(false);
  });

  // Cierra con ESC
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") setOpen(false);
  });
})();

// ============ Carousel principal (track + arrows + dots + autoplay) ============
(function carousel() {
  const track = $("track");
  const prevBtn = $("prevBtn");
  const nextBtn = $("nextBtn");
  const dotsWrap = $("dots");
  const carouselWrap = $("carousel");

  if (!track) return;

  let index = 0;
  const slides = track.children.length;

  function goTo(i) {
    index = (i + slides) % slides;
    track.style.transform = `translateX(-${index * 100}%)`;
    renderDots();
  }

  function renderDots() {
    if (!dotsWrap) return;
    dotsWrap.innerHTML = "";
    for (let i = 0; i < slides; i++) {
      const b = document.createElement("button");
      b.type = "button";
      b.className =
        "h-2.5 w-2.5 rounded-full transition " +
        (i === index ? "bg-primary" : "bg-gray-300 hover:bg-gray-400");
      b.setAttribute("aria-label", `Ir a slide ${i + 1}`);
      b.addEventListener("click", () => goTo(i));
      dotsWrap.appendChild(b);
    }
  }

  prevBtn?.addEventListener("click", () => goTo(index - 1));
  nextBtn?.addEventListener("click", () => goTo(index + 1));

  // Teclado
  document.addEventListener("keydown", (e) => {
    if (e.key === "ArrowLeft") goTo(index - 1);
    if (e.key === "ArrowRight") goTo(index + 1);
  });

  // Autoplay con pausa al pasar mouse / focus
  let timer = null;
  function start() {
    stop();
    timer = setInterval(() => goTo(index + 1), 6500);
  }
  function stop() {
    if (timer) clearInterval(timer);
    timer = null;
  }

  if (carouselWrap) {
    carouselWrap.addEventListener("mouseenter", stop);
    carouselWrap.addEventListener("mouseleave", start);
    carouselWrap.addEventListener("focusin", stop);
    carouselWrap.addEventListener("focusout", start);
  }

  renderDots();
  start();
})();

// ============ Programa (tabs Día 1 / Día 2) ============
(function programTabs() {
  const tabs = document.querySelectorAll(".program-tab");
  const panels = document.querySelectorAll(".program-panel");

  if (!tabs.length || !panels.length) return;

  function activate(targetId) {
    panels.forEach((p) => p.classList.toggle("hidden", p.id !== targetId));

    tabs.forEach((t) => {
      const isActive = t.dataset.target === targetId;
      t.setAttribute("aria-pressed", String(isActive));

      if (isActive) {
        t.classList.add("bg-primary", "text-white");
        t.classList.remove("border");
        t.classList.add("hover:bg-primary2");
      } else {
        t.classList.remove("bg-primary", "text-white", "hover:bg-primary2");
        t.classList.add("border");
      }
    });
  }

  tabs.forEach((t) => t.addEventListener("click", () => activate(t.dataset.target)));

  activate("dia1");
})();

// ==========================
// Lightbox / Modal de imagen (Croquis)
// Requiere en HTML:
// - <img id="croquisImg" ...>
// - Modal con ids: imgModal, modalImg, closeModal
// ==========================
(function croquisLightbox() {
  const croquisImg = $("croquisImg");
  const imgModal = $("imgModal");
  const modalImg = $("modalImg");
  const closeModal = $("closeModal");

  function openImgModal(src, alt) {
    if (!imgModal || !modalImg) return;
    modalImg.src = src;
    modalImg.alt = alt || "Imagen ampliada";
    imgModal.classList.remove("hidden");
    imgModal.classList.add("flex");
    document.body.classList.add("overflow-hidden");
  }

  function closeImgModal() {
    if (!imgModal || !modalImg) return;
    imgModal.classList.add("hidden");
    imgModal.classList.remove("flex");
    modalImg.src = "";
    document.body.classList.remove("overflow-hidden");
  }

  if (croquisImg) {
    croquisImg.style.cursor = "zoom-in";
    croquisImg.addEventListener("click", () => openImgModal(croquisImg.src, croquisImg.alt));
  }

  closeModal?.addEventListener("click", closeImgModal);

  imgModal?.addEventListener("click", (e) => {
    if (e.target === imgModal) closeImgModal();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeImgModal();
  });
})();

// =======================
// Galerías (2 carruseles) — Opción A (object-contain)
// Requiere:
// assets/IEncuentroCAs/photos.json
// assets/IIEncuentroCAs/photos.json
// =======================
async function initGalleryCarousel(cfg) {
  const {
    jsonUrl,
    basePath,
    trackId,
    dotsId,
    prevId,
    nextId,
    autoplayMs = 6500,
  } = cfg;

  const track = $(trackId);
  const dotsWrap = $(dotsId);
  const prevBtn = $(prevId);
  const nextBtn = $(nextId);

  if (!track || !dotsWrap || !prevBtn || !nextBtn) return;

  let files = [];
  try {
    const res = await fetch(jsonUrl, { cache: "no-store" });
    if (!res.ok) throw new Error("No se pudo cargar " + jsonUrl);
    files = await res.json();
  } catch (e) {
    track.innerHTML = `
      <div class="relative min-w-full">
        <p class="text-sm font-extrabold text-primary">Galería no disponible</p>
        <p class="mt-2 text-sm text-gray-600">
          Falta el archivo <b>${jsonUrl}</b> o no se puede leer.
        </p>
      </div>`;
    return;
  }

  files = (files || []).filter((f) => /\.(jpg|jpeg|png|webp|gif)$/i.test(f));

  if (!files.length) {
    track.innerHTML = `
      <div class="relative min-w-full">
        <p class="text-sm font-extrabold text-primary">Sin fotos</p>
        <p class="mt-2 text-sm text-gray-600">El JSON está vacío o no contiene imágenes.</p>
      </div>`;
    return;
  }

  // Slides — FOTO COMPLETA (object-contain)
  track.innerHTML = files
    .map((f) => {
      const src = `${basePath}/${f}`;
      return `
        <div class="min-w-full">
          <div class="relative w-full overflow-hidden rounded-2xl border bg-white shadow-sm">
            <div class="flex h-[320px] md:h-[420px] items-center justify-center bg-sand/30">
              <img
                src="${src}"
                alt="Foto del evento"
                class="max-h-full max-w-full object-contain"
                loading="lazy"
              />
            </div>
          </div>
        </div>
      `;
    })
    .join("");

  let index = 0;
  const slides = track.children.length;

  function goTo(i) {
    index = (i + slides) % slides;
    track.style.transform = `translateX(-${index * 100}%)`;
    renderDots();
  }

  function renderDots() {
    dotsWrap.innerHTML = "";
    for (let i = 0; i < slides; i++) {
      const b = document.createElement("button");
      b.type = "button";
      b.className =
        "h-2.5 w-2.5 rounded-full transition " +
        (i === index ? "bg-primary" : "bg-gray-300 hover:bg-gray-400");
      b.setAttribute("aria-label", `Ir a foto ${i + 1}`);
      b.addEventListener("click", () => goTo(i));
      dotsWrap.appendChild(b);
    }
  }

  prevBtn.addEventListener("click", () => goTo(index - 1));
  nextBtn.addEventListener("click", () => goTo(index + 1));

  // Autoplay con pausa
  let timer = null;
  function start() {
    stop();
    timer = setInterval(() => goTo(index + 1), autoplayMs);
  }
  function stop() {
    if (timer) clearInterval(timer);
    timer = null;
  }

  const frame = track.parentElement; // el contenedor con overflow-hidden
  frame?.addEventListener("mouseenter", stop);
  frame?.addEventListener("mouseleave", start);
  frame?.addEventListener("focusin", stop);
  frame?.addEventListener("focusout", start);

  renderDots();
  goTo(0);
  start();
}

document.addEventListener("DOMContentLoaded", () => {
  initGalleryCarousel({
    jsonUrl: "assets/IEncuentroCAs/photos.json",
    basePath: "assets/IEncuentroCAs",
    trackId: "gal1Track",
    dotsId: "gal1Dots",
    prevId: "gal1Prev",
    nextId: "gal1Next",
    autoplayMs: 3000,
  });

  initGalleryCarousel({
    jsonUrl: "assets/IIEncuentroCAs/photos.json",
    basePath: "assets/IIEncuentroCAs",
    trackId: "gal2Track",
    dotsId: "gal2Dots",
    prevId: "gal2Prev",
    nextId: "gal2Next",
    autoplayMs: 3000
  });
});

// botón
const btnSubir = document.getElementById("btnSubir");

// mostrar botón al bajar
window.addEventListener("scroll", function () {

    if (document.documentElement.scrollTop > 200) {
        btnSubir.classList.remove("hidden");
    } else {
        btnSubir.classList.add("hidden");
    }

});

// función para subir
function irArriba() {

    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });

}

document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("btnCarteles");

  // Fecha límite: 23 marzo 2026, 20:00 (GMT-6)
  const fechaLimite = new Date("2026-03-23T20:00:00-06:00");

  btn.addEventListener("click", function (e) {
    const ahora = new Date();

    if (ahora >= fechaLimite) {
      e.preventDefault(); // 🚫 bloquea el link

      Swal.fire({
        icon: "error",
        title: "Registro cerrado",
        text: "El registro de carteles ha finalizado.",
        confirmButtonColor: "#611232"
      });
    }
    // Si no, deja que el link funcione normal
  });
});