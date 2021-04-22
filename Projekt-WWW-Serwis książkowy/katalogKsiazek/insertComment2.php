<?php
session_start();
echo $_SESSION["id"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteka_db";
 
$tresc = $_POST['tresc'];
$id = $_POST['id'];

 
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "INSERT INTO komentarze (idBook, idUser, tresc)
VALUES ('$id', '".$_SESSION["id"]."', '$tresc')";
echo $sql;
 
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();
header('Location: wiecej.php?id='.$id);
?>
