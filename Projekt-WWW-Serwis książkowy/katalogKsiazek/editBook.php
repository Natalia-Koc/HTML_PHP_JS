<?php
session_start();
?>
<?php

	$target_dir = "uploads/";													//nazwa folderu z okladkami 
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;																
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "biblioteka_db";

			$id = $_POST['id'];
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			if(basename($_FILES["fileToUpload"]["name"]) != NULL) {

				$sql = "SELECT * FROM katalog WHERE id=" .$id;
			    echo $sql;
			    $result = $conn->query($sql);
			    $row = $result->fetch_assoc();
			    $file = $row["okladka"];

			    if($file != "brakOkladki.jpg") {
					if (!unlink("uploads/".$file)) {
					  echo ("Error deleting $file");
					} else {
					  echo ("Deleted $file");
					}
				}


				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        echo "File is not an image.";
				        $uploadOk = 0;
				    }
				}
				// Check if file already exists
				if (file_exists($target_file)) {
				    echo "Sorry, file already exists.";
				    $uploadOk = 0;
				}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
				    echo "Sorry, your file is too large.";
				    $uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				    } else {
				        echo "Sorry, there was an error uploading your file.";
				    }
				}
				

				$sql = "UPDATE katalog SET tytul='".$_POST["tytul"]."', autor='".$_POST["autor"]. "', opis='".$_POST["opis"]."', okladka='".basename( $_FILES["fileToUpload"]["name"])."', idGatunku='".$_POST["gatunek"]."' WHERE id=".$id;
			
			} else {

				$sql = "UPDATE katalog SET tytul='".$_POST["tytul"]."', autor='".$_POST["autor"]. "', opis='".$_POST["opis"]."', idGatunku='".$_POST["gatunek"]."' WHERE id=".$id;
			}


			if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
			echo $sql;
			$conn->close();

			header('Location: wiecej.php?id='.$id);
?>