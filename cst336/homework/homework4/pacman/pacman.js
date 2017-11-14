
var output;
var pacman;
var loopTimer;
var numLoops = 0;
var direction = 'left';
var walls = new Array();



var upArrowDown = false;
var downArrowDown = false;
var leftArrowDown = false;
var rightArrowDown = false;

const PACMAN_SPEED = 10;

function loadComplete(){
	output = document.getElementById('output');
	pacman = document.getElementById('pacman');
	
	pacman.style.left = "280px";
	pacman.style.top = "240px";
	pacman.style.width = '40px';
	pacman.style.height = '40px';
	
	loopTimer = setInterval(loop, 50);
	
	//inside walls
    createWall(200, 280, 300, 40);
    
    //top wall
    createWall(-20, 0, 600, 40);
    
    // left side walls
    createWall(0, 0, 640, 180);
    createWall(0, 220, 40, 180);
    
    //right side walls
    createWall(560, 0, 40, 180);
    createWall(560, 220, 40, 180);
    
    //bottom wall;
    createWall(-20, 360, 640, 40);
    
    
}


function createWall()
{
    
    
  	var wall = document.createElement('div');
	wall.setAttribute('id', 'wall_1');
	wall.className = 'wall';
	wall.style.left = '200px';
	wall.style.top = '300px';
	wall.style.height = '40px';
	wall.style.width = '200px';
	gameWindow.appendChild(wall);
	
	var numWalls = walls.length;
	walls[numWalls] = wall;
	output.innerHTML = walls.length;
}

function loop(){
    numLoops++;
    
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    
    if(upArrowDown){
        var pacmanY = parseInt(pacman.style.top) - PACMAN_SPEED;
        if(pacmanY< -30)pacmanY = 390;
        pacman.style.top = pacmanY + 'px';
    }
     if(downArrowDown){
        var pacmanY = parseInt(pacman.style.top) + PACMAN_SPEED;
        if(pacmanY> 390)pacmanY = -30;
        pacman.style.top = pacmanY + 'px';
    }
     if(leftArrowDown){
        var pacmanX = parseInt(pacman.style.left) - PACMAN_SPEED;
        if(pacmanX< -30)pacmanX = 590;
        pacman.style.left = pacmanX + 'px';
    }
     if(rightArrowDown){
        var pacmanX = parseInt(pacman.style.left) + PACMAN_SPEED;
        if(pacmanX > 590)pacmanX = -30;
        pacman.style.left = pacmanX + 'px';
    }
    
    if(hittest(hitWall())) {
        pacman.style.left = originalLeft;
        pacman.style.top = originalTop;
    }
    else output.innerHTML = '';
    
}

function hitWall() {
    var hit = false;
    if(hittest(walls[1], pacman) ) hit = true;
    if(hittest(walls[2], pacman) ) hit = true;
    if(hittest(walls[3], pacman) ) hit = true;
    if(hittest(walls[4], pacman) ) hit = true;
    if(hittest(walls[5], pacman) ) hit = true;
    if(hittest(walls[6], pacman) ) hit = true;
    return hit;

}


document.addEventListener('keydown', function(event){
    output.innerHTML = event.keyCode;
    if(event.keyCode == 37) {//left
        pacman.style.left = parseInt(pacman.style.left) - PACMAN_SPEED + 'px';
        if(!hitWall()) {
            direction = 'left';
             pacman.className = "flip-horizontal";
        }
    }
    if(event.keyCode == 38) {//up
        pacman.style.top = parseInt(pacman.style.top) - PACMAN_SPEED + 'px';
    if(!hitWall()) {
        direction = 'up';
        pacman.className = "rotate270";
    }
    }
    if(event.keyCode == 39){//right 
        pacman.style.left = parseInt(pacman.style.left) + PACMAN_SPEED + 'px';
    if(!hitWall()) {
        direction = 'right';
        pacman.className = "";
    }
    }
    if(event.keyCode == 40) {//down
        pacman.style.top = parseInt(pacman.style.top) + PACMAN_SPEED + 'px';
    if(!hitWall()) {
        direction = 'down';
        pacman.className = "rotate90";
    }
    }
});

document.addEventListener('keyup', function(event){
    if(event.keyCode == 37) leftArrowDown = false;
    if(event.keyCode == 38) upArrowDown = false;
    if(event.keyCode == 39) rightArrowDown = false;
    if(event.keyCode == 40) downArrowDown = false;
});

