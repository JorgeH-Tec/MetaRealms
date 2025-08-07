    const botoes = document.querySelectorAll('.btn-detalhes');
    const modal = document.getElementById('modal-missao');
    const titulo = document.getElementById('modal-titulo');
    const descricao = document.getElementById('modal-descricao');
    const classe = document.getElementById('modal-classe');
    const fechar = document.getElementById('fechar-modal');

    botoes.forEach(btn => {
      btn.addEventListener('click', () => {
        titulo.textContent = btn.dataset.titulo;
        descricao.textContent = btn.dataset.descricao;
        classe.textContent = 'Classe: ' + btn.dataset.classe;
        modal.classList.add('show');
      });
    });

    fechar.addEventListener('click', () => {
      modal.classList.remove('show');
    });

    window.addEventListener('click', e => {
      if (e.target === modal) {
        modal.classList.remove('show');
      }
    });



tsParticles.load("particles-js", {
  background: {
    color: {
      value: "#000000" // Fundo escuro para destacar as folhas
    }
  },
  particles: {
    number: {
      value: 80,
      density: {
        enable: true,
        area: 800
      }
    },
    color: {
      value: ["#0a3d1e", "#1b5e20", "#2e7d32"] // Tons de verde escuro
    },
    shape: {
      type: "circle"
    },
    opacity: {
      value: 0.8,
      random: true
    },
    size: {
      value: 4,
      random: true
    },
    move: {
      enable: true,
      speed: 0.6,
      direction: "none",
      random: true,
      straight: false,
      outModes: "out"
    }
  },
  interactivity: {
    events: {
      onHover: {
        enable: true,
        mode: "repulse"
      },
      resize: true
    },
    modes: {
      repulse: {
        distance: 50,
        duration: 0.4
      }
    }
  },
  detectRetina: true
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
