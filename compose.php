<?php

//the admin email
$from="jenninjenga@gmail.com";

//storing the forms values
$subject=$_POST['subject'];
$body=$_POST['body'];

//feedback 
echo "From: " . $from . "<br/>";
echo "Subject: " . $subject . "<hr/>";

// open the db connection
include("connect.php");

//compose the TSQL
$query = "SELECT first_name, last_name, email From mailinglist";

//run the query and store the result
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

while($row = mysqli_fetch_array($result)) {
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$to = $row['email'];
	
	$msg = "Dear " . $first_name . " " . $last_name . ",<br/>" . $body;
	mail($to, $subject, $msg, 'From:' . $from);
	
	//more feedback
	echo "Mail sent to: " . $to . "<br/>";
	echo $msg . "<hr/>";
}
//simple confirmation
if(count($result)>0){
	echo "<br/>You have successfully emailed your message";
}else{
	echo "<br/>Sorry, an error has occurred.";
}

//close the connection
mysqli_close($dbc);

?>