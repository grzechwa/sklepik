<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/security/RegisterForm.class.php';
require_once $conf->root_path.'/app/security/RegisterResult.class.php';
require_once $conf->root_path.'/app/db/KlientDAO.class.php';
require_once $conf->root_path.'/app/db/UserDAO.class.php';
/** Kontroler logowania
 * @author Łukasz S
 *
 */

session_start();
$isLogged=$_SESSION['isLogged'];

class RegisterCtrl {

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
		$this->form = new RegisterForm();
		$this->result = new RegisterResult();
		$this->hide_intro = true;

	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
            $this->form->login = $_REQUEST ['login'];
            $this->form->password = $_REQUEST ['password'];
            $this->form->name = $_REQUEST ['name'];
            $this->form->surname = $_REQUEST ['surname'];
            $this->form->postcode = $_REQUEST ['postcode'];
            $this->form->city = $_REQUEST ['city'];
            $this->form->street = $_REQUEST ['street'];
            $this->form->streetNo = $_REQUEST ['streetNo'];
            $this->form->appartmentNo = $_REQUEST ['appartmentNo'];
            $this->form->email = $_REQUEST ['email'];
            $this->form->birthdate = $_REQUEST ['birthdate'];

	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
            // sprawdzenie, czy nie jest to pierwsze otwarcie widoku - wtedy walidacja=false i wyświetlam pusty formularz
            if ((is_null ( $this->form->login ) && is_null ( $this->form->password ) && is_null ( $this->form->name ))) {
                return false;
            }
            else {
                //1. czy wybrany login jest wolny
                $user = new UserDAO();
                $tmp = $user->exists($this->form->login);
                if ($tmp->num_rows >= 1) {
                    $this->msgs->addError("Podany login jest zajęty - wybierz inny login");
                }
                unset($tmp);
                
                //2. czy hasło ma co najmniej 6 znaków
                if (strlen($this->form->password) < 6) {
                    $this->msgs->addError("Hasło musi mieć co najmniej 6 znaków");
                }
                //3. czy kod pocztowy ma właściwy format
                if (! preg_match('/[0-9]{2}\-[0-9]{3}/', $this->form->postcode) ) {
                    $this->msgs->addError("Podano nieprawidłowy kod pocztowy");
                }
                //4. czy data urodzenia jest poprawna
                if ((DateTime::createFromFormat('Y-m-d', $this->form->birthdate))==FALSE) {
                    $this->msgs->addError("Podano złą datę");
                    
                } else {
                    $month =intval(substr($this->form->birthdate, 5,2));
                    $day=intval(substr($this->form->birthdate, 8,2));
                    $year=intval(substr($this->form->birthdate, 0,4));
                    if ($isOk = checkdate($month, $day, $year) == false) {
                        $this->msgs->addError("Wybrana data nie istnieje");
                    }
                }
               
            }
            
            return ! $this->msgs->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
			//wykonanie operacji
                    $tmp = new KlientDAO();
                    $res = $tmp->add($this->form);
                    if ($res == 0) {
                        $this->msgs->addError("Nie udało się dodać zarejestrować - spróbuj ponownie");
                    }
                    else {
                        $this->msgs->addInfo('Gratulacje - udało się zarejestrować!');
                        //tworzenie nowego usera
                        //1. pobranie dodanego klienta
                        $client = $tmp->getKlient($this->form);
                        //2. wyciągnięcie id klienta
                        $row = mysqli_fetch_assoc($client);
                        $idString = $row['id_klient'];
                        $id = intval($idString);
                        //3. dodanie usera
                        $user = new UserDAO();
                        $user->add($this->form, $id);

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
		
		$smarty->display($conf->root_path.'/app/security/RegisterView.tpl');
	}

}
