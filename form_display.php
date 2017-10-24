<!DOCTYPE html>
<html>
<head>
<style>
	div {
		margin-top: 20px;
		margin-bottom: 20px;
	}
	 tr:hover {cursor: pointer;}
	 table {border: 1px solid black ; border-radius:1px solid black ; background-color:white; }
	 th {font-style: bold;font-size: 12;color: blue;background-color:orange;}
	 td {font-style: bold;font-size: 12;color: blue;background-color:pink;}
</style>
<?php



$col = $_POST;
$table = "<table id = dynamic >";
$table_e ="</table>";
// create table
echo $table;
foreach($col as $key=>$value)
{
	$check = check($key);
  echo "<tr><th>" . $key . "</th>     ". " <td>" . $value . "</td>" ."<td >" ." $check  " . "</td></tr>";
}

echo $table_e;




// check if its in database
function check($key){
	//create connection to database for mysql
	$con = mysqli_connect("127.0.0.1","root","root","sakila");
	// Check connection
	if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// checks for value in sql database

		if(isset($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['address'],$_POST['city'])){
			// create variables to hold values for query check
			$name = $_POST['first_name'];
			$name1 = $_POST['last_name'];
			$name2 =$_POST['email'];
			$name3 =  $_POST['address'];
			$name4= $_POST['city'];

			// query to check database for each form
			$checkdata = "SELECT first_name FROM (customer JOIN address ON customer.address_id = address.address_id ) JOIN city ON address.city_id = city.city_id WHERE first_name='$name' ";
			$checkdata1 = "SELECT last_name FROM (customer JOIN address ON customer.address_id = address.address_id ) JOIN city ON address.city_id = city.city_id WHERE last_name='$name1' ";
			$checkdata2 = "SELECT email FROM (customer JOIN address ON customer.address_id = address.address_id ) JOIN city ON address.city_id = city.city_id WHERE email='$name2' ";
			$checkdata3 = "SELECT address FROM (customer JOIN address ON customer.address_id = address.address_id ) JOIN city ON address.city_id = city.city_id WHERE address='$name3' ";
			$checkdata4 = "SELECT city FROM (customer JOIN address ON customer.address_id = address.address_id ) JOIN city ON address.city_id = city.city_id WHERE city ='$name4' ";
			// conditional to decide which query to execute
			if($key == "first_name"){
				$query = mysqli_query($con,$checkdata);
			}elseif ($key == "last_name") {
					$query = mysqli_query($con,$checkdata1);
				}elseif ($key == "email") {
					$query = mysqli_query($con,$checkdata2);
				}elseif ($key == "address") {
					$query = mysqli_query($con,$checkdata3);
				}elseif ($key == "city") {
					$query = mysqli_query($con,$checkdata4);
				}else{
					echo "ERROR";
				}





			//check if it exists or is new
 			if(mysqli_num_rows($query)>0)
 			{
  			return "Exist";
 			}
 			else
 			{
				return "New";
 			}

		}
}











?>
</body>
</html>
