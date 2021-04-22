<!DOCTYPE html>
<html lang="pl">

<head>
   <meta charset="UTF-8">
   <title>Rejestracja</title>
   <link rel="stylesheet" href="../style.css">
</head>

<body>
<br>
  <div id="obrazNaglowkowy">
    <img style="width: 25%" src="../img/logo.jpg"><img style="width: 54%" src="../img/naglowek.jpg">
  </div>
<br>
	<div id="stronaCentrum">
    <form action="upload.php" method="post" enctype="multipart/form-data">
      Avatar: <input type="file" name="fileToUpload" id="fileToUpload">
	    <p>Nick: <input id="nick" type="text" name="nick" placeholder="Nick"></p>
			<p>Imie: <input id="imie" type="text" name="imie" placeholder="Imie"></p>
			<p>Nazwisko: <input id="nazwisko" type="text" name="nazwisko" placeholder="Nazwisko"></p>
			<P>E-mail: <input id="email" type="text" name="email" placeholder="e-mail"></P>
			<p>Hasło: <input id="haslo" type="password" name="haslo" placeholder="hasło"></p><br>
			<input id="przycisk" type="submit" name="submit" value="Zarejestruj sie">
		</form>
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