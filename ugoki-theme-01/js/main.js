// ===============================
// DOT GRID BACKGROUND ANIMATION
// ===============================

const canvas = document.getElementById("dotGrid");
const ctx = canvas ? canvas.getContext("2d") : null;

let width = 0;
let height = 0;
let dots = [];

const spacing = 18;
const glowRadius = 300;

const mouse = { x: -1000, y: -1000 };

function initCanvas() {
  if (!canvas) return;

  width = canvas.width = window.innerWidth;
  height = canvas.height = window.innerHeight;

  dots = [];

  for (let x = 0; x < width; x += spacing) {
    for (let y = 0; y < height; y += spacing) {
      dots.push({ x, y });
    }
  }
}

function animateDots() {
  if (!ctx) return;

  ctx.clearRect(0, 0, width, height);

  dots.forEach((dot) => {
    const dx = mouse.x - dot.x;
    const dy = mouse.y - dot.y;

    const distance = Math.sqrt(dx * dx + dy * dy);

    let opacity = 0.08;

    if (distance < glowRadius) {
      opacity = 1 - distance / glowRadius;
    }

    ctx.beginPath();
    ctx.arc(dot.x, dot.y, 1, 0, Math.PI * 2);
    ctx.fillStyle = `rgba(0,0,0,${opacity})`;
    ctx.fill();
  });

  requestAnimationFrame(animateDots);
}

window.addEventListener("mousemove", (e) => {
  mouse.x = e.clientX;
  mouse.y = e.clientY;
});

window.addEventListener("mouseleave", () => {
  mouse.x = -1000;
  mouse.y = -1000;
});

window.addEventListener("resize", initCanvas);

initCanvas();
animateDots();

// ===============================
// INTERSECTION OBSERVER
// ===============================

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      entry.target.classList.toggle("show", entry.isIntersecting);
    });
  },
  { threshold: 0.2 },
);

document.querySelectorAll(".step-item").forEach((el) => observer.observe(el));
document
  .querySelectorAll(".scroll-section")
  .forEach((el) => observer.observe(el));

// ===============================
// MODALS
// ===============================

function openMenuModal() {
  document.getElementById("menu-modal-box")?.classList.add("active");
  document.getElementById("menu-backdrop")?.classList.add("active");
}

function closeMenuModal() {
  document.getElementById("menu-modal-box")?.classList.remove("active");
  document.getElementById("menu-backdrop")?.classList.remove("active");
}

function openFormModal() {
  document.getElementById("form-modal-box")?.classList.add("active");
  document.getElementById("form-backdrop")?.classList.add("active");
}

function closeFormModal() {
  document.getElementById("form-modal-box")?.classList.remove("active");
  document.getElementById("form-backdrop")?.classList.remove("active");
}

// ===============================
// COMPONENT FILTER + SEARCH SYSTEM
// ===============================

document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".tab");
  const items = document.querySelectorAll(".component-item");
  const input = document.querySelector(".component-search-input");
  const noResults = document.querySelector(".no-results");

  let currentFilter = "all";

  function showNoResults(state) {
    if (!noResults) return;
    noResults.style.display = state ? "block" : "none";
  }

  function updateItems() {
    let visibleCount = 0;
    if (!input) return;
    const query = input.value.toLowerCase().trim();

    items.forEach((item) => {
      const title = item.dataset.title || "";
      const classes = item.className.toLowerCase();

      const matchesSearch = title.includes(query) || classes.includes(query);

      const matchesCategory =
        currentFilter === "all" ||
        item.classList.contains("cat-" + currentFilter);

      const show = matchesSearch && matchesCategory;

      item.style.display = show ? "block" : "none";

      if (show) visibleCount++;
    });

    showNoResults(visibleCount === 0);
  }

  // ===============================
  // CATEGORY FILTER
  // ===============================

  tabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      currentFilter = this.dataset.filter;

      tabs.forEach((t) => t.classList.remove("active"));
      this.classList.add("active");

      updateItems();
    });
  });

  // ===============================
  // SEARCH (ENTER + LIVE)
  // ===============================

  if (input) {
    // LIVE SEARCH (optional but better UX)
    input.addEventListener("input", function () {
      updateItems();
    });

    // ENTER KEY
    input.addEventListener("keydown", function (e) {
      if (e.key === "Enter") {
        updateItems();
      }
    });
  }
});
