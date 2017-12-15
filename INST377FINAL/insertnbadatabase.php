<?php

session_start();
$user = 'root';
$password = 'root';
$db = 'nba';
$host = 'localhost';
$port = 8889;
// Create connection
$conn = mysqli_connect("$host:$port",$user,$password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!mysqli_select_db($conn, "nba")) {
    echo "db not selected";

} else { echo "     ";

 }
$name1 = $_SESSION['p1f']. "  " . $_SESSION['p1l'];
$name2 = $_SESSION['p2f']. "  " . $_SESSION['p2l'];

// A function for general queries.
function query_to_db($conn, $sql){
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Database Has Been Updated<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}



// saves searches into database.
$sql = "INSERT INTO player_stats(playername,PIE,ast,stl,trb) VALUES ('$name1','$_SESSION[pie1]','$_SESSION[ast1]','$_SESSION[st1]','$_SESSION[deff1]');";
$sql2 = "INSERT INTO player_stats(playername,PIE,ast,stl,trb) VALUES ('$name2','$_SESSION[pie2]','$_SESSION[ast2]','$_SESSION[st2]','$_SESSION[deff2]');";

query_to_db($conn, $sql);
query_to_db($conn, $sql2);


mysqli_close($conn);
