<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$kwota = $_REQUEST ['kwota'];
$lat = $_REQUEST ['lata'];
$procenty = $_REQUEST ['proc'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwota) && isset($lat) && isset($procenty))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $kwota == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $procenty == "") {
	$messages [] = 'Nie podano oprocentowania';
}
if ( $lat == "") {
	$messages [] = 'Nie podano liczby lat';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $kwota i $lat są liczbami całkowitymi
	if (! is_numeric( $kwota )) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}

	if (! is_numeric( $procenty ) || $procenty <= 0) {
		$messages [] = 'Oprocentowanie źle podane';
	}
	
	if (! is_numeric( $lat )) {
		$messages [] = 'Ilość lat nie jest liczbą całkowitą';
	}	

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$kwota = intval($kwota);
	$procenty = doubleval($procenty);
	$lat = intval($lat);
	
	//wykonanie operacji
	$proc = $procenty * 0.01;
	$proc = $proc * $lat;
	$oprocentowanie = $proc * $kwota;
	$result = ($oprocentowanie + $kwota) / 12;
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$kwota,$lat,$procenty,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';