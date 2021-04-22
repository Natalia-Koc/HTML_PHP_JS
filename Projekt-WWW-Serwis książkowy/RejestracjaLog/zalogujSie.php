<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
   <meta charset="UTF-8">
   <title>Logowanie</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <script src="script.js"></script>
   <link rel="stylesheet" href="../style.css">
</head>

<body>
<br>
  <div id="obrazNaglowkowy">
    <img style="width: 25%" src="../img/logo.jpg"><img style="width: 54%" src="../img/naglowek.jpg">
  </div>
<br>
  <div id="stronaCentrum">
  	<form id="zaloguj" method="post" action="zalogujUsera-ajax.php">
	 	<p>Nick: <input id="nick" type="text" name="nick" 
     			placeholder="Nick:" value="nick"></p>
		<p>Hasło: <input id="haslo" type="password" name="haslo" 
				placeholder="hasło:"  value="haslo"></p>				
          <input id="przycisk" type="submit" value="Zaloguj">
	</form>
		<p> Nie masz jeszcze konta? <a href="zarejestrujSie.php">Zarejestruj Się</a></p>
		<p id="kontener"></p>
	</div>
<br>
  <div id="footer">
    <br>
    <img id="footer1" src="../img/narodowa.jpg">
    <img id="footer2" src="../img/towarzystwoLiterackie.jpg">
    <img id="footer3" src="../img/ministerstwoKultury.jpg">
    <img id="footer4" src="../img/wydawnictwoLiterackie.jpg">
    <h6>© 2019, Natalia Koć</h6>
  </div>
</html>