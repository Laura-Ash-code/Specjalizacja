<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<head>
	<meta charset="utf-8" />
	<title>Rabat Procentowy</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css">
	
</head>
<body>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_ROOT); ?>/app/rabat.php" method="post" class="pure-form pure-form-stacked">
    <legend>Kalkulator rabatów</legend>
    <fieldset>
        <label for="price">CENA: </label>
        <input id="price" type="text" name="price" value="<?php out($price) ?>" /><br>
        <br>
        <label for="rabat">RABAT: (%)</label>
        <input id="rabat" type="text" name="rabat" value="<?php out($rabat)?>" /><br>
        <input type="hidden" name="op" value="calc">
    </fieldset>
    <input type="submit" value="OBLICZ" class="pure-button pure-button-primary" />
</form>


<?php
	if (isset($messages)) {
		if (count ( $messages ) > 0) {
			echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: rgba(152, 43, 43, 1); color:white; width:25em;">';
				foreach ($messages as $key => $msg) {
					echo '<li>'.$msg.'</li>';
				}
			echo '</ol>';
		}
	}
?>

<?php if (isset($result)){ ?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: rgba(24, 104, 44, 1); color:white; width:25em;">
<?php echo 'Cena po rabacie: '.$result." zł";?>
</div>
<?php } ?>

</div>

</body>
</html>