<?php
	session_start();
	$link=mysqli_connect("localhost","root","","sb");
	if($link===false)
	{
		die("ERROR could not able to connect	.".mysqli_connect_error());
	}
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$phno=$_POST['phno'];
	$email=$_POST['email'];
	$uid=$_POST['uid'];
	$pass=$_POST['pass'];
	$sql="INSERT INTO regd(fname,mname,lname,phno,email,uid,pass) VALUES
		('$fname','$mname','$lname',$phno,'$email','$uid','$pass')";
	if(mysqli_query($link,$sql))
	{
		$sql="CREATE TABLE $uid(
				id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
				title LONGTEXT NOT NULL,
				des LONGTEXT not null,
				imgfn LONGTEXT NOT NULL,
				ord LONGTEXT NOT NULL    
			)";
		if(mysqli_query($link,$sql))
		{
			$_SESSION['ln']=$uid;
			header('location:gallery.php');
		}
		else
		{
			echo "ERROR could not create table $uid.".mysqli_error($link);
		}
	}
	else
	{
		echo "ERROR could not able to insert values	.".mysqli_error($link);
	}
?>