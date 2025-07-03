// map:
const Map = function(title) {
    this.data = {};
    this.tiles = [];
    this.timer = setInterval(() => this.frame(), 750);

    this.load(title);
};

Map.prototype = {
    load: function(title) {
        let self = this;  // GUARDA A REFERÊNCIA CORRETA AO OBJETO MAP

        LoadURL("assets/json/" + title.toString().toLowerCase() + ".json", function(result) {
            self.data = JSON.parse(result);
            self.data.frame = 0;

            let init = false;
            let loaded = 0;

            for (let i = 0; i < self.data.assets.length; i++) {
                self.tiles.push(new Image());
                self.tiles[i].src = "assets/img/tile/" + self.data.assets[i].file_name + ".png?v=" + new Date().getTime();

                self.tiles[i].onload = function() {
                    loaded++;

                    if (!init && loaded == self.data.assets.length) {
                        init = true;

                        // SUBSTITUIR TODOS OS 0s POR 4 (tile do mar)
                        for (let y = 0; y < self.data.layout.length; y++) {
                            for (let x = 0; x < self.data.layout[y].length; x++) {
                                let valor = parseInt(self.data.layout[y][x]);
                                if (valor === 0) {
                                    self.data.layout[y][x] = 4; // índice do tile "wave"
                                }
                            }
                        }

                        Loop();
                    }
                };
            }
        });
    },

    draw: function() {
        let x_min = Math.floor(viewport.x / config.size.tile);
        let y_min = Math.floor(viewport.y / config.size.tile);
        let x_max = Math.ceil((viewport.x + viewport.w) / config.size.tile);
        let y_max = Math.ceil((viewport.y + viewport.h) / config.size.tile);

        if (x_min < 0) { x_min = 0; }
        if (y_min < 0) { y_min = 0; }
        if (x_max > this.data.width) { x_max = this.data.width; }
        if (y_max > this.data.height) { y_max = this.data.height; }

        for (let y = y_min; y < y_max; y++) {
            for (let x = x_min; x < x_max; x++) {
                let value  = this.data.layout[y][x] - 1;
                let tile_x = Math.floor((x * config.size.tile) - viewport.x + (config.win.width / 2) - (viewport.w / 2));
                let tile_y = Math.floor((y * config.size.tile) - viewport.y + (config.win.height / 2) - (viewport.h / 2));

                if (value > -1) {
                    let frame = this.data.frame;

                    if (frame > this.data.assets[value].frames) {
                        frame = 0;
                    }

                    context.drawImage(
                        this.tiles[value],
                        frame * config.size.tile,
                        0,
                        config.size.tile,
                        config.size.tile,
                        tile_x,
                        tile_y,
                        config.size.tile,
                        config.size.tile
                    );
                }
            }
        }
    },

    frame: function() {
        this.data.frame = (this.data.frame == 0) ? 1 : 0;
    }
};
