<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
   <meta charset="UTF-8">
   <title>Ranking Książek</title>
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
    <button class="menu"><a href="mojeKonto.php?id="<?php $_SESSION["id"] ?>>MOJE KONTO </a></button>
    <button class="menu"><a>RANKING </a></button>
    <?php
        if( $_SESSION["rola"] == 'admin') {
            echo "<button class='menu'><a id='pasekMenu' href='Gtunki/EdycjaGatunki.php'>GATUNKI </a></button>";
        }
    ?>
  </div>
<br>
	<div id="stronaCentrum" style="margin-left: 10%; text-align: left;">

        <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "biblioteka_db";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          } 

          $sql = "SELECT katalog.id, katalog.okladka, katalog.tytul, katalog.autor, COUNT(*) AS liczba FROM katalog, ulubione WHERE ulubione.idBook = katalog.id GROUP BY katalog.id ORDER BY liczba DESC";
          $result = $conn->query($sql);
              $i=1;
          if ($result->num_rows > 0) {
            echo "<div style='display: grid;'>";
              while($row = $result->fetch_assoc()) {
                  echo 
                  "<em style='text-decoration-line: underline; font-size:35px; text-align: left; grid-column: 1; margin-left: 30%;'> $i</em><a style='text-align: left; grid-column: 2; margin-left: 30%;' href='katalogKsiazek/wiecej.php?id=".$row["id"]."'><img class='okladkaKsiazki' src='katalogKsiazek/uploads/" .$row["okladka"]. "' style='height: 200px; margin: 7px;'></a><div style='text-align: left; grid-column: 3; margin-left: 30%; '><strong>". $row["tytul"]."</strong><br><br><em>". $row["autor"]."</em><br><br><img style='width:4%;' src='img/love.jpg'> ". $row["liczba"]." .</div>&nbsp";
                  $i++;
              }
              echo "</div>";
          } else {
              echo "Brak książek o podanym gatunku.";
          }

          $conn->close();
        ?> 
	</div>
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