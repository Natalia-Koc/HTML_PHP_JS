<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
   <meta charset="UTF-8">
   <title>Gatunki</title>
   <link rel="stylesheet" href="../style.CSS">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
<br>
<a style="position: absolute; top: 1%; right: 12%; " href="../RejestracjaLog/zalogujSie.php">Wyloguj</a>
  <div id="obrazNaglowkowy">
    <img style="width: 25%" src="../img/logo.jpg"><img style="width: 54%" src="../img/naglowek.jpg">
  </div>
<br>
  <div id="pasekMenu">
    <button class="menu"><a id="pasekMenu" href="../stronaGlowna.php">STRONA GŁÓWNA  </a></button>
    <button class="menu"><a id="pasekMenu" href="../katalogKsiazek/katalogKsiazek.php">KATALOG KSIĄŻEK</a></button>
    <button class="menu"><a id="pasekMenu" href="../mojeKonto.php">MOJE KONTO </a></button>
    <button class="menu"><a id="pasekMenu" href="../ranking.php">RANKING </a></button>
    <button class="menu"><a id="pasekMenu">GATUNKI </a></button>
  </div>
<br>
  <div id="stronaCentrum">
      <?php 
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "biblioteka_db";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          } 

          $sql = "SELECT * FROM gatunki";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            echo "<div style=' padding:6%;'>";
              while($row = $result->fetch_assoc()) {
                  echo 
                  "<form id='edit' method='post' action='edit.php?id=".$row["id"]."'>
                  <p style='border-bottom-style: ridge;'>
                  <input id='gatunek' type='text' name='gatunek' value='".$row["gatunek"]."'>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  <a href='delete.php?id=".$row["id"]."'><img src='../img/delete.png' style='width:2%'></a>
                  &nbsp&nbsp&nbsp
                  <input id='submit' type='submit' value='edytuj'> </form></p><br>";
              }
            echo "<form id='addGatunek' method='post' action='addGatunek.php'>              
              <input id='gatunek' type='text' name='gatunek' placeholder='Gatunek:'>
              <input id='przycisk' type='submit' value='Dodaj'> </form></div>";
          } else {
            echo "0 results";
          }

          $conn->close();
        ?> 
  </div>
  <div id="footer">
    <br>
    <img id="footer1" src="../img/narodowa.jpg">
    <img id="footer2" src="../img/towarzystwoLiterackie.jpg">
    <img id="footer3" src="../img/ministerstwoKultury.jpg">
    <img id="footer4" src="../img/wydawnictwoLiterackie.jpg">
    <h6>© 2019, Natalia Koć </h6>
  </div>

</body>

</html>
