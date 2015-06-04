<?php
require_once dirname(__FILE__).'/../../config.php';
// 1. pobranie parametrów

$login = $_REQUEST ['login'];
$pass = $_REQUEST ['pass'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($login) && isset($pass))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji !';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $login == "") {
	$messages [] = 'Nie podano loginu';
}
if ( $pass == "") {
	$messages [] = 'Nie podano hasła';
}

//zakładamy że logowanie niepoprawne - mniej kodu
$error = true;

//nie ma sensu walidować dalej, gdy brak parametrów
if (count ( $messages ) == 0) {

	// sprawdzenie, czy dane logowania poprawne
	// (takie informacje najczęściej przechowuje się w bazie danych)
	if ($login == "admin" && $pass == "admin") {
		$error = false;
		session_start();
		$_SESSION['isLogged'] = 'admin';
	} else if ($login == "user" && $pass == "user") {
		$error = false;
		session_start();
		$_SESSION['isLogged'] = TRUE;
	} else {
		$messages [] = 'Niepoprawny login lub hasło';
	} 
} 

if ($error) { //błąd logowania
	include _ROOT_PATH.'/app/security/login_view.php';
} else { //ok przekieruj lub "forward" na stronę główną
	//redirect
	header("Location: "._APP_URL);
	//"forward"
	//include _ROOT_PATH.'/index.php';
}
