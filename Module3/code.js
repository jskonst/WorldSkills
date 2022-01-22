console.log("Before Load");

window.onload = () => {
  console.log("Loaded");
  header = document.querySelector("h1");
  if (header) {
    header.textContent = "Hello";
  }

  var canvas = document.getElementById("myCanvas");
  var ctx = canvas.getContext("2d");
  draw(ctx);
  
};

const draw = (ctx) => {
  ctx.beginPath();
  ctx.rect(20, 40, 50, 50);
  ctx.fillStyle = "#FF0000";
  ctx.fill();
  ctx.closePath();
};

console.log("After load");
