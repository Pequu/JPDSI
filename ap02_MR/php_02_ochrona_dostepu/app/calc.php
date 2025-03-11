<?php
require_once dirname(__FILE__).'/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów
function getParams(&$kwota,&$lat,&$procenty){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$lat = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$procenty = isset($_REQUEST['proc']) ? $_REQUEST['proc'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwota,&$lat,&$procenty,&$messages){
	global $role;
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($kwota) && isset($lat) && isset($procenty))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $kwota == "") {
		$messages [] = 'Nie podano kwoty';
	}
	if ( $procenty < 0.1){
		$messages [] = "Nie podano oprocentowania";
	}
	if ( $lat == "") {
		$messages [] = 'Nie podano ilości lat';
	}

	//przywileje admina
	if ($role == 'user' && $kwota >= 100000){
		$messages [] = 'Tylko admin może wziąć kwote powyżej 100 000 PLN';	
			}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $kwota i $lat są liczbami całkowitymi
	if (! is_numeric( $kwota )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $lat )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$kwota,&$lat,&$procenty,&$messages,&$result){
	global $role;
	
	//konwersja parametrów na int
	$kwota = intval($kwota);
	$lat = intval($lat);
	$procenty = doubleval($procenty);
	
	// 		if ($role == 'admin'){
	// 			$result = $kwota - $lat;
	// 		} else {
	// 			$messages [] = 'Tylko administrator może odejmować !';
	// 		}
	
	$proc = $procenty * 0.01;
	$proc = $proc * $lat;
	$oprocentowanie = $proc * $kwota;
	$result = ($oprocentowanie + $kwota) / 12;
}

//definicja zmiennych kontrolera
$kwota = null;
$lat = null;
$procenty = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($kwota,$lat,$procenty);
if ( validate($kwota,$lat,$procenty,$messages) ) { // gdy brak błędów
	process($kwota,$lat,$procenty,$messages,$result);
}

// Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$kwota,$lat,$procenty,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';