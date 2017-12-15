<!DOCTYPE html>
<html>
<head>
<style>
	table {
	    font-family: arial, sans-serif;

	    border-collapse: collapse;
	    width: 100%;
			background-color:linear-gradient(to right, red , yellow);
	}

	tr, th,td {
	    border: 1px solid #dddddd;
	    text-align: left;
	    padding: 8px;
			text-decoration-color:

	}
	body {
	    background-image: url("nbalogo2.jpg");
	}

	tr:hover {background-color:yellow;}


	</style>
</head>

<body>
<?php
session_start();
// grab variables from NBADISPLAY form
// get
$p1= $_POST["player1"];
$p2 = $_POST["player2"];
list($p1_fname, $p1_lname) =split(" ", $p1); // split names by first and last name
list($p2_fname, $p2_lname) =split(" ", $p2);

$_SESSION['p1f'] = $p1_fname;
$_SESSION['p1l'] = $p1_lname;
$_SESSION['p2f'] = $p2_fname;
$_SESSION['p2l'] = $p2_lname;









$playersrc1 = "https://nba-players.herokuapp.com/players/" . "$p1_lname". "/" . "$p1_fname";
$playersrc2 = "https://nba-players.herokuapp.com/players/" . "$p2_lname". "/" . "$p2_fname";
	//echo $_SESSION['fta'];

//calculate pie score

$_SESSION['pie1']= $_SESSION['pts1']+$_SESSION['fgm1'] + $_SESSION['ftm1'] - $_SESSION['fga1'] - $_SESSION['fta1']+ $_SESSION['deff1'] + (.5 * $_SESSION['off1'])+$_SESSION['ast1']+$_SESSION['stl1']+ .5*$_SESSION['bs1']-$_SESSION['pf1']-$_SESSION['tot1']/$_SESSION['plusminus1'];
$_SESSION['pie2']= $_SESSION['pts2']+$_SESSION['fgm2'] + $_SESSION['ftm2'] - $_SESSION['fga2'] - $_SESSION['fta2']+ $_SESSION['deff2'] + (.5 * $_SESSION['off2'])+$_SESSION['ast2']+$_SESSION['stl2']+ .5*$_SESSION['bs2']-$_SESSION['pf2']-$_SESSION['tot2']/$_SESSION['plusminus2'];
	//echo $_SESSION['pien'];

//echo $pie_score1;
//echo $pie_score2;

// compare variables
$player1_stats = [$_SESSION['ast1'],$_SESSION['st1'],$_SESSION['deff1'],$_SESSION['pie1']];
$player2_stats = [$_SESSION['ast2'],$_SESSION['st2'],$_SESSION['deff2'],$_SESSION['pie2']];
$counter1 = 0;
$counter2 = 0;

// counter
for ($x = 0; $x <= 3; $x++) {
	if ($player1_stats[$x] > $player2_stats[$x] ){
			$counter1+=1;
		 }else {
		          $counter2+=1;
		      }
}

//
if ($counter1 > $counter2){
	$best_op =$p1;
	$counter1 = 0;
	$counter2 = 0;
}elseif($counter1 < $counter2) {
	$best_op =$p2;
	$counter1 = 0;
	$counter2 = 0;
}
else{
	$best_op = "BOTH ARE GOOD";$counter1 = 0;
	$counter2 = 0;
}

echo "<table>
			<tr><td><img src = '$playersrc1' ></td><td><img src = '$playersrc2' ></td></tr>
		  <tr><th>Player1</th><th>Player2</th></tr>
		  <tr><td>Assists:".$_SESSION['ast1'] ." </td><td>Assists:".$_SESSION['ast2']."</td></tr>
			<tr><td>Steals:".$_SESSION['st1'] ." </td><td>Steals:".$_SESSION['st2']."</td></tr>
			<tr><td>Rebounds:".$_SESSION['deff1'] ." </td><td>Rebounds:".$_SESSION['deff2']."</td></tr>
			<tr><td>PIE:".$_SESSION['pie1'] ." </td><td>PIE:".$_SESSION['pie2']."</td></tr>
			<tr><td>We Reccommend you choose:  ". $best_op."</td></tr>
		 </table>";

// chooses
echo "<a href=insertnbadatabase.php><button type=button>Submit To Database</button></a>";







?>

</body>
</html>
