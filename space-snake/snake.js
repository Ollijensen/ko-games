const cvs = document.getElementById("snake");
const ctx = cvs.getContext("2d");

// laver størrelse på box
const box = 32;

// billeder bliver loadet

const ground = new Image();
ground.src = "space-snake/img/ground1.png";
//ground.src = "img/ground.png"; - if green

const foodImg = new Image();
foodImg.src = "space-snake/img/lille-man.png";
//foodImg.src = "img/food.png";

let sandworm = new Image();
sandworm.src = "space-snake/img/sandworm.png";

let sandwormbody = new Image();
sandwormbody.src = "space-snake/img/sandworm-body.png";
// load audio filer

let dead = new Audio();
let eat = new Audio();
let up = new Audio();
let right = new Audio();
let left = new Audio();
let down = new Audio();

dead.src = "space-snake/audio/dead.mp3";
eat.src = "space-snake/audio/eat.mp3";
up.src = "space-snake/audio/up.mp3";
right.src = "space-snake/audio/right.mp3";
left.src = "space-snake/audio/left.mp3";
down.src = "space-snake/audio/down.mp3";

// laver slangen

let snake = [];

snake[0] = {
    x : 9 * box,
    y : 10 * box
};


// laver maden

let food = {
    x : Math.floor(Math.random()*17+1) * box,
    y : Math.floor(Math.random()*15+3) * box
}

// laver score

let score = 0;

//kontrollere slangen

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


// check collision funktion
function collision(head,array){
    for(let i = 0; i < array.length; i++){
        if(head.x == array[i].x && head.y == array[i].y){
            return true;
        }
    }
    return false;
}

// draw til canvas


function draw(){
    
    ctx.drawImage(ground,0,0);
    
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
    
    // hvis slangen spiser maden
    if(snakeX == food.x && snakeY == food.y){
        score++;
        eat.play();
        food = {
            x : Math.floor(Math.random()*17+1) * box,
            y : Math.floor(Math.random()*15+3) * box
        }
        // vi fjerner ikke slange-halen
    }else{
        // fjerner slage-halen
        snake.pop();
    }
    
    // add'er new Head
    
    let newHead = {
        x : snakeX,
        y : snakeY
    }
    
    // game over
    
    if(snakeX < box || snakeX > 17 * box || snakeY < 3*box || snakeY > 17*box || collision(newHead,snake)){
        clearInterval(game);
        dead.play();
        /* document.location.reload();
        alert("GAME OVER"); */
        playagain.style.display = "block";
        /* document.querySelector("#showscore").innerHTML = score; */
        document.querySelector("#yourscore").value = score;
        
    }
    
    snake.unshift(newHead);

    // Din scorer
    ctx.fillStyle = "white";
    ctx.font = "45px Changa one";
    ctx.fillText(score,2*box,1.6*box);
}

// kalder snake funktion hvert 100 ms

let game = setInterval(draw,100);



// Deaktiverer scroll med piltaster
window.addEventListener("keydown", function(e) {
    // Mellemrum og piltaster
    if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);


// Gør spil igen knappen kommer når man dør
let playagain = document.querySelector("#playagain");
playagain.style.display = "none";



/* function refreshPage(){
    window.location.reload();
}  */

