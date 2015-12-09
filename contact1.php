<?php
//initialize the variables with form data
$name = $_POST['name'];
$email = $_POST['email'];


//open a connection with the database
include("contact.php");

//write your TSQL and save it in a variables
$query = "INSERT INTO test2 (id, name, email) ".
		 "VALUES(NULL, '$name', '$email')";
		 
//Query the Database
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

//Test and confirm the data is working
if($result==1){
	//print the received information from the user_error
	header('Location:http://localhost/ShopAroundProject/');
	echo "<p>You will now receive newsletter and updates:</p>";
	echo $name . "<br/>";
	echo "<br/>You have successfully sign up for our newsletter and updates ";
}else{ 
	echo "<br/> Sorry, an error has occurred.";
}
	
	//close the connection
mysqli_close($dbc);

?>