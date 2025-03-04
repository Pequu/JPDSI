<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post" >
	<fieldset>
		<legend>Kalkulator Kredytowy</legend>	
		<label for="id_kwota">Kwota: </label>
		<input id="id_kwota" type="number" name="kwota" value="<?php isset($kwota)?print($kwota):""; ?>" placeholder="5000 PLN" /><br />
		<label for="id_proc">Oprocentowanie: </label>
		<input id="id_proc" type="number" name="proc" value="<?php isset($procenty)?print($procenty):""; ?>" placeholder="5 = 5%" /><br />
		<label for="id_lat">Ilość lat: </label>
		<input id="id_lat" type="number" name="lata" value="<?php isset($lat)?print($lat):""; ?>" placeholder="2 lata" /><br />
		<input type="submit" value="Oblicz" />
		
	</fieldset>
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata: '.$result.' PLN'; ?>
</div>
<?php } ?>

</body>
</html>