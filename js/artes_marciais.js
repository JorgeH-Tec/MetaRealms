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


// Partículas vermelho sangue
tsParticles.load("particles-js", {
  particles: {
    number: {
      value: 60,
      density: {
        enable: true,
        area: 800
      }
    },
    color: {
      value: ["#8B0000", "#B22222", "#FF0000", "#7C0A02"] // Variações de vermelho sangue
    },
    shape: {
      type: "char",
  character: {
    value: "🩸", // símbolos Unicode (ex: ☠️, 💉, 🧛, 🩹)
    font: "Verdana",
    style: "",
    weight: "400",
    fill: true
  }
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

