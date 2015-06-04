<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/security/LoginForm.class.php';
require_once $conf->root_path.'/app/security/LoginResult.class.php';
require_once $conf->root_path.'/app/db/UserDAO.class.php';
/** Kontroler logowania
 * @author Łukasz S
 *
 */

session_start();
$isLogged=$_SESSION['isLogged'];

class LoginCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $hide_intro; //zmienna informująca o tym czy schować intro
        
	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new LoginForm();
		$this->result = new LoginResult();
		$this->hide_intro = true;

	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
            $this->form->login = $_REQUEST ['login'];
            $this->form->password = $_REQUEST ['password'];

	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane

		return ! $this->msgs->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {

			//wykonanie operacji
			
		}
		if ($this->form->login != null) {
                    $user = new UserDAO();
                    $tmp = $user->get($this->form->login, $this->form->password);
                    if ($tmp->num_rows == 1) {
                        $this->msgs->addInfo('Gratulacje - udało się zalogować!');
                        session_start();
                        $_SESSION['isLogged'] = TRUE;
                    }
                    else {
                        $this->msgs->addError("Podano nieprawidłowy login/hasło");
                    }
                    $this->products = $res;
                }
		$this->generateView();
	}
	
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Sklepik internetowy');
		$smarty->assign('page_description','Projekt systemu - sklep internetowy');
		$smarty->assign('page_header','Logowanie/Rejestracja');
				
		$smarty->assign('hide_intro',$this->hide_intro);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
                $smarty->assign('isLogged', $_SESSION['isLogged']);
		
		$smarty->display($conf->root_path.'/app/security/LoginView.tpl');
	}

}
