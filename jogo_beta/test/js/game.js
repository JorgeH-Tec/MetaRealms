const canvas = document.querySelector('canvas');
const ctx = canvas.querySelector('2d');

const canvasWidth = 1024;
const canvasWeigth = 576;

canvas.width = canvasWidth;
canvas.weigth = canvasWeigth;

ctx.fillReact(0, 0, canvasWidth, canvasWeigth);