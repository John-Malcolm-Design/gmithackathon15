// Gets canvas element in DOM
var canvas = document.getElementById("canvas-game");

// Specifies context for canvas element and names 2d context as "ctx"
var ctx = canvas.getContext("2d");

// Defines ball object
// To-Do: Refactor properties out into sub objects for velocity, acceleration and position (3 objects).
var ball = {
  x: 0,
  y: 0,
  xv: 0,
  yv: 0,
  r: 10,
  acc_x: 2,
  acc_y: 2,
  active: "false"
};

function Rectangle(x, y, w, h) {
  this.x = x;
  this.y = y;
  this.w = w;
  this.h = h;
}

// Defines rectangle object
var rectangle = new Rectangle(0, 0, 80, 20);

var rectArr = [];

// temp
var temp = 0;

// For random function
var leftLimit = 1 + 20;

for (var i = 0; i < 3; i++) {
  temp = Math.floor((Math.random() * canvas.width) + leftLimit);
  rectArr.push(new Rectangle(temp, 20, 20, 20));
}

// Resizes the canvas element. May remove as it is not needed.
function init() {
  canvas.width = 400;
  canvas.height = 400;

}

// Calls init function
init();

// Listens for click events on the canvas element
canvas.addEventListener("click", function(event) {

  // ? Why is the animation frame only being cancelled when the ball
  // is set to 0s and "false" ?
  if (ball.active == "true") {

    ball = {
      x: 0,
      y: 0,
      xv: 0,
      yv: 0,
      r: 10,
      active: "false"
    };


    window.cancelAnimationFrame(repeatme);

    // Why is this not clearing the rectangle?
    // The ball seems to just be sitting in the top left corner.
    ctx.clearRect(0, 0, canvas.width, canvas.height);

  } else {

    // Sets ball state for control variable
    ball.active = "true";

    // Sets x and y coordinates of the ball to where the user has clicked.
    ball.x = event.clientX - ball.r;
    ball.y = event.clientY - ball.r;

    // Draws (or redraws) the circle
    ctx.beginPath();
    ctx.arc(ball.x, ball.y, ball.r, 0, 2 * Math.PI);
    ctx.fill();
    ctx.closePath();

    // Calls the recursive repeatme function
    repeatme();

  }
});

// Add an event listener to the keypress event.
window.addEventListener("keydown", function(event) {

  // Switches through up, down, left and right arrow keys
  // Updates and resets velocity accordingly
  switch (event.keyCode) {
    case 39:
      ball.xv += 1;
      ball.yv = 0;
      break;

    case 37:
      ball.xv += -1;
      ball.yv = 0;
      break;

    case 38:
      ball.yv += -1;
      ball.xv = 0;
      break;

    case 40:
      ball.yv += 1;
      ball.xv = 0;
      break;
  }


});

// This function clears the canvas, updates ball co-ordinates based on velocity, 
// checks that the ball doesnt go out of the bounds of the canvas and redraws 
// the ball 60 times per second using the requestAnimationFrame function.
function repeatme() {

  // Prints velocity of pall to screen (for both axes) to test.
  ball_speed_x.innerHTML = "x velocity =" + ball.xv;
  ball_speed_y.innerHTML = "y velocity =" + ball.yv;

  // Clears the canvas
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  var tempRect;

  for (var i = 0; i < 3; i++) {

    tempRect = rectArr[i];

    // Draw rectangle
    ctx.beginPath();
    ctx.rect(tempRect.x, tempRect.y, tempRect.w, tempRect.h);
    ctx.fillStyle = "#ff0000";
    ctx.closePath();
    ctx.fill();

  };

  ball.x += ball.xv;
  ball.y += ball.yv;

  // Boundary Constraint
  if (ball.x < (0 + ball.r) || ball.x > (canvas.width - ball.r)) {
    if (ball.x <= (0 + ball.r)) {
      ball.x = (0 + ball.r);
    } else {
      ball.x = (canvas.width - ball.r);
    }
    ball.xv = -ball.xv;
  }

  // Boundary Constraint
  if (ball.y < (0 + ball.r) || ball.y > (canvas.height - ball.r)) {
    if (ball.y <= (0 + ball.r)) {
      ball.y = (0 + ball.r);
    } else {
      ball.y = (canvas.height - ball.r);
    }
    ball.yv = -ball.yv;
  }

  // Draw the ball (stroked, not filled).
  ctx.beginPath();
  ctx.fillStyle = "#0000ff";
  ctx.arc(ball.x, ball.y, ball.r, 0, 2 * Math.PI);
  ctx.closePath();
  ctx.fill();

  //Frame repeat
  window.requestAnimationFrame(repeatme);
}