<!DOCTYPE html>
<html>
<head>
<style>
	div {
		margin-top: 20px;
		margin-bottom: 20px;
	}

</style>

<script>
function validateForm() {
    // you can write a code for validating your forms (if you want).
  //  var firstname = document.forms["first_name"].value;
		//var lastname =document.forms["last_name"].value;
	//	var email = document.forms["email"].value;
		//var address = document.forms["address"].value;
		//var city = document.forms["city"].value;
}
</script>

</head>
<body>

	<?php

	// forms need to be generated here inside the PHP tag.

	// input for sql connnection
	$server = "127.0.0.1";
	$username = "root";
	$password = "root";
	$db = "sakila";

	// Create connection
	$conn = mysqli_connect($server, $username,$password,$db);

	// create query
	$sql ="SELECT first_name,last_name,email,address,city FROM (customer JOIN address  ON customer.address_id = address.address_id ) JOIN city ON address.city_id = city.city_id  ORDER BY last_name LIMIT 9,1";
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}


	//send query to mysqli
	$result = mysqli_query($conn,$sql);
	if (!$result) {
    echo 'Could not run query: ' . mysqli_error();
    exit;
	}

	// grab results
	$row = mysqli_fetch_assoc($result);




	// create form
	echo "<strong>DYNAMIC FORMS</strong> <br>";
  echo "<form action='form_display.php' method='POST'>";
	// loop through row and place in text box
  foreach ($row as $key => $value){
		echo $key . "<input type='text' name= ". $key ." value=" . $value . ">".  "<br>";

	}
 // create submit buton
	echo "<input type='submit' value = submit >";
	echo "</form>";



?>

</body>
</html>
