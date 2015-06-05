<?php
// Skrypt kontrolera głównego uruchamiający określoną
// akcję użytkownika na podstawie przekazanego parametru

//każdy punkt wejścia aplikacji (skrypt uruchamiany bezpośrednio przez klienta) musi dołączać konfigurację
require_once dirname (__FILE__).'/../config.php';

//0. rozpocznij sesję (lub podłącz się do istniejącej) i pobierz rolę

//1. pobierz nazwę akcji
$action = $_REQUEST['action'];

//2. wykonanie akcji
switch ($action) {
	default : // 'shopView'
	    // załaduj definicję kontrolera
		include_once $conf->root_path.'/app/shop/ShopCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new ShopCtrl ();
		//$ctrl->generateView ();
                $ctrl->process();
	break;
	case 'shopSearch' :
		// załaduj definicję kontrolera
		include_once $conf->root_path.'/app/shop/ShopCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new ShopCtrl ();
		$ctrl->process ();
	break;
	case 'doLogin' :
		include_once $conf->root_path.'/app/security/LoginCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new LoginCtrl ();
		$ctrl->process ();
	break;
	case 'doRegister' :
		include_once $conf->root_path.'/app/security/RegisterCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new RegisterCtrl ();
		$ctrl->process ();
        break;
	case 'doLogout' :
                session_start();
                $_SESSION['isLogged'] = null;
                //session_destroy();
		include_once $conf->root_path.'/app/shop/ShopCtrl.class.php';
		$ctrl = new ShopCtrl ();
                $ctrl->process();
	break;
	case 'zamow' :
		include_once $conf->root_path.'/app/order/OrderShopCtrl.class.php';
		$ctrl = new OrderShopCtrl ();
                $ctrl->process();
	break;
}
