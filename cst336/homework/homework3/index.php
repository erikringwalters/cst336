<?php
// $answers = array (
// array("bowtie",0),
// array("linguini",0),
// array("spaghetti",0),
// array("pene",0),
// array("spiral",0),
//  )
?>
<head>
    <title>Pasta Quiz!</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/x-icon" href="img/bowtieIcon.png"/>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
    crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

</head>
<body>
    <div class="col-md-2"></div>
    <div id="content" class="col-md-8">
        <div id="pad">
    <h1> Pasta Quiz! </h1>
    <hr/>
    <h2>Take the quiz to find out which pasta noodle you are!</h2>
    
    
     <form target="_blank" action="result.php" method="post" id="quiz">
      
    Please enter your name: <input class="textInput" type="text" name="uname"></input>
   
    <h3>
        Q1: A stranger drops their bag and all their papers fall out. what is 
        your reaction?
    </h3>
    
         <div class="radio">
         <input class="bowtie" type= "radio"  name="q1" value = "bowtie"><label for="bowtie">Help them pick it up.</label></input><br/>
         <input class="linguini" type= "radio"  name="q1" value = "linguini"><label for="linguini">Use this time to get their number and ask them out on a date.</label></input><br/>
         <input class="spaghetti" type= "radio"  name="q1" value = "spaghetti"><label for="spaghetti">Keep walking and as soon as you get home, sob to your best friend 
        about how you had the opportunity to make the world a little bit of a 
        better place, but you how failed that poor stranger.</label></input><br/>
         <input class="pene" type= "radio"  name="q1" value = "pene"><label for="pene">Call 911.</label></input><br/>
         <input class="spiral" type= "radio"  name="q1" value = "spiral"><label for="spiral">Laugh with them, but not at them, then buy them coffee for their 
        hardships.</label></input><br/>
         </div>
    
    <h3>
        Q2: A friend invites you to go skydiving. You do you respond?
    </h3>
    
    
        <div class="radio">
         <input class="bowtie" type= "radio"  name="q2" value = "bowtie"><label for="bowtie">Excitedly accept the offer.</label></input><br/>
         <input class="linguini" type= "radio"  name="q2" value = "linguini"><label for="linguini">Reply with statistics on sharks and how many people die each
        year due to shark diving accidents.</label></input><br/>
         <input class="spaghetti" type= "radio"  name="q2" value = "spaghetti"><label for="spaghetti">Make up an event as an excuse.</label></input><br/>
         <input class="pene" type= "radio"  name="q2" value = "pene"><label for="pene">Sprint the other direction.</label></input><br/>
         <input class="spiral" type= "radio"  name="q2" value = "spiral"><label for="spiral">Ask if you can bring your homemade parachute and whether your 
        mom can tag along.</label></input><br/>
         </div>

    
    <h3>
        Q3: Someone walks by you and calls you a dweeb. How do you react?
    </h3>
    
        <div class="radio">

         <input class="bowtie" type= "radio"  name="q3" value = "bowtie"><label for="bowtie">Tell them to have a good day and express your hope that their 
        insecurities are resolved.</label></input><br/>
         <input class="linguini" type= "radio"  name="q3" value = "linguini"><label for="linguini">Lecture them social equality and recommend them a resource on
        progressive communication.</label></input><br/>
         <input class="spaghetti" type= "radio"  name="q3" value = "spaghetti"><label for="spaghetti">Respond by letting them know the color of your belt in the
        martial art you've been practicing.</label></input><br/>
         <input class="pene" type= "radio"  name="q3" value = "pene"><label for="pene">Cry.</label></input><br/>
         <input class="spiral" type= "radio"  name="q3" value = "spiral"><label for="spiral">Repress until you get home to your dog then project your emotions
        by calling him/her a dweeb.</label></input><br/>
         </div>
        
    
     <h3>
        Q4: You find a wallet ont a restaurant floor. How do you handle it?
    </h3>
    
        <div class="radio">
         <input class="bowtie" type= "radio"  name="q4" value = "bowtie"><label for="bowtie">Bring it to the manager and make sure it's in good hands before you 
        leave.</label></input><br/>
         <input class="linguini" type= "radio"  name="q4" value = "linguini"><label for="linguini">Find the person using their identification and scold them for their 
        lack of responsibility.</label></input><br/>
         <input class="spaghetti" type= "radio"  name="q4" value = "spaghetti"><label for="spaghetti">Use the cash inside to buy your friends a round of drinks.</label></input><br/>
         <input class="pene" type= "radio"  name="q4" value = "pene"><label for="pene">Pocket the wallet and quietly walk out</label>.</input><br/>
         <input class="spiral" type= "radio"  name="q4" value = "spiral"><label for="spiral">Inform the nearest person that you are thinking of a number between 
        1 and 100 (inclusive). If they're able to guess your middle name, let 
        them keep the found wallet.</label></input><br/>
         </div>
        
    
     <h3>
        Q5: A friend offers you Xxtra Flamin' Hot Cheetos. What do you do?
    </h3>
    
        <div class="radio">
         <input class="bowtie" type= "radio"  name="q5" value = "bowtie"><label for="bowtie">Politely accept a few and enjoy the flavor.</label></input><br/>
         <input class="linguini" type= "radio"  name="q5" value = "linguini"><label for="linguini">Rudely inform him of how bad they are for them and how immoral the 
        manufacturing is.</label></input><br/>
         <input class="spaghetti" type= "radio"  name="q5" value = "spaghetti"><label for="spaghetti">Take far more than cheetos than they were offering.</label></input><br/>
         <input class="pene" type= "radio"  name="q5" value = "pene"><label for="pene">Complain about how you don't like spicy food and scrunch your face 
        at the thought.</label></input><br/>
         <input class="spiral" type= "radio"  name="q5" value = "spiral"><label for="spiral">Swat the bag out of their hand and claim that it is for their health, 
        even though you know that you are asserting a subconscious dominance 
        over them.</label></input><br/>
         </div>
        
    
    
    <h3>Q6: You have to pick your child up from daycare, but are in the middle of 
    an important project at work. What do you do?</h3>
    
        <div class="radio">

         <input class="bowtie" type= "radio"  name="q6" value = "bowtie"><label for="bowtie">Inform your boss and make the decision based on their understanding.</label></input><br/>
         <input class="linguini" type= "radio"  name="q6" value = "linguini"><label for="linguini">Make sure you are on time to pick up your child.</label></input><br/>
         <input class="spaghetti" type= "radio"  name="q6" value = "spaghetti"><label for="spaghetti">Assume your child will be fine for a couple more hours.</label></input><br/>
         <input class="pene" type= "radio"  name="q6" value = "pene"><label for="pene">Tell your child to walk home. They can handle it.</label></input><br/>
         <input class="spiral" type= "radio"  name="q6" value = "spiral"><label for="spiral">Ask a stranger to pick up your kid. Before the stranger gets there, call 
    your child and give him self-defense tips.</label></input><br/>
         </div>
    
    
    
     <h3>Q7: An alien asks you to take him to your leader. How do you react?</h3>
    
        <div class="radio">

         <input class="bowtie" type= "radio"  name="q7" value = "bowtie"><label for="bowtie">Give him accurate directions to your boss and ask if there's any 
    other way you can help.</label></input><br/>
         <input class="linguini" type= "radio"  name="q7" value = "linguini"><label for="linguini">Inform the alien that you are strong independent person with a free
    spirit and do not need a leader.</label></input><br/>
         <input class="spaghetti" type= "radio"  name="q7" value = "spaghetti"><label for="spaghetti">Pretend to lead the alien somewhere he wants, but secretly organize a 
    trap to bring him under law enforcement.</label></input><br/>
         <input class="pene" type= "radio"  name="q7" value = "pene"><label for="pene">Play dead.</label></input><br/>
         <input class="spiral" type= "radio"  name="q7" value = "spiral"><label for="spiral">Attempt to convince the alien to have dinner at your house, then build 
    LEGO structures with the alien, later that night.</label></input><br/>
         </div>
    
    
     <h3>Q8: Your friend trips on a skateboard. How do you handle it?</h3>
    
        <div class="radio">

         <input class="bowtie" type= "radio"  name="q8" value = "bowtie"><label for="bowtie">You whip out your Neosporin and kiss any boo-boos better, then write a 
    thoughtful sentiment in a Get-Well-Soon card.</label></input><br/>
         <input class="linguini" type= "radio"  name="q8" value = "linguini"><label for="linguini">Use this as a lesson on the dangers of skating.</label></input><br/>
         <input class="spaghetti" type= "radio"  name="q8" value = "spaghetti"><label for="spaghetti">Laugh.</label></input><br/>
         <input class="pene" type= "radio"  name="q8" value = "pene"><label for="pene">Wear a helmet from now on, even though you don't skate.</label></input><br/>
         <input class="spiral" type= "radio"  name="q8" value = "spiral"><label for="spiral">Fall in the same way so your friend doesn't feel alone, then whip open 
    a bag of chips on the ground to share with your friend.</label></input><br/>
         </div>
    
    
    <h3>Q9: You failed an exam that you studied hours for.</h3>
    
        <div class="radio">

         <input class="bowtie" type= "radio"  name="q9" value = "bowtie"><label for="bowtie">Accept your defeat, make a note to study better next time, and make 
        sure you learn what you previously did not.</label></input><br/>
         <input class="linguini" type= "radio"  name="q9" value = "linguini"><label for="linguini">Build a case on why you deserve those points then present it to the 
        teacher.</label></input><br/>
         <input class="spaghetti" type= "radio"  name="q9" value = "spaghetti"><label for="spaghetti">Call your teacher a mean name to your friend, then play video games 
        to get your mind off it.</label></input><br/>
         <input class="pene" type= "radio"  name="q9" value = "pene"><label for="pene">Call your parents and apologize to them.</label></input><br/>
         <input class="spiral" type= "radio"  name="q9" value = "spiral"><label for="spiral">You bribe the teacher for a better grade with a daily payment of their M&M's flavor of choice.</label></input><br/>
         </div>
        
    

    <h3>Q10: How many punches can you take to the throat?</h3>
    <!--Number thing goes here. -->
    <input id="punches" class="textInput" type="number" name="q10"></input>
    <br/><br/><br/>
    <center>

    <input id="submit" type="submit" class="btn btn-default" name="Submit">
    </form>
    </center>
    </div>
    </div>
    <div class="col-md-2"></div>
</body>