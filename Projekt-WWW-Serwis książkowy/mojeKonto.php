<?php
session_start()
?>
<!DOCTYPE html>
<html lang="pl">

<head>
   <meta charset="UTF-8">
   <title>Moje konto</title>
   <link rel="stylesheet" href="style.CSS">
</head>

<body>
<br>
  <a style="position: absolute; top: 1%; right: 12%; " href="RejestracjaLog/zalogujSie.php">Wyloguj</a>
  <div id="obrazNaglowkowy">
    <img style="width: 25%" src="img/logo.jpg"><img style="width: 54%" src="img/naglowek.jpg">
  </div>
  <div id="pasekMenu">
    <button class="menu"><a href="katalogKsiazek/katalogKsiazek.php">KATALOG KSIĄŻEK</a></button>
    <button class="menu"><a> MOJE KONTO </a></button>
    <button class="menu"><a href="ranking.php">RANKING </a></button>
    <?php
        if( $_SESSION["rola"] == 'admin') {
            echo "<button class='menu'><a id='pasekMenu' href='Gtunki/EdycjaGatunki.php'>GATUNKI </a></button>";
        }
    ?>
  </div>
<br>
	<div id="stronaCentrum2">
        <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "biblioteka_db";

      if($_GET["id"]) {
        $id = $_GET["id"];
      } else {
        $id = $_SESSION["id"];
      }

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {        
        console_log("Connection failed: " . $conn->connect_error);
        die("Connection failed: " . $conn->connect_error);
      } 

      $sql = "SELECT * FROM user WHERE id =". $id;
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        if($row = mysqli_fetch_assoc($result)) {
            echo 
            "<table><tr><th style='width: 50%'><img style='width: 40%; border-radius: 50%;' src='RejestracjaLog/uploads/" . $row["avatar"]."'></th>
            <th style='text-align:left;'><em>Nick: </em> &nbsp " . $row["nick"].
            "<br><em>Imie: </em> &nbsp " . $row["imie"].
            "<br><em>Nazwisko: </em> &nbsp " . $row["nazwisko"];
            if($_GET["id"] == $_SESSION["id"]) {
              echo "<br><em>E-mail: </em> &nbsp " . $row["email"];
            }
            echo "<br></th></tr></table><br>";
      }}

      $sql = "SELECT * FROM ulubione, katalog  WHERE ulubione.idBook = katalog.id AND ulubione.idUser =". $id;
      $result = $conn->query($sql);
      echo "<div style='text-align:left'><em>Ulubione książki:</em> <br>";
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo 
                  "<a style='margin:1%;' href='katalogKsiazek/wiecej.php?id=".$row["idBook"]."'><img src='katalogKsiazek/uploads/" 
                  .$row["okladka"]. "' style='height: 200px; text-align:left;'></a>";
          }
      }
      echo "</div>";

        $conn->close();
    ?>
	</div>
<br>
<br>
  <div id="footer">
    <br>
    <img id="footer1" src="img/narodowa.jpg">
    <img id="footer2" src="img/towarzystwoLiterackie.jpg">
    <img id="footer3" src="img/ministerstwoKultury.jpg">
    <img id="footer4" src="img/wydawnictwoLiterackie.jpg">
    <h6>© 2019, Natalia Koć</h6>
  </div>

</body>
</html>