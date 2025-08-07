var attackImage = new Image();
attackImage.src = "assets/img/char/atk2.png";


// local variables:
var config = {
    win: {
        width: window.innerWidth,
        height: window.innerHeight
    },
    tiles: {
        x: Math.ceil(window.innerWidth / 64) + 2,
        y: Math.ceil(window.innerHeight / 64) + 2
    },
    center: {
        x: Math.round(window.innerWidth / 64) / 2,
        y: Math.round(window.innerHeight / 64) / 2
    },
    size: {
        tile: 64,
        char: 96
    },
    speed: 3
};

var keys = {
    // left:
    37: { x: -config.speed, y: 0, a: false, f: [6, 7, 8, 7] },
    // up:
    38: { x: 0, y: -config.speed, a: false, f: [3, 4, 5, 4] },
    // right:
    39: { x: config.speed, y: 0, a: false, f: [9, 10, 11, 10] },
    // down:
    40: { x: 0, y: config.speed, a: false, f: [0, 1, 2, 1] }
};

var viewport;
var player;
var map;
var context;

var fps = {
    count: 0,
    shown: 0,
    last:  0
};

var enemies = [];
var attack = null;
var attackDuration = 200; // em milissegundos
var respawnTime = 3000; // tempo para reaparecer

// setup game:
function Setup() {
    context = document.getElementById("game").getContext("2d");
    viewport = new Viewport(0, 0, config.win.width, config.win.height);
    player = new Player(4, 3);
    map = new Map("Map");

    Sizing();
    createEnemies();

    setInterval(function () {
        fps.shown = fps.count;
    }, 1000);

    Loop();
}

// window and canvas sizing:
function Sizing() {
    config.win = {
        width: window.innerWidth,
        height: window.innerHeight
    };

    config.tiles = {
        x: Math.ceil(config.win.width / config.size.tile),
        y: Math.ceil(config.win.height / config.size.tile)
    };

    config.center = {
        x: Math.round(config.tiles.x / 2),
        y: Math.round(config.tiles.y / 2)
    };

    viewport.x = 0;
    viewport.y = 0;
    viewport.w = config.win.width;
    viewport.h = config.win.height;

    context.canvas.width = config.win.width;
    context.canvas.height = config.win.height;
}

// log data to screen:
function Log(type, text) {
    document.getElementById(type).innerHTML = text;
}

// AJAX call:
function LoadURL(url, callback) {
    let http = new XMLHttpRequest();

    http.overrideMimeType("application/json");
    http.open("GET", url + "?v=" + new Date().getTime(), true);
    http.onreadystatechange = function () {
        if (http.readyState === 4 && http.status == "200") {
            callback(http.responseText);
        }
    };
    http.send(null);
}

// game loop:
function Loop() {
    window.requestAnimationFrame(Loop);

    context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Limpa o canvas

    Sizing();
    viewport.center();
    map.draw();

    player.draw();
    updateEnemies();
    updateAttack();

    if (!fps.last) {
        fps.last = Date.now();
        fps.count = 0;
    }

    let delta = (Date.now() - fps.last) / 1000;
    fps.last = Date.now();
    fps.count = Math.round(1 / delta);

    Log("fps", "FPS: " + fps.shown);

}

// on window load:
window.onload = function () {
    Setup();
};

// on window resize:
window.onresize = function () {
    Sizing();
};

function Enemy(x, y, imageSrcOrColor = "black") {
    this.x = x;
    this.y = y;
    this.hp = 3;
    this.hitTimer = 0;
    this.alive = true;
    this.respawnTimer = 0;

    // Se for string terminando com ".png" ou outra extensão de imagem, cria um objeto Image
    if (typeof imageSrcOrColor === "string" && (imageSrcOrColor.endsWith(".png") || imageSrcOrColor.endsWith(".jpg") || imageSrcOrColor.endsWith(".jpeg"))) {
        this.image = new Image();
        this.image.src = imageSrcOrColor;
        this.color = null;
    } else {
        this.image = null;
        this.color = imageSrcOrColor;
    }

    this.draw = function () {
        if (!this.alive) return;
    
        let px = (this.x * config.size.tile) - viewport.x;
        let py = (this.y * config.size.tile) - viewport.y;
    
        if (this.image && this.image.complete) {
            if (this.hitTimer > 0) {
                // Criar canvas temporário
                let offscreenCanvas = document.createElement('canvas');
                offscreenCanvas.width = config.size.tile;
                offscreenCanvas.height = config.size.tile;
                let offCtx = offscreenCanvas.getContext('2d');
    
                // Desenha a imagem normal no canvas temporário
                offCtx.drawImage(this.image, 0, 0, config.size.tile, config.size.tile);
    
                // Muda modo para pintar só onde já tem pixels da imagem
                offCtx.globalCompositeOperation = 'source-in';
    
                // Aplica a cor vermelha semi-transparente
                offCtx.fillStyle = 'rgba(255, 0, 0, 0.7)';
                offCtx.fillRect(0, 0, config.size.tile, config.size.tile);
    
                // Desenha o resultado no canvas principal
                context.drawImage(offscreenCanvas, px, py);
    
                this.hitTimer--;
            } else {
                // Desenha a imagem normalmente
                context.drawImage(this.image, px, py, config.size.tile, config.size.tile);
            }
        } else if (this.color) {
            context.fillStyle = this.color;
            context.fillRect(px, py, config.size.tile, config.size.tile);
    
            if (this.hitTimer > 0) {
                context.fillStyle = "rgba(255, 0, 0, 0.7)";
                context.fillRect(px, py, config.size.tile, config.size.tile);
                this.hitTimer--;
            }
        }
    };
    
    

    this.takeDamage = function () {
        if (!this.alive) return;

        this.hp--;
        this.hitTimer = 50;

        if (this.hp <= 0) {
            this.alive = false;
            this.respawnTimer = respawnTime / 16;
        }
    };

    this.update = function () {
        if (!this.alive) {
            this.respawnTimer--;
            if (this.respawnTimer <= 0) {
                this.hp = 4;
                this.alive = true;
                this.hitTimer = 0; // reseta hitTimer pra não começar vermelho
            }
        }
    };
    
}


function createEnemies() {
    enemies.push(new Enemy(5, 18, 'assets/img/char/fantasma.png'));  // imagem
    enemies.push(new Enemy(15, 14, 'assets/img/char/fantasma.png'));
    enemies.push(new Enemy(21, 21, 'assets/img/char/fantasma.png'));
    enemies.push(new Enemy(29, 21, 'assets/img/char/fantasma.png'));
    enemies.push(new Enemy(11, 17, 'assets/img/char/fantasma.png'));
    enemies.push(new Enemy(39, 23, 'assets/img/char/fantasma.png'));
    enemies.push(new Enemy(43, 21, 'assets/img/char/fantasma.png'));



    enemies.push(new Enemy(43, 13, 'assets/img/char/espantalho-1.png'));
    enemies.push(new Enemy(43, 3, 'assets/img/char/espantalho-1.png'));
    enemies.push(new Enemy(36, 7, 'assets/img/char/espantalho-1.png'));
    enemies.push(new Enemy(48, 8, 'assets/img/char/espantalho-1.png'));
    enemies.push(new Enemy(15, 5, 'assets/img/char/espantalho-1.png'));

    
}


function updateEnemies() {
    for (let e of enemies) {
        e.update();
        e.draw();
    }
}

function performAttack() {
    if (attack) return;

    let dx = 0, dy = 0;
    let dir = player.direction;

    if (dir === 37) dx = -1;
    if (dir === 38) dy = -1;
    if (dir === 39) dx = 1;
    if (dir === 40) dy = 1;

    let atkX = player.tile.x + dx;
    let atkY = player.tile.y + dy;

attack = {
    x: atkX,
    y: atkY,
    timer: attackDuration / 16,
    opacity: 1.0 // Começa com opacidade total
};


    for (let e of enemies) {
        if (e.alive && e.x === atkX && e.y === atkY) {
            e.takeDamage();
        }
    }
}

function updateAttack() {
    if (attack) {
        let tileSize = config.size.tile;
        let px = (attack.x * tileSize) - viewport.x;
        let py = (attack.y * tileSize) - viewport.y;

        context.save();
        context.globalAlpha = attack.opacity;

        // Move para o centro do tile
        context.translate(px + tileSize / 2, py + tileSize / 2);

        // Corrigir a rotação baseada na direção do personagem
        let dir = player.direction;

        if (dir === 37) {
            // Esquerda → rotacionar -90° (sentido anti-horário)
            context.rotate(Math.PI / 2);
        } else if (dir === 38) {
            // Cima → rotacionar 180°
            context.rotate(Math.PI);
        } else if (dir === 39) {
            // Direita → rotacionar +90° (sentido horário)
            context.rotate(-Math.PI / 2);
        }
        // Baixo (40) não precisa de rotação

        if (attackImage.complete) {
            context.drawImage(
                attackImage,
                -tileSize / 2,
                -tileSize / 2,
                tileSize,
                tileSize
            );
        }

        context.restore();

        attack.opacity -= 0.05;
        attack.timer--;

        if (attack.timer <= 0 || attack.opacity <= 0) {
            attack = null;
        }
    }
}





window.onclick = function () {
    performAttack();
};
