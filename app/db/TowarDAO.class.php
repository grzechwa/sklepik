<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/app/db/ManageDb.class.php';

/** towarDAO (metody do wykonywania zapytań dot. towarów)
 * @author Łukasz S
 *
 */
class towarDAO {
    private $db;
        
	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
    public function __construct(){
        $this->db = new ManageDb();

    }
    /** 
     * Pobranie listy towarów
     * param string $nazwa
     * param string $kategoria
     * @return qureryDB
     */
    
    public function get($nazwa, $kategoria) {
        $this->db->connect();
        $select = "SELECT towar.nazwa AS nazwaTowaru, opis AS opisTowaru, cena AS cenaTowaru, kategoria.nazwa AS kategoriaTowaru";
        $from = " FROM towar";
        $join = " INNER JOIN kategoria ON towar.id_kategoria = kategoria.id_kategoria";
        $where = null;
        $orderBy = " order by towar.nazwa";
        //sprawdzenie czy pobrać całą listę towarów czy takie o konkretnej nazwie i kategorii
        if ($nazwa != null) {
            $where.=" WHERE towar.nazwa like '$nazwa%'";
            if ($kategoria != null && $kategoria != -1) {
            $where.=" AND towar.id_kategoria=$kategoria";
            }
        }
        elseif ($kategoria != null && $kategoria != -1) {
        $where.=" WHERE towar.id_kategoria=$kategoria";
        }
        $sql = $select.$from.$join.$where.$orderBy;

        $conn = $this->db->getConn();
        $result = mysqli_query($conn,$sql);
        $this->db->disconnect();
        return $result;
    }
}