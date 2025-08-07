// Partículas roxas
tsParticles.load("particles-js", {
  background: {
    color: {
      value: "#000000" // Fundo escuro para destacar as bolinhas
    }
  },
  particles: {
    number: {
      value: 60,
      density: {
        enable: true,
        area: 800
      }
    },
    color: {
      value: ["#7b16ffff", "#9c3ffaff", "#b84fffff"] // Variações de roxo claro
    },
    shape: {
      type: "circle"
    },
    opacity: {
      value: 0.5,
      random: true
    },
    size: {
      value: 5.5,
      random: true
    },
    move: {
      enable: true,
      speed: 0.4,
      direction: "top",
      random: true,
      straight: false,
      outModes: "out"
    }
  },
  interactivity: {
    events: {
      onHover: {
        enable: false
      },
      resize: true
    }
  },
  detectRetina: true
});