<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/shop/ShopForm.class.php';
require_once $conf->root_path.'/app/shop/ShopResult.class.php';
require_once $conf->root_path.'/app/db/TowarDAO.class.php';
require_once $conf->root_path.'/app/db/KategoriaDAO.class.php';
/** Kontroler sklepu
 * @author Łukasz S
 *
 */
session_start();
$isLogged=$_SESSION['isLogged'];

class ShopCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do wyszukania produktów i dla widoku)
	private $result; //inne dane dla widoku
        private $search; // informacja o tym jak wyszukać produkty w bazie
        private $hide_intro;
        private $products; //produkty do wyświetlenia w tabeli
        private $categories; //lista wszystkich kategorii
        
        

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new ShopForm();
		$this->result = new ShopResult();
                $this->hide_intro = false;
                $this->products = array();
                $this->categories = array();

	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->name = $_REQUEST ['name'];
		$this->form->category = $_REQUEST ['category'];
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->name ) && isset ( $this->form->category ) )) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - i user nic nie wyszuka

                    $this->search = 1;
                    
		}
		
		else   {
                    $this->hide_intro = true; //przyszły pola formularza - schowaj wstęp
		}
		return ! $this->msgs->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
			//konwersja id kategorii na int
                    //$this->form->category = intval($this->form->category);
                    $this->msgs->addInfo('Parametry poprawne.');

                    $this->msgs->addInfo('Pobrano dane z bazy');
                    $tmp = new TowarDAO();
                    $res = $tmp->get($this->form->name, intval($this->form->category));
                    $this->products = $res;
		}
                $cat = new KategoriaDAO();
                $this->categories = $cat->get();
                
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
		$smarty->assign('page_header','Strona głowna');
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
                $smarty->assign('hide_intro',$this->hide_intro);
		$smarty->assign('products',$this->products);
                $smarty->assign('categories',$this->categories);
                $smarty->assign('isLogged', $_SESSION['isLogged']);
		
		$smarty->display($conf->root_path.'/app/shop/ShopView.tpl');
	}

}
