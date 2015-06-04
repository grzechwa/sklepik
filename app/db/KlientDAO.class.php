<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/app/db/ManageDb.class.php';
require_once $conf->root_path.'/app/security/LoginForm.class.php';
/** userDAO (metody do wykonywania zapytań dot. userów)
 * @author Łukasz S
 *
 */
class KlientDAO {
    private $db;
        
	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
    public function __construct(){
        $this->db = new ManageDb();

    }
    /** 
     * Pobranie listy userów
     * param string $nazwa
     * param string $kategoria
     * @return qureryDB
     */
    
    public function get() {
        $this->db->connect();
        $select = "SELECT *";
        $from = " FROM klient";
        $join = null;
        $where = null;
        $orderBy = " order by user.login";
        
        $sql = $select.$from.$join.$where.$orderBy;

        $conn = $this->db->getConn();
        $result = mysqli_query($conn,$sql);
        $this->db->disconnect();
        return $result;
    }
    public function getKlient($form) {
        $this->db->connect();
        $select = "SELECT *";
        $from = " FROM klient";
        $name = $form->name;
        $surname = $form->surname;
        $email = $form->email;
        $join = null;
        $where = " WHERE imie like '$name' AND nazwisko like '$surname' AND e_mail like '$email'";
        $orderBy = null;

        $sql = $select.$from.$join.$where.$orderBy;

        $conn = $this->db->getConn();
        $result = mysqli_query($conn,$sql);
        $this->db->disconnect();
        return $result;
    }
    
    public function add($form) {
        $this->db->connect();
        $insert = "INSERT INTO";
        $into = " klient";
        $rows = " (imie, nazwisko, kod, miejscowosc, ulica, nr_domu, nr_mieszkania, e_mail, data_urodzenia)";
        $name = $form->name;
        $surname = $form->surname;
        $postcode = $form->postcode;
        $city = $form->city;
        $street = $form->street;
        $streetNo = $form->streetNo;
        $appartmentNo = $form->appartmentNo;
        $email = $form->email;
        $birthdate = $form->birthdate;
        $values = " VALUES ('".$name."', '".$surname."', ".$postcode.", '".$city."', '".$street."', ".$streetNo.", '".$appartmentNo."', '".$email."', '".$birthdate."' );";
        $sql = $insert.$into.$rows.$values;

        $conn = $this->db->getConn();
        $result = mysqli_query($conn,$sql);
        $this->db->disconnect();
        return $result;
    }
}