<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteka_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO user (avatar, nick, imie, nazwisko, email, haslo) VALUES ('".$_POST["avatar"]."','".$_POST["nick"]."','".$_POST["imie"]."','".$_POST["nazwisko"]."','".$_POST["email"]."','".$_POST["haslo"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: zalogujSie.php');
?>