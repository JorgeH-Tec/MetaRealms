// Opcional: Parar o carrossel ao passar o mouse
const carousel = document.getElementById('carousel');

carousel.addEventListener('mouseenter', () => {
  carousel.style.animationPlayState = 'paused';
});

carousel.addEventListener('mouseleave', () => {
  carousel.style.animationPlayState = 'running';
});

// Particulas

tsParticles.load("particles-js", {
  fullScreen: { enable: false },
  fpsLimit: 60,
  particles: {
    number: { value: 50 },
    color: { value: "#aa00aa" },
    shape: { type: "circle" },
    opacity: { value: 0.7 },
    size: { value: { min: 1, max: 3 } },
    links: {
      enable: true,
      distance: 120,
      color: "#aa00aa",
      opacity: 0.4,
      width: 1,
    },
    move: {
      enable: true,
      speed: 1.5,
      direction: "none",
      random: false,
      straight: false,
      outMode: "bounce",
    },
  },
  interactivity: {
    detectsOn: "canvas",
    events: {
      onHover: { enable: true, mode: "grab" },
      onClick: { enable: true, mode: "push" },
    },
    modes: {
      grab: { distance: 140, links: { opacity: 1 } },
      push: { quantity: 4 },
    },
  },
  detectRetina: true,
});
