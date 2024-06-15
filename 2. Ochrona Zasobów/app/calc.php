<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$kwota,&$lata,&$ileprocent){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$ileprocent = isset($_REQUEST['ileprocent']) ? $_REQUEST['ileprocent'] : null;	
}
function validate(&$kwota,&$lata,&$ileprocent,&$messages){
	if ( ! (isset($kwota) && isset($lata) && isset($ileprocent))) {
		return false;
	}
	if ( $kwota == "") {
		$messages [] = 'Nie podano kwoty';
	}
	if ( $lata == "") {
		$messages [] = 'Nie podano lat';
	}
	if ( $ileprocent == "") {
		$messages [] = 'Nie podano oprocentowania';
	}
	if (count ( $messages ) != 0) return false;
	if (! is_numeric( $kwota )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	if (! is_numeric( $lata )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}
	if (! is_numeric( $ileprocent )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}
	if (count ( $messages ) != 0) return false;
	else return true;
}
function process(&$kwota,&$lata,&$ileprocent,&$messages,&$result){
	global $role;
	
	
	$kwota = intval($kwota);
	$lata = intval($lata);
	$ileprocent = intval($ileprocent);
	
	$miesieczne_ileprocent = $ileprocent / 100 / 12;
    $miesiace = $lata * 12;
    $miesieczna_platnosc = ($kwota * $miesieczne_ileprocent) / (1 - pow(1 + $miesieczne_ileprocent, -$miesiace));
	if($ileprocent <= 15 ){
      $result = round($miesieczna_platnosc);
     }
    if ($ileprocent > 15 && $role == 'employee'){
    $messages [] = 'Tylko pracownik ze stopniem menadżer może obliczyć oprocenotowanie o tak wysokim stopniu!';
    } else{
    $result = round($miesieczna_platnosc);
    }

}
$kwota = null;
$lata = null;
$ileprocent = null;
$miesieczne_ileprocent = null;
$result = null;
$messages = array();

getParams($kwota,$lata,$ileprocent);
if ( validate($kwota,$lata,$ileprocent,$messages) ) { 
	process($kwota,$lata,$ileprocent,$messages,$result);
}
include 'calc_view.php';
