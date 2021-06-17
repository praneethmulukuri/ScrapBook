<?php
	session_start();
	$id=$_SESSION['ln'];
?><html>
	<head>
		<title>Gallery</title>
		<link rel="stylesheet" type="text/css" href="gallery.css">
	</head>	
	<body>
		<section class="gallery-links">
			<div class="wrapper">
				<h2>Gallery</h2>
				<a href="home.html" target="_self" class="home" style="float:right">
				<img src="hom.png" alt="home" class="img" width="50px" height="50px"></a>
				<div class="gallery-container">
				<?php
					$link=mysqli_connect("localhost","root","","sb");
					if($link===false)
					{
						die("ERROR: could not connect.	".mysqli_connect_error());
					}
					$sql = "SELECT * FROM $id ORDER BY ord DESC";
					$stmt = mysqli_stmt_init($link);
					if(!mysqli_stmt_prepare($stmt,$sql))
					{
						echo "SQL statements failed";
					}
					else{
						mysqli_stmt_execute($stmt);
						$result=mysqli_stmt_get_result($stmt);
						while($row=mysqli_fetch_assoc($result))
						{
							echo '<a href="img/'.$row["imgfn"].'">
								<div style="background-image: url(img/'.$row["imgfn"].')"></div>
								<h3>'.$row["title"].'</h3>
								<p>'.$row["des"].'</p>
								</a>';
						}
					}
					
				?>

				</div><br><br>
				<?php
				echo '<div class="gallery-upload">
					<h2>UPLOAD</h2>
					<form action="insgl.php" method="post" enctype="multipart/form-data">
						<div class="inputbox">
							<input type="text" name="filename" autocomplete="off" required="">
							<label>Filename</label>
						</div>
						<div class="inputbox">
							<input type="text" name="filetitle" autocomplete="off" required="">
							<label>File title</label>
						</div>
						<div class="inputbox">
							<input type="text" name="filedesc" autocomplete"off" required="">
							<label>File description</label>
						</div>
						<div class="file">
							<input type="file" name="file" required="">
						</div>
						<input type="submit" name="submit" value="Upload">
					</form>
				</div>';
				?>
			</div>
		</section>
	</body>
</html>
