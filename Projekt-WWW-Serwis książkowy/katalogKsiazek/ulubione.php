<?php
session_start()
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteka_db";

$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
$sql = "SELECT * FROM katalog WHERE id=".$_POST["id"];
$o = $conn->query($sql);
$row = $o->fetch_assoc();

$ifyy = "SELECT idBook FROM ulubione WHERE idUser =". $_SESSION["id"] ." and idBook =".$_POST["id"];
    $result = $conn->query($ifyy);


if($result->num_rows >=1) {
	$sql = "DELETE FROM ulubione WHERE idUser =". $_SESSION["id"] ." and idBook=".$_POST["id"];
} else {
	$sql = "INSERT INTO ulubione(idUser, idBook) VALUES ('". $_SESSION["id"]."','".$row["id"]."')";
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

//header('Location: wiecej.php?id='.$_GET["id"]);
?>