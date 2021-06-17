<?php
	$link=mysqli_connect("localhost","root","","sb");
	if($link===false)
	{
		die("ERROR could not able to connect	.".mysqli_connect_error());
	}
	$sql="CREATE TABLE regd(
		fname VARCHAR(20) NOT NULL,
		mname VARCHAR(20),
		lname VARCHAR(20) NOT NULL,
		phno BIGINT(10) NOT NULL UNIQUE,
		email VARCHAR(30) NOT NULL UNIQUE,
		uid VARCHAR(30) NOT NULL UNIQUE,
		pass VARCHAR(30) NOT NULL
	)";
	if(mysqli_query($link,$sql))
	{
		echo "Table created sucessfully.."; 
	}
	else
	{
		echo "could not able to create table	.".mysqli_error($link);
	}
	mysqli_close($link);
?>