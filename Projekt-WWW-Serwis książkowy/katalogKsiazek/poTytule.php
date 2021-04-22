<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
   <meta charset="UTF-8">
   <title>Katalog Książek</title>
   <link rel="stylesheet" href="../style.CSS">
</head>

<body>
<br>
  <a style="position: absolute; top: 1%; right: 12%; " href="../RejestracjaLog/zalogujSie.php">Wyloguj</a>
<div id="obrazNaglowkowy">
    <img style="width: 25%" src="../img/logo.jpg"><img style="width: 54%" src="../img/naglowek.jpg">
  </div>
  <div id="pasekMenu">
    <button class="menu"><a href="katalogKsiazek.php">KATALOG KSIĄŻEK</a></button>
    <button class="menu"><a href="../mojeKonto.php?id="<?php $_SESSION["id"] ?>>MOJE KONTO </a></button>
    <button class="menu"><a href="../ranking.php">RANKING </a></button>
    <?php
        if( $_SESSION["rola"] == 'admin') {
            echo "<button class='menu'><a id='pasekMenu' href='../Gtunki/EdycjaGatunki.php'>GATUNKI </a></button>";
        }
    ?>
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

         $sql="SELECT id, gatunek, (SELECT COUNT(*) FROM katalog WHERE katalog.idGatunku=gatunki.id) AS liczba FROM gatunki ORDER BY gatunek ASC";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                if($row["liczba"]>0) {
                  echo "<button><a class='linkGatunek' href='Gatunek.php?gatunek=".$row["id"]."'>".$row["gatunek"]." &nbsp (".$row["liczba"].")</a></button>"; 
                } else {
                  echo "<button><a class='linkGatunek'>".$row["gatunek"]." &nbsp (".$row["liczba"].")</a></button>"; 
                }
              }
              echo "<button><a class='wybranyGatunek' href='katalogKsiazek.php'>WSZYSTKIE</a></button><br>";
          } else {
              echo "0 results";
          }

          $conn->close();
        ?> 
        <form id="poTytule" method="post" action="poTytule.php">
          <input style='width:30%; height: 20px' id="tytul" type="text" name="tytul" placeholder="Tytuł:">
          <button><img type="submit" style="width: 20px" src="https://cdn.pixabay.com/photo/2014/04/02/17/04/magnifying-307875__340.png"></button>
        </form><br>
      <div style="text-align: center">

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

          $sql = "SELECT * FROM katalog WHERE tytul LIKE '%". $_POST["tytul"]."%'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo 
                  "<a href='wiecej.php?id=".$row["id"]."'><img class='okladkaKsiazki' src='uploads/" 
                  .$row["okladka"]. "' alt='".$row["tytul"]."' style='height: 200px; margin: 7px;'></a>&nbsp";
                  if( $_SESSION["rola"] == 'admin') {
                        echo"<a href='deleteBook.php?id=".$row["id"]."' ><img style=' width:3%' src='../img/delete.png'></a>";
                     }
              }
          } else {
              echo "Brak książek o podanym tytule.";
          }

          $conn->close();
        ?> 
      </div></th></tr>
    </table>
	</div>
<br>
  <form id="addBook" method="post" action="addBook.php" enctype="multipart/form-data">
    <h3 class="text0">Znasz inne ciekawe książki? <br>Dodaj do listy swoje propozycje.</h3>
    <p class="text1">Okładka:</p><input type="file" name="fileToUpload" id="fileToUpload">
    <p class="text2">Tytuł: </p><input id="tytul1" type="text" name="tytul" placeholder="Tytuł:">
    <p class="text3">Autor: </p><input id="autor" type="text" name="autor" placeholder="Autor:">
    <p class="text4">Gatunek:</p> <select id="gatunek" type="text" name="gatunek" placeholder="Gatunek:">
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

          $sql = "SELECT * FROM gatunki";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo 
                  "<option value='".$row["gatunek"]."'>".$row["gatunek"]."</option>";
              }
          } else {
              echo "0 results";
          }

          $conn->close();
        ?>       
    </select><br>
    <p class="text5" >Opis: </p><br><textarea id="opis" type="text" name="opis" placeholder="Opis:"></textarea></p>
    <input id="przycisk" type="submit" value="Dodaj nową książkę">
  </form>
<br>
  <div id="footer">
    <br>
    <img id="footer1" src="../img/narodowa.jpg">
    <img id="footer2" src="../img/towarzystwoLiterackie.jpg">
    <img id="footer3" src="../img/ministerstwoKultury.jpg">
    <img id="footer4" src="../img/wydawnictwoLiterackie.jpg">
    <h6>© 2019, Natalia Koć</h6>
  </div>

</body>
</html>