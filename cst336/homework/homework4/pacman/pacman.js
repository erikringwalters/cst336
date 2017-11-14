var output;
var pacman;
var loopTimer;
var numLoops = 0;

var upArrowDown = false;
var downArrowDown = false;
var leftArrowDown = false;
var rightArrowDown = false;

function loadComplete(){
	output = document.getElementById('output');
	pacman = document.getElementById('pacman');
	
	pacman.style.left = "280px";
	pacman.style.top = "260px";
	
	loopTimer = setInterval(loop, 50);
}

function loop(){
    numLoops++;
    if(upArrowDown){
        var pacmanY = parseInt(pacman.style.top) - 5;
        pacman.style.top = pacmanY + 'px';
    }
     if(downArrowDown){
        var pacmanY = parseInt(pacman.style.top) + 5;
        pacman.style.top = pacmanY + 'px';
    }
     if(leftArrowDown){
        var pacmanY = parseInt(pacman.style.left) - 5;
        pacman.style.top = pacmanY + 'px';
    }
     if(upArrowDown){
        var pacmanY = parseInt(pacman.style.left) + 5;
        pacman.style.top = pacmanY + 'px';
    }
    
}

document.addEventListener('keydown', function(event){
    output.innerHTML = event.keyCode;
    if(event.keycode == 37) leftArrowDown = true;
    if(event.keyCode == 38) upArrowDown = true;
    if(event.keycode == 39) rightArrowDown = true;
    if(event.keycode == 40) downArrowDown = true;
});

document.addEventListener('keyup', function(event){
    if(event.keycode == 37) leftArrowDown = true;
    if(event.keyCode == 38) upArrowDown = true;
    if(event.keycode == 39) rightArrowDown = true;
    if(event.keycode == 40) downArrowDown = true;
});

