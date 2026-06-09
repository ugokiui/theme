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

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("[data-open-menu]").forEach((el) => {
    el.addEventListener("click", (e) => {
      e.preventDefault();
      openMenuModal();
    });
  });

  document.querySelectorAll("[data-close-menu]").forEach((el) => {
    el.addEventListener("click", closeMenuModal);
  });

  document.querySelectorAll("[data-open-form]").forEach((el) => {
    el.addEventListener("click", (e) => {
      e.preventDefault();
      openFormModal();
    });
  });

  document.querySelectorAll("[data-close-form]").forEach((el) => {
    el.addEventListener("click", closeFormModal);
  });
});
