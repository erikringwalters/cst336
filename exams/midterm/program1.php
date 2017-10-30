<?php
$months = array("November", "Decemember", "January", "February");
function monthDropdown()
{
    foreach($months as $month)
    {
        echo "<option value='$month'>$month</option>";
    }
}
$sountries = array("Mexico", "Norway", "USA");
function countryDropdown()
{
    foreach($countries as $country)
    {
        echo "<option value='$country'>$country</option>";
    }
}
$numOfLocations = 0;



functionDisplay
?>

<!Doctype html>

<head>
    <title>Midterm 1 program 1</title>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style>
    body{
        background-color: skyblue;
       text-align: center;
    }
        h1{
            font-size: 32px;
        }
         
    .radio{
        background-color: white;
        font-size: large;
        border-radius: 20px;
           display: inline-block;
        
    }
         .radio label{
        /*margin: 10px;*/
        /*padding: 10px;*/
        /*border: 10px;*/
            padding-right: 10px;
    }
    .but {
        position: inherit ;
        margin-left: 20px !important;
    }
    </style>
</head>
<body>
    <form>
    <h1>Winter Vacation Planner</h1>
      
      <select name="month">
          <option value="November">November</option>
          <option value="Decemember">Decemember</option>
          <option value="January">January</option>
          <option value="February">February</option>
      </select>
      
      <br>
      <div>
        <select name="country">
            <option value="mexico">Mexico</option> 
            <option value="usa">USA</option> 
            <option value="norway">Norway</option> 
                
      </div>
            <br>

      <h3>Select Number of Locations: </h3>
       <div class="radio">
                <!--<span id="horizontal">-->
                <input class="but" type= "radio" id= "three" name="locations" value = "3">
                <label for="three"></label><label for="three"> Three </label>
                
                 <input class="but" type= "radio" id= "four" name="locations" value = "4">
                <label for="four"></label><label for="four"> Four </label>
                
                 <input class="but" type= "radio" id= "five" name="locations" value = "5">
                <label for="five"></label><label for="five"> Five </label>
              
        </div>
           <div class="radio">
                <!--<span id="horizontal">-->
                <input class="but" type= "radio" id= "az" name="order" value = "az">
                <label for="az"></label><label for="az"> A-Z </label>
                
                 <input class="but" type= "radio" id= "za" name="order" value = "za">
                <label for="za"></label><label for="za"> Z-A </label>
             </div>   
                
                
                 <input id="submit" type="submit" nae="submit" value="submit" />

        </form>
      <hr/>
      <!--info after submit-->
      <?php
      
{
    $numberOfLocations = $_GET['locations'];
    $monthChosen = $_GET['month'];
    $countryChosen = $_GET['country'];
    $order = $_GET['order'];

echo "<p>Number of locations: $numberOfLocations</p>";
echo "<p>Month: $monthChosen</p>";
echo "<p>Country: $countryChosen</p>";

      ?>
      
      <table border='1' style='margin:0 auto' cellpadding=7>
          <?php
          
          $mexicoImgs = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
          $usaImgs = array("chicago", "hollywood", "las_vegas", "ny", "washington", "yosemite");
          $norway = array("alesund", "bergen", "hammerfest", "oslo", "stavanger", "trondheim");
          $daysSelected = array(0,0,0,0,0);
          
          if($_GET['order'] == 'az')
          {
              $days = 0;
          }
          else {
              $days = $numberOfLocations;
          }
          for($d = 0; $d < $numberOfLocations; $d++)
          {
              $daysSelected[rand(1,$numberOfLocations)];
          }
          $daysInMonth = 31;
          if($monthChosen == "February")
          {
              $daysInMonth = $daysInMonth - 3;
          }
           if($monthChosen == "November")
          {
              $daysInMonth = $daysInMonth - 1;
          }
          for($l = 0; $l < sizeOf($daysSelected); $l++)
          {
              $daySelected[$l] = rand(1,28);
          }
        
          $inc = 0;
          for($i = 0; $i < 7; $i++)
          {
              for($j = 0; $j < 5; $j++)
              {
                  $inc++;
              echo "<td>";
              
              if($inc<=$daysInMonth)
              {
                  echo "" . $mexicoImgs[$daysSelected[$daysInc]] . "";
                  if($_GET['order'] == 'az')
                  {
                    $days++;//code for ascending order
                  }
                  else{
                      $days--;//code for descending order
                  }
                  
              }
              
              echo "<br/>";
              
              
            //echo"selected day";
                  
              echo "<br/>";
              echo "<img src='img/".$mexicoImgs[$daysInc].".png'/>";
              echo "$mexicoImgs[$daysInc]";
              echo "</td>";
              
              }
              echo "<tr/>";
          }
}
          ?>
          
          
      </table>
    
    
      <hr/>
      <br/><br/><br/><br/><br/><br/><br/>
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:green">
      <td>1</td>
      <td>The page includes the form elements as the Program Sample: dropdown menu, radio buttons, etc.</td>
      <td width="20" align="center">3</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>2</td>
      <td>Errors are displayed if country or number of locations are not submitted.</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:green">
      <td>3</td>
      <td>Header and Subheader are displayed when submitting the form with all data. </td>
      <td align="center">5</td>
    </tr>    
	<tr style="background-color:green">
      <td>4</td>
      <td>A table with days and weeks is displayed when submitting the form</td>
      <td align="center">5</td>
    </tr> 
    <tr style="background-color:green">
      <td>5</td>
      <td>The number of days in the table correspond to the month selected</td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:white">
      <td>6</td>
      <td>Random images are displayed in random days</td>
      <td align="center">5</td>
    </tr>       
    <tr style="background-color:white">
      <td>7</td>
      <td>The number of random images correspond to the number of locations and country submitted</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color: white">
      <td>8</td>
      <td>The proper name of the location is displayed below the image 
      		(e.g. "New York", "Las Vegas")</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color: white">
      <td>9</td>
      <td>The list of months submitted along with the country and number of locations is displayed below the table (using Sessions)</td>
      <td align="center">15</td>
    </tr>    
    <tr style="background-color:white">
      <td>10</td>
      <td>Random locations should be ordered alphabetically, if user checks corresponding radio button (A-Z or Z-A). </td>
      <td align="center">15</td>
    </tr>        
    <tr style="background-color: green">
      <td>11</td>
      <td>The web page uses Bootstrap and has a nice look. </td>
      <td align="center">5</td>
    </tr>        
    <tr style="background-color:#99E999">
      <td>12</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>

    
</body>
