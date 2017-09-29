<?php
// for($i = 1500; $i <= 2000; $i++)
// {
// echo "$i";
// if($i == 1776)
// {
//     echo " USA Independence!!";
// }
// if($i % 100 == 0)
// {
//     echo " Happy new century!!";
// }
// echo "<br/>";
// }
function years($start, $end){
    $yearSum = 0;
    for($i = $start; $i <= $end; $i++)
    {$yearSum += $i;
        echo "$i";
        if($i == 1776)
        {
            echo "<strong> USA Independence!!</strong>";
        }
        if($i %100 == 0)
        {
            echo "<strong> Happy new Century!!</strong>";
        }
       $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
       for($j = $i; $j < $endYear; $j++)
       {
    //   if($i % 4 == 0)
       {
        echo "<br/> <img src='" .$zodiac[$i % $j]. ".png'/>";
       }
       }
        echo "<br/>";
    }
    return $yearSum;
}
$startYear = 1900;
$endYear = 2000;
$yearSum = years($GET_['startYear'],$GET_['endYear']);
echo years($startYear, $endYear);

?>