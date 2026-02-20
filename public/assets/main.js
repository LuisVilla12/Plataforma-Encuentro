// assets/main.js

// Año footer
const yearEl = document.getElementById("year");
if (yearEl) yearEl.textContent = new Date().getFullYear();

// Menú móvil + cambio de icono (☰ / ✕)
const menuBtn = document.getElementById("menuBtn");
const mobileMenu = document.getElementById("mobileMenu");
const iconHamburger = document.getElementById("iconHamburger");
const iconClose = document.getElementById("iconClose");

function setMenuOpen(isOpen) {
  if (!mobileMenu || !menuBtn) return;

  mobileMenu.classList.toggle("hidden", !isOpen);
  menuBtn.setAttribute("aria-expanded", String(isOpen));

  // alternar iconos
  if (iconHamburger) iconHamburger.classList.toggle("hidden", isOpen);
  if (iconClose) iconClose.classList.toggle("hidden", !isOpen);
}

if (menuBtn) {
  menuBtn.addEventListener("click", () => {
    const isOpen = !mobileMenu?.classList.contains("hidden");
    setMenuOpen(!isOpen);
  });
}

// Cerrar menú móvil al dar click en un link
if (mobileMenu) {
  mobileMenu.querySelectorAll("a").forEach((a) => {
    a.addEventListener("click", () => setMenuOpen(false));
  });
}

// Slider
const track = document.getElementById("track");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const dotsWrap = document.getElementById("dots");

let index = 0;
const slides = track?.children?.length || 0;

function renderDots() {
  if (!dotsWrap) return;
  dotsWrap.innerHTML = "";

  for (let i = 0; i < slides; i++) {
    const b = document.createElement("button");
    b.className =
      "h-2.5 w-2.5 rounded-full " +
      (i === index ? "bg-primary" : "bg-gray-300 hover:bg-gray-400");
    b.addEventListener("click", () => goTo(i));
    dotsWrap.appendChild(b);
  }
}

function goTo(i) {
  if (!track || slides === 0) return;
  index = (i + slides) % slides;
  track.style.transform = `translateX(-${index * 100}%)`;
  renderDots();
}

if (prevBtn) prevBtn.addEventListener("click", () => goTo(index - 1));
if (nextBtn) nextBtn.addEventListener("click", () => goTo(index + 1));

renderDots();

// Auto-play (solo si hay slides)
if (slides > 1) {
  setInterval(() => goTo(index + 1), 6500);
}