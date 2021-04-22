<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="pl">

<head>
   <meta charset="UTF-8">
   <title>więcej..</title>
   <link rel="stylesheet" href="../style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>

<body>
<br>
  <a style="position: absolute; top: 1%; right: 12%; " href="../RejestracjaLog/zalogujSie.php">Wyloguj</a>
	<div id="obrazNaglowkowy">
    <img style="width: 25%" src="../img/logo.jpg"><img style="width: 54%" src="../img/naglowek.jpg">
  </div>
<br>
  <div id="pasekMenu">
    <button class="menu"><a id="pasekMenu" href="katalogKsiazek.php">KATALOG KSIĄŻEK</a></button>
    <button class="menu"><a id="pasekMenu" href="../mojeKonto.php">MOJE KONTO </a></button>
    <button class="menu"><a id="pasekMenu" href="../ranking.php?id="<?php $_SESSION["id"] ?>>RANKING </a></button>
    <?php
        if($_SESSION["rola"] == 'admin') {
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
				console_log("Connection failed: " . $conn->connect_error);
				die("Connection failed: " . $conn->connect_error);
			} 

			$id = $_GET["id"];

			echo "<div id='centrum'>";
				$sql = "SELECT * FROM katalog WHERE id = $id";
				$result = $conn->query($sql);

				$row = $result->fetch_assoc();
				  $okladka = $row["okladka"];
			      $tytul = $row["tytul"];
			      $autor = $row["autor"];
			      $idGatunku = $row["idGatunku"];
			      $opis = $row["opis"];
			echo "<div>";
	?>
	
	<form method="post" action="editBook.php" enctype="multipart/form-data">
	<input type="hidden" name="id" value= <?php echo "$id" ?> >
	<br><br><table><tr><th><img style="width:350px" src= "uploads/<?php echo "$okladka" ?>"><br>
	<input type="file" name="fileToUpload" id="fileToUpload"></th>
	<th style='padding-left:10%; text-align:center; width:150%'>
	<em>Tytuł: </em> &nbsp <input type="text" name="tytul" value= "<?php echo"$tytul" ?>"><br>
	<br><em>Autor: </em> &nbsp <input type="text" name="autor" value= "<?php echo"$autor" ?>"><br> 
  <br><em>Gatunek:</em> <select id="gatunek" type="text" name="gatunek" placeholder="Gatunek:">
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
                  echo "<option value='".$row["id"]."'"; if($row["id"] == "$idGatunku") { echo " selected";
                  } echo ">".$row["gatunek"]."</option>";
                  }
              }
          $conn->close();
        ?>   
    </select><br>
    <br><em>Krótki opis: </em><br> <textarea style="width:100%; padding: 8px"  rows="15" name="opis"><?php echo"$opis" ?></textarea></th></tr></table>
    <input id="przycisk" type="submit" value="Zapisz zmiany">
  </form>

	
<br><br>
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