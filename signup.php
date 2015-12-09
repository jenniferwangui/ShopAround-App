<?php
//initialize the variables with form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

//open a connection with the database
include("connect.php");

//write your TSQL and save it in a variables
$query = "INSERT INTO mailinglist (id, first_name, last_name, email) ".
		 "VALUES(NULL, '$first_name', '$last_name', '$email')";
		 
//Query the Database
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

//Test and confirm the data is working
if($result==1){
	//print the received information from the user_error
	header('Location:http://localhost/ShopAroundProject/');
	echo "<p>You will now receive newsletter and updates:</p>";
	echo $first_name . "<br/>";
	echo "<br/>You have successfully sign up for our newsletter and updates ";
}else{ 
	echo "<br/> Sorry, an error has occurred.";
}
	
	//close the connection
mysqli_close($dbc);

?>