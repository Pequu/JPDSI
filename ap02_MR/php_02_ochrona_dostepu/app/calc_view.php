<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Kalkulator</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">
<form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
	<fieldset>
		<legend>Kalkulator Kredytowy</legend>	
		<label for="id_kwota">Kwota: </label>
		<input id="id_kwota" type="number" name="kwota" value="<?php out($kwota) ?>" placeholder="5000 PLN" min="1" /><br />
		<label for="id_proc">Oprocentowanie: </label>
		<input id="id_proc" type="number" name="proc" value="<?php out($procenty) ?>" placeholder="5 = 5%"/><br />
		<label for="id_lat">Ilość lat: </label>
		<input id="id_lat" type="number" name="lata" value="<?php out($lat) ?>" placeholder="2 lata" min="1"/><br />
		<input type="submit" value="Oblicz" />
		
	</fieldset>
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
<?php echo 'Wynik: '.$result.' PLN'; ?>
</div>
<?php } ?>

</div>

</body>
</html>