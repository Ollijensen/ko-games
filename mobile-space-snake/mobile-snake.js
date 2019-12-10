let cvs = document.getElementById("snake");
let ctx = cvs.getContext("2d");

// opretter box (boxen designer antal bokse i canvas)
let box = 16;

// load img
let ground = new Image();
ground.src = "mobile-space-snake/img/ground1.png";

let foodImg = new Image();
foodImg.src = "mobile-space-snake/img/lille-man.png";

let sandworm = new Image();
sandworm.src = "mobile-space-snake/img/sandworm.png";

let sandwormbody = new Image();
sandwormbody.src = "mobile-space-snake/img/sandworm-body.png";

// load lyd filer
let dead = new Audio();
let eat = new Audio();
let up = new Audio();
let right = new Audio();
let left = new Audio();
let down = new Audio();

dead.src = "mobile-space-snake/audio/dead.mp3";
eat.src = "mobile-space-snake/audio/eat.mp3";
up.src = "mobile-space-snake/audio/up.mp3";
right.src = "mobile-space-snake/audio/right.mp3";
left.src = "mobile-space-snake/audio/left.mp3";
down.src = "mobile-space-snake/audio/down.mp3";

// laver snake

let snake = [];

snake[0] = {
    x : 9 * box,
    y : 10 * box
};


// laver maden (random hver gang man har spist)

let food = {
    x : Math.floor(Math.random()*17+1) * box,
    y : Math.floor(Math.random()*15+3) * box
}

// laver score 

let score = 0;

//kontrollerer snake (key events)

let d; //Direction

document.addEventListener("keydown",direction);

function direction(event){
    let key = event.keyCode;
    if( key == 37 && d != "RIGHT"){ //Venstre
        left.play();
        d = "LEFT";
    }else if(key == 38 && d != "DOWN"){ //Op
        d = "UP";
        up.play();
    }else if(key == 39 && d != "LEFT"){ //Højre
        d = "RIGHT";
        right.play();
    }else if(key == 40 && d != "UP"){ //Ned
        d = "DOWN";
        down.play();
    }
}

/* pile til tablet */
function moveup() {
    if (moveup && d != "DOWN")
    d = "UP";
  }
  
  function movedown() {
    if (movedown && d != "UP")
    d = "DOWN"; 
  }
  
  function moveleft() {
    if (moveleft && d != "RIGHT")
    d = "LEFT"; 
  }
  
  function moveright() {
    if (moveright && d != "LEFT")
    d = "RIGHT"; 
  }

// check impact funktion
function collision(head,array){
    for(let i = 0; i < array.length; i++){
        if(head.x == array[i].x && head.y == array[i].y){
            return true;
        }
    }
    return false;
}

// tegner til canvas


function draw(){
    
    ctx.drawImage(ground,0,0);
    
    //for loop til at kører slangen(array) over igen
    for( let i = 0; i < snake.length ; i++){
        
        ctx.fillStyle = (i == 0)? ctx.drawImage(sandworm,snake[i].x,snake[i].y,box,box) : ctx.drawImage (sandwormbody,snake[i].x,snake[i].y,box,box) ;

    }

    
    ctx.drawImage(foodImg, food.x, food.y);
    
    // gamle head position
    let snakeX = snake[0].x;
    let snakeY = snake[0].y;
    
    if( d == "LEFT") snakeX -= box;
    if( d == "UP") snakeY -= box;
    if( d == "RIGHT") snakeX += box;
    if( d == "DOWN") snakeY += box;
    
    // Hvis ormen spiser maden
    if(snakeX == food.x && snakeY == food.y){
        score++;
        eat.play();
        food = {
            x : Math.floor(Math.random()*17+1) * box,
            y : Math.floor(Math.random()*15+3) * box
        }
        // Vi fjerne ikke halen
    }else{
        // fjerner slange(array)
        snake.pop();
    }
    
    // add new Head
    
    let newHead = {
        x : snakeX,
        y : snakeY
    }
    
    // game over
    
    if(snakeX < box || snakeX > 17 * box || snakeY < 3*box || snakeY > 17*box || collision(newHead,snake)){
        clearInterval(game);
        dead.play();
    }
    //laver nyt hovedet til begyndelses af array'et (slangen)
    snake.unshift(newHead);
    
    // Din scorer
    ctx.fillStyle = "white";
    ctx.font = "22px Changa one";
    ctx.fillText(score,2*box,1.6*box);
}

// kalder ny slange hvert 130 ms

let game = setInterval(draw,130);


// Deaktiverer scroll med piltaster
window.addEventListener("keydown", function(e) {
    // Mellemrum og piltaster
    if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);















