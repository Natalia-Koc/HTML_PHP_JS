<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteka_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO gatunki (id, gatunek) VALUES ('".$_POST["id"]."','".$_POST["gatunek"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: EdycjaGatunki.php');
?>