<?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check != false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($_FILES["fileToUpload"]["size"])) {
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
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "biblioteka_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 


            $sql = "INSERT INTO katalog (okladka, tytul, autor, idGatunku, opis) VALUES ('brakOkladki.jpg','".$_POST["tytul"]."','".$_POST["autor"]."','".$_POST["gatunek"]."','".$_POST["opis"]."')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

            header('Location: katalogKsiazek.php');
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded."; 
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
            
    		$servername = "localhost";
    		$username = "root";
    		$password = "";
    		$dbname = "biblioteka_db";

    		$conn = new mysqli($servername, $username, $password, $dbname);

    		if ($conn->connect_error) {
    		    die("Connection failed: " . $conn->connect_error);
    		} 


    		$sql = "INSERT INTO katalog (okladka, tytul, autor, idGatunku, opis) VALUES ('".basename( $_FILES["fileToUpload"]["name"])."','".$_POST["tytul"]."','".$_POST["autor"]."','".$_POST["gatunek"]."','".$_POST["opis"]."')";

    		if ($conn->query($sql) === TRUE) {
    		    echo "New record created successfully";
    		} else {
    		    echo "Error: " . $sql . "<br>" . $conn->error;
    		}

    		$conn->close();

		  header('Location: katalogKsiazek.php');
    }
?>