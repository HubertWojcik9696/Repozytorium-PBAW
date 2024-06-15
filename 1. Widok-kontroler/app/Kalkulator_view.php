<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/Kalkulator.php" method="post">
	<label for="id_kwota">Kwota: </label>
	<input id="id_kwota" type="text" name="kwota"/><br />
	<label for="id_lata">Lata: </label>
	<input id="id_lata" type="text" name="lata"/><br />
	<label for="id_ileprocent">Ile procent: </label>
	<input id="id_ileprocent" type="text" name="ileprocent"/><br />
	<input type="submit" value="Oblicz" />
</form>	
<?php
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
<?php echo 'Miesieczna rata: '.$result; ?>
</div>
<?php } ?>

</body>
</html>