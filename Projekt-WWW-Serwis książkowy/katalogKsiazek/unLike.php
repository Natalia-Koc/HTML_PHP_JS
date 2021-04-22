<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteka_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT ocena FROM katalog WHERE id =".$_POST["id"];

   $ocena = $conn->query($sql);
   $ocena2 = $ocena->fetch_assoc();

   $ocena3 = $ocena2['ocena'];
   $ocena3 = $ocena3 - 1;
    
        $id = $_POST["id"];

    $sql = "UPDATE katalog
    SET ocena =".$ocena3 ."
    WHERE id =". $_POST["id"];



    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
 
?>