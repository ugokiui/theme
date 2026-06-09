const canvas = document.getElementById("dotGrid");
const ctx = canvas ? canvas.getContext("2d") : null;

let width = 0;
let height = 0;
let dots = [];
let animationId = null;

const spacing = 18;
const glowRadius = 300;
const desktopQuery = window.matchMedia("(min-width: 992px)");

const mouse = { x: -1000, y: -1000 };

function isDotGridActive() {
  return ctx && desktopQuery.matches && !document.hidden;
}

function initCanvas() {
  if (!canvas || !desktopQuery.matches) return;

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
  if (!isDotGridActive()) {
    animationId = null;
    return;
  }

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

  animationId = requestAnimationFrame(animateDots);
}

function startAnimation() {
  if (!animationId && isDotGridActive()) {
    initCanvas();
    animateDots();
  }
}

function stopAnimation() {
  if (animationId) {
    cancelAnimationFrame(animationId);
    animationId = null;
  }
}

if (canvas) {
  window.addEventListener("mousemove", (e) => {
    mouse.x = e.clientX;
    mouse.y = e.clientY;
  });

  window.addEventListener("mouseleave", () => {
    mouse.x = -1000;
    mouse.y = -1000;
  });

  window.addEventListener("resize", () => {
    initCanvas();
  });

  document.addEventListener("visibilitychange", () => {
    if (document.hidden) {
      stopAnimation();
    } else {
      startAnimation();
    }
  });

  desktopQuery.addEventListener("change", () => {
    if (desktopQuery.matches) {
      startAnimation();
    } else {
      stopAnimation();
    }
  });

  startAnimation();
}
