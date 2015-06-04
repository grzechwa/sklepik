<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/app/db/ManageDb.class.php';
require_once $conf->root_path.'/app/security/LoginForm.class.php';
/** userDAO (metody do wykonywania zapytań dot. userów)
 * @author Łukasz S
 *
 */
class UserDAO {
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
    
    public function get($login, $haslo) {
        $this->db->connect();
        $hasloMd5=  md5($haslo);
        $select = "SELECT user.login AS login, user.haslo AS haslo";
        $from = " FROM user";
        $join = null;
        $where = " WHERE login like '$login' AND haslo like '$hasloMd5'";
        $orderBy = " order by user.login";
        
        $sql = $select.$from.$join.$where.$orderBy;

        $conn = $this->db->getConn();
        $result = mysqli_query($conn,$sql);
        $this->db->disconnect();
        return $result;
    }
    
    public function exists($login) {
        $this->db->connect();
        $select = "SELECT *";
        $from = " FROM user";
        $join = null;
        $where = " WHERE login like '$login'";
        $orderBy = null;
        
        $sql = $select.$from.$join.$where.$orderBy;

        $conn = $this->db->getConn();
        $result = mysqli_query($conn,$sql);
        $this->db->disconnect();
        return $result;
    }
    
    
        
    
    public function add($loginForm, $id_klient) {
        $this->db->connect();
        $insert = "INSERT INTO";
        $into = " user";
        $rows = " (login, haslo, id_klient)";
        $login = $loginForm->login;
        $haslo = $loginForm->password;
        $haslo = md5($haslo);
        $values = " VALUES ('".$login."', '".$haslo."', ".$id_klient." );";
        $sql = $insert.$into.$rows.$values;

        $conn = $this->db->getConn();
        $result = mysqli_query($conn,$sql);
        $this->db->disconnect();
        return $result;
    }
}