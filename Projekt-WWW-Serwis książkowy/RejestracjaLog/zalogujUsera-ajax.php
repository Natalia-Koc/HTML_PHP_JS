<?php
session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteka_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        console_log("Connection failed: " . $conn->connect_error);
        die("Connection failed: " . $conn->connect_error);
    } 

    $nick = $_POST['nick'];
    $password = $_POST['haslo'];

    $sql = "SELECT * FROM user 
    		WHERE nick='" . $nick . "' AND haslo='" . $password . "'";

    $id = $conn->query($sql);
    $id2 = $id->fetch_assoc();
    $id3 =  $id2['id'];
    $avatar = $id2['avatar'];
    $rola = $id2['rola'];
    $_SESSION["id"] = $id2['id'];
    $_SESSION["nick"] = $nick;
    $_SESSION["avatar"] = "$avatar";
    $_SESSION["rola"] = "$rola";

    echo "Session variables are set.";  
    $result = $conn->query($sql);

    $conn->close();
    if ($result->num_rows === 1) {
        header('Location: katalogKsiazek/katalogKsiazek.php');
    } else {
        header('Location: zalogujSie.php');

    }
?>