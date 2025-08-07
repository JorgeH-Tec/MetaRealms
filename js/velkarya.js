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
      value: 0.8,
      random: true
    },
    size: {
      value: 5.5,
      random: true
    },
    move: {
      enable: true,
      speed: 2.8,
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


    // Modal
    function abrirModal(continente) {
      const modal = document.getElementById("modal");
      const titulo = document.getElementById("modal-title");
      const descricao = document.getElementById("modal-description");

      if (continente === "Elarion") {
        titulo.textContent = "Elarion - Terra dos Elfos";
        descricao.textContent = "O continente dos Elfos, onde a magia da vida e a natureza são reverenciadas. As florestas eternas abrigam seres antigos e sábios, que buscam manter o equilíbrio do mundo.";
      } else if (continente === "Solcarmis") {
        titulo.textContent = "Solcarmis - Terra dos Humanos";
        descricao.textContent = "O continente dos Humanos, dividido entre fé e razão, progresso e tradição. Aqui se desenrola uma guerra contra os Demônios, marcada por conflitos internos e ideais diversos.";
      } else if (continente === "Umbra'Veyl") {
        titulo.textContent = "Umbra'Veyl - Terra dos Demônios";
        descricao.textContent = "O continente dos Demônios, envolto em sombras e mistérios. Uma terra de sobrevivência, honra e antigas tradições, frequentemente alvo do preconceito dos Humanos.";
      }

      modal.style.display = "flex";
    }

    function fecharModal() {
      document.getElementById("modal").style.display = "none";
    }

    // Fecha modal ao clicar fora do conteúdo
    window.onclick = function(event) {
      const modal = document.getElementById("modal");
      if (event.target === modal) {
        fecharModal();
      }
    };

    window.addEventListener('DOMContentLoaded', () => {
  const botao = document.querySelector('.btn-hero');
  if (botao) {
    botao.addEventListener('click', e => {
      e.preventDefault();
      const destino = document.querySelector(botao.getAttribute('href'));
      if (destino) {
        destino.scrollIntoView({ behavior: 'smooth' });
      }
    });
  }
});


    
document.addEventListener("DOMContentLoaded", function () {
  const avatar = document.getElementById('abrirDropdownPerfil');
  const dropdown = document.getElementById('dropdownPerfil');

  if (avatar && dropdown) {
    avatar.addEventListener('click', function (e) {
      e.stopPropagation();
      if (getComputedStyle(dropdown).display === 'none') {
        dropdown.style.display = 'block';
      } else {
        dropdown.style.display = 'none';
      }
    });

    window.addEventListener('click', function (e) {
      if (!dropdown.contains(e.target) && e.target !== avatar) {
        dropdown.style.display = 'none';
      }
    });
  }
});
