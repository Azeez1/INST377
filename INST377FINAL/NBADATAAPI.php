<!DOCTYPE html>
<?php
// GRABS data from nba table and looks up stats to send back it utilizes the suredbits nba api
session_start();



$p1f = $_SESSION['p1f']; // grab first and last name of player and store in local varables
$p1l =  $_SESSION['p1l'];
$p2f =  $_SESSION['p2f'];
$p2l =  $_SESSION['p2l'];

// create links in order to look up stats
$link = "http://api.suredbits.com/nba/v0/stats/" . "$p1l". "/" . "$p1f". "/2016";
$link2= "http://api.suredbits.com/nba/v0/stats/" . "$p2l". "/" . "$p2f". "/2016";


// parse the links
$data = json_decode(file_get_contents($link),true);
$data2 = json_decode(file_get_contents($link2),true);


// loop through first player stats
foreach($data as $v){
  foreach ($v as $index=>$value){
    echo $index . ' : ' . $value . '<br/>';
    $_SESSION[$index] = $value;
    $indexnum = $index."1";
    //echo $indexnum;
    $_SESSION[$indexnum] = $value;
  }
}
// loop through second player stats
foreach($data2 as $v){
  foreach ($v as $index=>$value){
    echo $index . ' : ' . $value . '<br/>';
    $_SESSION[$index] = $value;
    $indexnum = $index."2";
    //echo $indexnum;
    $_SESSION[$indexnum] = $value;
    }
  }

  // create an array to compare both player stats


echo $counter1;
echo $counter2;
echo $_SESSION['BEST'];
//echo $_SESSION['st1'];
//echo $_SESSION['st2'];
?>
