(() => {
  const canvas = document.createElement('canvas');
  canvas.id = 'space-canvas';
  document.body.prepend(canvas);

  const ctx = canvas.getContext('2d');
  let w, h;

  function resize() {
    w = window.innerWidth;
    h = window.innerHeight;
    canvas.width = w * devicePixelRatio;
    canvas.height = h * devicePixelRatio;
    canvas.style.width = w + 'px';
    canvas.style.height = h + 'px';
    ctx.setTransform(1, 0, 0, 1, 0, 0);
    ctx.scale(devicePixelRatio, devicePixelRatio);
  }
  resize();
  window.addEventListener('resize', resize);

  class Star {
    constructor() {
      this.reset();
    }
    reset() {
      this.x = Math.random() * w;
      this.y = Math.random() * h;
      this.size = Math.random() * 1.2 + 0.2;
      this.speed = (this.size * 0.2) + 0.05;
      this.opacity = Math.random();
      this.opacityChange = (Math.random() * 0.02) + 0.005;
      this.direction = Math.random() < 0.5 ? 1 : -1;
      this.color = `rgba(170, 0, 170, ${this.opacity})`;
    }
    update() {
      this.y -= this.speed;
      if (this.y < 0) this.y = h;
      this.opacity += this.opacityChange * this.direction;
      if (this.opacity <= 0.1) this.direction = 1;
      else if (this.opacity >= 1) this.direction = -1;
      this.color = `rgba(170, 0, 170, ${this.opacity.toFixed(2)})`;
    }
    draw(ctx) {
      ctx.beginPath();
      const gradient = ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.size * 3);
      gradient.addColorStop(0, this.color);
      gradient.addColorStop(1, 'rgba(170, 0, 170, 0)');
      ctx.fillStyle = gradient;
      ctx.arc(this.x, this.y, this.size * 2, 0, Math.PI * 2);
      ctx.fill();
    }
  }

  const starsCount = 150;
  const stars = [];
  for (let i = 0; i < starsCount; i++) {
    stars.push(new Star());
  }

  function animate() {
    ctx.clearRect(0, 0, w, h);
    stars.forEach(star => {
      star.update();
      star.draw(ctx);
    });
    requestAnimationFrame(animate);
  }

  animate();
})();

  //ligações

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


  // Scroll suave para links âncora

window.addEventListener('DOMContentLoaded', () => {
  const botao = document.querySelector('.botao-primario');
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



// Carrocel
document.addEventListener('DOMContentLoaded', () => {
  let indexAtual = 0;
  const imagens = document.querySelectorAll('.carrossel-img');

  if (imagens.length > 0) {
    imagens[indexAtual].classList.add('ativo');

    function mostrarProximaImagem() {
      imagens[indexAtual].classList.remove('ativo');
      indexAtual = (indexAtual + 1) % imagens.length;
      imagens[indexAtual].classList.add('ativo');
    }

    setInterval(mostrarProximaImagem, 4000);
  }
});


// editar perfil


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


