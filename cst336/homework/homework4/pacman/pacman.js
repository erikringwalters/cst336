var output;
var pacman;
var loopTimer;
var numLoops = 0;


var upArrowDown = false;
var downArrowDown = false;
var leftArrowDown = false;
var rightArrowDown = false;

const PACMAN_SPEED = 10;

function loadComplete(){
	output = document.getElementById('output');
	pacman = document.getElementById('pacman');
	
	pacman.style.left = "280px";
	pacman.style.top = "260px";
	pacman.style.width = '40px';
	pacman.style.height = '40px';
	
	loopTimer = setInterval(loop, 50);
	

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
    
    if(hittest(wall_1, pacman)) {
        pacman.style.left = originalLeft;
        pacman.style.top = originalTop;
    }
    else output.innerHTML = '';
    
}


document.addEventListener('keydown', function(event){
    output.innerHTML = event.keyCode;
    if(event.keyCode == 37) {
        leftArrowDown = true;
        pacman.className = "flip-horizontal";
    }
    if(event.keyCode == 38) {
        upArrowDown = true;
        pacman.className = "rotate270";
    }
    if(event.keyCode == 39){ 
        rightArrowDown = true;
        pacman.className = "";
    }
    if(event.keyCode == 40) {
        downArrowDown = true;
        pacman.className = "rotate90";
    }
});

document.addEventListener('keyup', function(event){
    if(event.keyCode == 37) leftArrowDown = false;
    if(event.keyCode == 38) upArrowDown = false;
    if(event.keyCode == 39) rightArrowDown = false;
    if(event.keyCode == 40) downArrowDown = false;
});

