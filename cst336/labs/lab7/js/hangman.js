  
   $("#letterBtn").click( function(){ 
               // updateImage();
               
               var boxVal = $("#letterBox").val();
               alert(boxVal);
               
            } );
            
    
            function updateImage() {
                
                //document.getElementById("man").innerHTML = "<img src='img/stick_5.png' >";
                $("img").attr("src","img/stick_3.png");
            }
    
            
            var selectedWord = "";
            var selectedHint = "";
            var board = "";
            var remainingGuesses = 6;
            var words = ["snake", "monkey", "beetle", "octopus", "horse"];
            var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                            'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                            'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X',
                            'Y', 'Z'];

            
            window.onload = startGame();
            
            function startGame() {
                
                pickWord();
                initBoard();
                updateBoard();
                createLetters();
                
            }
            
            function pickWord() {
                var randomInt = Math.floor( Math.random() * words.length );
                selectedWord = words[randomInt];
                //console.log(selectedWord);
            }
            
            function updateBoard() {
                $("word").empty();
                
                for (var letter of board) {
                    document.getElementById("word").innerHTML += letter + " ";
                }
            }
            
            function initBoard() {
                
                for (var letter in selectedWord) {
                    
                    board += "_";
                    
                }
                
                console.log(board);
                
            }
            
            initBoard();
            for(var letter of board) {
                document.getElementById("word").innerHTML += letter + " ";
            }
            
            function createLetters(){
                
                for (var letter of alphabet) {
                    
                    $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
                }
                
            }
            
            //events
            
            $("button").click( function(){ alert( $(this).attr("id")); });
            $(".letter").click(function(){
                console.log($(this).attr("id"));
            });
            
            function checkLetter(letter) {
                var positions = new Array();
                //Put all the positions the letter exists in an array
                for(var i = 0; i <selectedWord.length; i++)
                {
                    console.log(selectedWord)
                    if(letter == selectedWord){
                        positions.push(i);
                    }
                   
                }
                
                if(positions.length > 0) {
                    updateWord(positions, letter);
                    
                    //Check to see if this is a winning guess
                    if(!board.includes('_')) {
                        endGame(true);
                        
                    }
                } else{
                        remainingGuesses -= 1;
                        updateMan();
                    }
                    if(remainingGuesses <= 0){
                        endGame(false);
                    }
            }
            
            function updateWord(positions, letter) {
                for(var pos of positions) {
                    board = replaceAt(board, pos, letter)
                }
                
                updateBoard();
            }
            
            function replaceAt(str, index, value) {
                return str.substr(0, index) + value + str.substr(index + value.length);
            }
            
            function updateMan(){
                $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
            }
            
            function endGame(win){
                $("#letters").hide();
                if(win){
                    $('#won').show();
                } else {
                    $('#lost').show();
                }
            }
            
            $(".replayBtn").in("click", function() {
               location.reload(); 
            });
            
            var words =[{ word: "snake", hint: "It's a reptile" },
                        { word: "monkey", hint: "It's a mammal" },
                        { word: "beetle", hint: "It's an insect" }];
                        
            function pickWord() {
                 var randomInt = Math.floor(Math.random() * words.length);
                 selectedWord = words[randomInt].word.toUpperCase();
                 selectedHint = words[randomInt].hint;
            }
            
            function disableButton(btn)
            {
                btn.prop("disabled", true);
                btn.attr("class", "btn btn-danger");
            }
            
            $(".letter").click(function(){
                checkLetter($(this).attr("id"));
                disableButton($(this));
            });

