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
  <div id="pasekMenu">
    <button class="menu"><a href="katalogKsiazek.php">KATALOG KSIĄŻEK</a></button>
    <button class="menu"><a href="../mojeKonto.php?id="<?php $_SESSION["id"] ?>> MOJE KONTO </a></button>
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
			$id = $_GET["id"];

			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) {        
				console_log("Connection failed: " . $conn->connect_error);
				die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT * FROM ulubione, katalog, gatunki WHERE gatunki.id = katalog.idGatunku AND ulubione.idBook = katalog.id AND katalog.id = $id AND ulubione.idUser =".$_SESSION["id"];
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				if($row = $result->fetch_assoc()) {
			      echo 
				      "<br><br><table><tr><th><img style='width:350px' src='uploads/{$row["okladka"]}'></th>
			      <th><br><p style='text-decoration: underline'>\"" . $row["tytul"]."\"</p>
			      <br><em>Autor: </em> &nbsp " . $row["autor"].
			      "<br><em>Gatunek: </em> &nbsp " . $row["gatunek"].
			      "<p><em>Ocena: </em> &nbsp Tę książkę poleca " . $row["ocena"]. " czytelników</p>
			      <img id='like' style='width: 20px;' name='like' src='../img/Like.png'> &nbsp 
                  <img id='unLike' style='width: 20px;' name='unLike' src='../img/UnLike.jpg'>&nbsp
                  <img id='unlove' style='width: 20px' name='unLove' src='https://image.flaticon.com/icons/png/512/14/14121.png'> &nbsp
			      <br><p style='margin-left:9%; margin-right:9%;'><em>Krótki opis: </em><br>" . $row["opis"]. "</p><br>";
			}} else {
				$sql = "SELECT * FROM katalog, gatunki WHERE gatunki.id = katalog.idGatunku AND katalog.id = $id";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					if($row = $result->fetch_assoc()) {
					echo 
					      "<br><br><table><tr><th><img style='width:350px' src='uploads/{$row["okladka"]}'></th>
				      <th><em>Tytuł: </em> &nbsp " . $row["tytul"].
				      "<br><em>Autor: </em> &nbsp " . $row["autor"].
				      "<br><em>Gatunek: </em> &nbsp " . $row["gatunek"].
				      "<p><em>Ocena: </em> &nbsp Tę książkę poleca " . $row["ocena"]. " czytelników</p>
				      <img id='like' style='width: 20px;' name='like' src='../img/Like.png'> &nbsp 
	                  <img id='unLike' style='width: 20px;' name='unLike' src='../img/UnLike.jpg'>&nbsp
	                  <img id='love' style='width: 20px' name='like' src='../img/love.jpg'>
				      <br><p style='margin-left:9%; margin-right:9%;'><em>Krótki opis: </em><br>" . $row["opis"]. "</p><br>";
				}}}
				echo "<a href='edytujWiecej.php?id=$id'><img style='width: 30px;' src='../img/edit.png'></a></th></tr></table>";

		echo"<br><br><div class='komentarze'>
		     <form method='post' action='insertComment2.php'>
		     <br><br>                     
		        Dodaj swój komentarz:
		        <input type='hidden' name='id' value=$id>
		        <br><textarea style='width:75%' name='tresc'></textarea><br>
		        <button id='przeslij'>Prześlij</button>
		        <br><br>
		      </form>";

		    $sql = "SELECT * FROM komentarze, user WHERE idBook = $id AND komentarze.idUser = user.id";
		    $result = $conn->query($sql);

		    if ($result->num_rows > 0) {
		        while ($row = $result->fetch_assoc()) {
		            echo
		            "<img style='width: 10%; border-radius: 50%;' src='../RejestracjaLog/uploads/". $row["avatar"] ."'>".
		            $row["nick"]
		            . "&nbsp &nbsp &nbsp &nbsp"
		            . $row["data"]
		            . " <br>"
		            . $row["tresc"]
		            . "<br>";
		        }
		    } else {
		        echo "<em>Brak Komentarzy </em><br>" . $conn->error;
		    }
		    echo "</div><div class='ulubione'>";
		    $sql = "SELECT * FROM ulubione, user WHERE idBook = $id AND ulubione.idUser = user.id AND idUser != ".$_SESSION["id"];
		    $result = $conn->query($sql);
		    if ($result->num_rows > 0) {
		    	echo "<br><br><br><br><em>Tę książkę dodali do ulubionych: </em>";
		        while ($row = $result->fetch_assoc()) {
		            echo
		            "<p><a href='../mojeKonto.php?id=". $row["idUser"] ."'><img style='width: 25%; border-radius: 50%;' src='../RejestracjaLog/uploads/". $row["avatar"] ."'></a>".
		            $row["nick"]."</p>";
		        }
		        
		    } else {
		        echo "<br><br><em style='text-align:left'>jeszcze nikt nie dodał ksiązki do ulubionych</em>" . $conn->error;
		    }
		    echo "</div>";

		    $conn->close();
		?>
	</div>
<br>
  <div id="footer">
    <br>
    <img id="footer1" src="../img/narodowa.jpg">
    <img id="footer2" src="../img/towarzystwoLiterackie.jpg">
    <img id="footer3" src="../img/ministerstwoKultury.jpg">
    <img id="footer4" src="../img/wydawnictwoLiterackie.jpg">
    <h6> © 2019, Natalia Koć </h6>
  </div>
</body>

<script>
	$(document).ready(function() {
		$("#love").click(function() {
			$.post("ulubione.php",
			{
				id: <?php echo $_GET["id"] ?>
			},
			function(data, status) {
				$("#love").attr("src","https://image.flaticon.com/icons/png/512/14/14121.png");
			}
			);
		});
	
		$("#like").click(function() {
			$.post("like.php",
			{
				id: <?php echo $_GET["id"] ?>
			},
			function(data, status) {
				$("#like").attr("src","");
			}
			);
		});

		$("#unLike").click(function() {
			$.post("unLike.php",
			{
				id: <?php echo $_GET["id"] ?>
			},
			function(data, status) {
				$("#unLike").attr("src","");
			}
			);
		});

		$("#unlove").click(function() {
			$.post("ulubione.php",
			{
				id: <?php echo $_GET["id"] ?>
			},
			function(data, status) {
				$("#unlove").attr("src","../img/love.jpg");
			}
			);
		});
	});

</script>

</html>
