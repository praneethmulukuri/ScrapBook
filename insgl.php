<?php
	session_start();
	$id=$_SESSION['ln'];
	$link=mysqli_connect("localhost","root","","sb");
	if($link===false)
	{
		die("ERROR: could not connect.	".mysqli_connect_error());
	}
		$fn=$_POST['filename'];
		if(empty($fn))
		{
			$fn="gallery";
		}
		else
		{
			$fn=strtolower(str_replace(" ","-",$fn));
		}
		$title=$_POST['filetitle'];
		$desc=$_POST['filedesc'];
		$file=$_FILES['file'];
		
		$filename=$file["name"];
		$filetype=$file["type"];
		$filetempname=$file["tmp_name"];
		$fileerror=$file["error"];
		$filesize=$file["size"];

		$fileext=explode(".",$filename);
		$fileactualext=strtolower(end($fileext));
		
		$allowed=array("jpg","jpeg","png");
			
		if(in_array($fileactualext,$allowed))
		{
			if($fileerror === 0)
			{
				if($filesize<3000000)
				{
					$imgfn = $fn . "." . uniqid("",true) . "." . $fileactualext;
					$filedest = "img/" . $imgfn;
				
					if(empty($title)||empty($desc))
					{
						header("location:gallery.php?upload=failed");
						exit();
					}
					else
					{
						$sql = "SELECT * FROM $id;";
						$stmt=mysqli_stmt_init($link);
						if(!mysqli_stmt_prepare($stmt,$sql))
						{
							echo "SQL statements failed";
						}
						else{
							mysqli_stmt_execute($stmt);
							$result= mysqli_stmt_get_result($stmt);
							$rowcount=mysqli_num_rows($result);
							$setImageOrder = $rowcount + 1;

							$sql ="INSERT INTO $id(title,des,imgfn,ord) VALUES (?, ?, ?, ?);";
							if(!mysqli_stmt_prepare($stmt,$sql))
							{
								echo "SQL statements failed";
							}
							else{
								mysqli_stmt_bind_param($stmt,"ssss",$title,$desc,$imgfn,$setImageOrder);
								mysqli_stmt_execute($stmt);

								move_uploaded_file($filetempname,$filedest);
								header("location:gallery.php?upload=sucess");
							}			
						}
					}
				}
				else{
					echo "File size is too big";
					exit();
				}
			}
			else{
				echo "You had an error!";
				exit();
			}
		}
		else{
			echo "Please upload file types of jpg/jpeg/png only..";
			exit();
		}
?>