<?php
$link = mysqli_connect("localhost", "root", "", "sb");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "CREATE TABLE gallery(
	id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	title LONGTEXT NOT NULL,
	des LONGTEXT not null,
	imgfn LONGTEXT NOT NULL,
	ord LONGTEXT NOT NULL    
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
mysqli_close($link);
?>