

// main.js
//import {hittest} from 'myGameLibrary.js'; // or './module'
// let hittest(a,b) = hittest(a,b); // val is "Hello";
var output;
var pacman;
var loopTimer;
var numLoops = 0;
var direction = 'right';
var walls = new Array();
var gameWindow = document.getElementById('gameWindow');
var redGhost;
var rgDirection;


var upArrowDown = false;
var downArrowDown = false;
var leftArrowDown = false;
var rightArrowDown = false;

const PACMAN_SPEED = 10;

const GHOST_SPEED = 5;



function createWall(left, top, width, height)
{
    
  	var wall = document.createElement('div');
	wall.className = 'wall';
	wall.style.left = left +'px';
	wall.style.top = top + 'px';
	wall.style.width = width + 'px';
	wall.style.height = height + 'px';
	
	document.getElementById('gameWindow').appendChild(wall);
	
	var numWalls = walls.length;
	walls[numWalls] = wall;
	//output.innerHTML = walls.length;
}



function loop(){
    numLoops++;
    tryToChangeDirection();
    
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    
    if(direction == 'up'){
        var pacmanY = parseInt(pacman.style.top) - PACMAN_SPEED;
        if(pacmanY< -30)pacmanY = 390;
        pacman.style.top = pacmanY + 'px';
    }
     if(direction == 'down'){
        var pacmanY = parseInt(pacman.style.top) + PACMAN_SPEED;
        if(pacmanY> 390)pacmanY = -30;
        pacman.style.top = pacmanY + 'px';
    }
     if(direction == 'left'){
        var pacmanX = parseInt(pacman.style.left) - PACMAN_SPEED;
        if(pacmanX< -30)pacmanX = 590;
        pacman.style.left = pacmanX + 'px';
    }
     if(rightArrowDown){
        var pacmanX = parseInt(pacman.style.left) + PACMAN_SPEED;
        if(pacmanX > 590)pacmanX = -30;
        pacman.style.left = pacmanX + 'px';
    }
     if(direction == 'right'){
        var pacmanX = parseInt(pacman.style.left) + PACMAN_SPEED;
        if(pacmanX > 590)pacmanX = -30;
        pacman.style.left = pacmanX + 'px';
    }
    
   if(hitWall(pacman)){
      pacman.style.left=originalLeft;
    pacman.style.top = originalTop;
   }
   
  if(hittest(pacman, redGhost)){
      output.innerHTML = 'You Died';
  }

//   if(rgX>590) rgX = -30;
//   redGhost.style.left = rgX + GHOST_SPEED + 'px';
   
 // if(hitWall(redGhost)) redGhost.style.left = rgX + 'px';
   
   moveRedGhost();
   
  if(hittest(pacman, redGhost)) {
      clearInterval(loopTimer);
  }
}

function moveRedGhost()
{
       
   //move red ghost
   //Asumption that there are no dead ends in the masze
   //Rules never go in the opposite direction
   //Randomly choose a direction every move (excluding the opposite direction)
   var rgX = parseInt(redGhost.style.left);
   var rgY = parseInt(redGhost.style.top);
   
   var rgNewDirection;
   
   var rgOppositeDirection;
   if(rgDirection=='left') rgOppositeDirection = 'right';
   else if(rgDirection=='right') rgOppositeDirection = 'left';
   else if(rgDirection=='down') rgOppositeDirection = 'up';
   else if(rgDirection=='up') rgOppositeDirection = 'down';
   do{
       redGhost.style.left = rgX + 'px';
       redGhost.style.top = rgY + 'px';
   
       do{
           var r = Math.floor(Math.random()*4);
           if(r==0)rgNewDirection = 'right';
           else if(r==1) rgNewDirection = 'left';
           else if(r==2) rgNewDirection = 'down';
           else if(r==3) rgNewDirection = 'up';
           
       }while(rgNewDirection == rgOppositeDirection);
       
       if(rgNewDirection == 'right'){
           if(rgX>590) rgX = -30;
           redGhost.style.left = rgX + GHOST_SPEED + 'px';
       }
       else if(rgNewDirection == 'left'){
           if(rgX< -30) rgX = 590;
           redGhost.style.left = rgX - GHOST_SPEED + 'px';
       }
       else if(rgNewDirection == 'down'){
           if(rgX>390) rgX = -30;
           redGhost.style.top = rgY + GHOST_SPEED + 'px';
       }
       else if(rgNewDirection == 'up'){
           if(rgX<-30) rgX = 390;
           redGhost.style.top = rgY - GHOST_SPEED + 'px';
       }
   }while(hitWall(redGhost));
   
   rgDirection = rgNewDirection;
   
}

function tryToChangeDirection(){
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    if(leftArrowDown){
        pacman.style.left = parseInt(pacman.style.left) - PACMAN_SPEED + 'px';
        if(!hitWall(pacman)){
            direction = 'left';
            pacman.className = "flip-horizontal";
        }
    }
    if(upArrowDown){
        pacman.style.top = parseInt(pacman.style.top) - PACMAN_SPEED + 'px';
        if(!hitWall(pacman)){
            direction = 'up';
            pacman.className = "rotate270";
        }
    }
    if(rightArrowDown){
        pacman.style.left = parseInt(pacman.style.left) + PACMAN_SPEED + 'px';
        if(!hitWall(pacman)){
            direction = 'right';
            pacman.className = "";
        }
    }
    if(downArrowDown){
        pacman.style.top = parseInt(pacman.style.top) + PACMAN_SPEED + 'px';
        if(!hitWall(pacman)){
            direction = 'down';
            pacman.className = "rotate90";
        }
    }
    pacman.style.left=originalLeft;
    pacman.style.top = originalTop;
    
}

function loadComplete(){
	output = document.getElementById('output');
	pacman = document.getElementById('pacman');
	
	pacman.style.left = "280px";
	pacman.style.top = "240px";
	pacman.style.width = '40px';
	pacman.style.height = '40px';
	
	redGhost = document.getElementById('redGhost');
	redGhost.style.left = '280px';
	redGhost.style.top = '40px';
	redGhost.style.width = '40px';
	redGhost.style.height = '40px';
	
	loopTimer = setInterval(loop, 50);
	
	//inside walls (mouth base)
    createWall(80, 280, 440, 40);
    
    //top wall
    createWall(-20, 0, 640, 40);
    
    // left side walls
    createWall(0, 0, 40, 180);
    createWall(0, 220, 40, 180);
    
    //right side walls
    createWall(560, 0, 40, 180);
    createWall(560, 220, 40, 180);
    
    //bottom wall;
    createWall(-20, 360, 640, 40);
    
    // // left eyebrow
    createWall(80, 80, 160, 40);
    createWall(80,100,40,80);
    
    // // right eyebrow
     createWall(360,80,160,40);
    createWall(480,100, 40, 80);
    
    // //nose
     createWall(280,80,40, 160);
    // createWall(240, 260,320,160);
    // createWall(240,200,320,200);
    
    // //left eye
    createWall(160,160,80,80);
    
    // //right eye
     createWall(360,160,80,80);
    
    // //mouth base
    // createWall(80,280,480,280);
    
    // //mouth left curve
     createWall(80,220,40,100);
    
    // //mouth right curve
    createWall(480,220,40,100);
    
}


function hittest(a, b){
	var aX1 = parseInt(a.style.left);
	var aY1 = parseInt(a.style.top);
	var aX2 = aX1 + parseInt(a.style.width)-1;
	var aY2 = aY1;
	var aX3 = aX1;
	var aY3 = aY1 + parseInt(a.style.height)-1;
	var aX4 = aX2;
	var aY4 = aY3;

	var bX1 = parseInt(b.style.left);
	var bY1 = parseInt(b.style.top);
	var bX2 = bX1 + parseInt(b.style.width)-1;
	var bY2 = bY1;
	var bX3 = bX1;
	var bY3 = bY1 + parseInt(b.style.height)-1;
	var bX4 = bX2;
	var bY4 = bY3;

	var hOverlap = true;
	if(aX1<bX1 && aX2<bX1) hOverlap = false;
	if(aX1>bX2 && aX2>bX2) hOverlap = false;

	var vOverlap = true;
	if(aY1<bY1 && aY3<bY1) vOverlap = false;
	if(aY1>bY3 && aY3>bY3) vOverlap = false;

	if(hOverlap && vOverlap) return true;
	else return false;
}

function hitWall(element) {
    var hit = false;
    for(var i = 0; i < walls.length; i++){
        if(hittest(walls[i], pacman) ) hit = true;
    }
    return hit;

}

document.addEventListener('keydown', function(event){
    
      var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    //output.innerHTML = event.keyCode;
    if(event.keyCode == 37) {//left
        pacman.style.left = parseInt(pacman.style.left) - PACMAN_SPEED + 'px';
        if(!hitWall(pacman)) {
            direction = 'left';
             pacman.className = "flip-horizontal";
        }
    }
    if(event.keyCode == 38) {//up
        pacman.style.top = parseInt(pacman.style.top) - PACMAN_SPEED + 'px';
    if(!hitWall(pacman)) {
        direction = 'up';
        pacman.className = "rotate270";
    }
    }
    if(event.keyCode == 39){//right 
        pacman.style.left = parseInt(pacman.style.left) + PACMAN_SPEED + 'px';
    if(!hitWall(pacman)) {
        direction = 'right';
        pacman.className = "";
    }
    }
    if(event.keyCode == 40) {//down
        pacman.style.top = parseInt(pacman.style.top) + PACMAN_SPEED + 'px';
    if(!hitWall(pacman)) {
        direction = 'down';
        pacman.className = "rotate90";
    }
    }
    
     pacman.style.left = originalLeft;
        pacman.style.top = originalTop;
});



document.addEventListener('keyup', function(event){
    if(event.keyCode == 37) leftArrowDown = false;
    if(event.keyCode == 38) upArrowDown = false;
    if(event.keyCode == 39) rightArrowDown = false;
    if(event.keyCode == 40) downArrowDown = false;
});
