<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteka_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    
    $sql = "DELETE FROM katalog WHERE id=".$_GET["id"];
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
    header('Location: katalogKsiazek.php');
?>