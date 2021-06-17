<?php
	session_start();
	$link=mysqli_connect("localhost","root","","sb");
	if($link===false)
	{
		die("ERROR could not able to connect	.".mysqli_connect_error());
	}
	$uid=$_POST['uid'];
	$pass=$_POST['pass'];
	$sql="SELECT uid FROM regd WHERE uid='$uid'";
	$result=mysqli_query($link,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$sql="SELECT uid,pass FROM regd WHERE uid='$uid' AND pass='$pass'";
		$result=mysqli_query($link,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$_SESSION['ln']=$uid;
			header('location:gallery.php');
		}
		else
		{
			echo "Incorrect PASSWORD";
		}
	}
	else
	{
		echo "USER ID does not exists";
	}
?>