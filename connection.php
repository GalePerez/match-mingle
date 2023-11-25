<?php  
session_start();
	$conn = new mysqli("localhost","root","","matchmingle");
		if($conn === false )
{
	die("Error! Couldn't connect. ". $conn->connect_error );
}
?>



