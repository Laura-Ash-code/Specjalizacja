<?php require_once dirname(__FILE__) .'/../config.php';?>

<?php  
	include _ROOT_PATH.'/templates/top.php';
?>

<h2 class="content-head is-center" style = "color:rgb(189, 140, 140)">Kalkulator rabatow</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form action="<?php print(_APP_ROOT); ?>/app/rabat.php" method="post" class="pure-form pure-form-stacked">
		<legend style = "color:rgb(189, 140, 140)">Kalkulator rabatów</legend>
		<fieldset>
			<label for="price" style = "color:rgb(189, 140, 140)">CENA: </label>
			<input id="price" type="text" name="price" value="<?php out($price) ?>" /><br>
			<br>
			<label for="rabat" style = "color:rgb(189, 140, 140)">RABAT: (%)</label>
			<input id="rabat" type="text" name="rabat" value="<?php out($rabat)?>" /><br>

			<button type="submit" class="pure-button" style="	border-color: rgba(45, 21, 21,0.7);
	background-color: rgba(37, 9, 9, 0.7);
	color: rgb(189, 140, 140);">Oblicz</button>
		</fieldset>
	</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">

<?php
	if (isset($messages)) {
		if (count ( $messages ) > 0) {
		echo '<h4>Wystąpiły błędy: </h4>';
		echo '<ol class="err">';
			foreach ( $messages as $key => $msg ) {
				echo '<li>'.$msg.'</li>';
			}
			echo '</ol>';
		}
	}
?>

<?php
if (isset($infos)) {
	if (count ( $infos ) > 0) {
	echo '<h4>Informacje: </h4>';
	echo '<ol class="inf">';
		foreach ( $infos as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
	<h4>Wynik</h4>
	<p class="res">
<?php print($result); ?>
	</p>
<?php } ?>

</div>
</div>

<?php 
	include _ROOT_PATH.'/templates/bottom.php';
?>