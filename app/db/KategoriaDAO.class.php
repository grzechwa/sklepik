<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/app/db/ManageDb.class.php';

/** towarDAO (metody do wykonywania zapytań dot. towarów)
 * @author Łukasz S
 *
 */
class KategoriaDAO {
    private $db;
        
	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
    public function __construct(){
        $this->db = new ManageDb();

    }
    /** 
     * Pobranie listy kategorii
     */
    
    public function get() {
        $this->db->connect();
        $select = "SELECT *";
        $from = " FROM kategoria";
        $join = NULL;
        $where = null;
        $orderBy = " order by nazwa";
        
        $sql = $select.$from.$join.$where.$orderBy;

        $conn = $this->db->getConn();
        $result = mysqli_query($conn,$sql);
        $this->db->disconnect();
        return $result;
    }
}