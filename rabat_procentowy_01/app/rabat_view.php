<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css">
<title>Rabat Procentowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/rabat.php" method="post">
	<label for="price">Cena: </label>
	<input id="price" type="text" name="price" value="<?php isset($price)?print($price):''; ?>" /><br>
	<br>
    <label for="rabat">Rabat: </label>
	<input id="rabat" type="text" name="rabat" value="<?php isset($rabat)?print($rabat):''; ?>" />%<br>
    <input type="submit" value="Oblicz" />
</form>	

<?php
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?><br>
<?php echo 'Cena po rabacie: '.$result; echo" zł"?>
</div>
<?php } ?>

</body>
</html>