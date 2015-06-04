<?php
//require_once $conf->root_path.'/config.php';


class manageDb {
    private $url;
    private $name;
    private $username;
    private $password;
    private $conn;
    
    public function __construct() {
        if (isset($conf)) {
            $this->url = $conf->db_url;
        $this->name = $conf->db_name;
        $this->username = $conf->db_username;
        $this->password = $conf->db_password;
        $this->conn = null;
        }
    }
    //return boolean
    public function connect () {
        // Create connection
        $this->conn = new mysqli('localhost:3306', 'root', '', 'projekt_sklep');
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
            $this->conn = null;
            return false;
        }
        //poniższa linia to ustalenie kodowania znakow, w jakim php ma się komunikować z mysql
        //ponieważ w mysql jest ustawione utf8, to tu też trzeba ustawić utf8
        $this->conn->set_charset("utf8");
        return true;
    }
    
    public function disconnect () {
        if ($this->conn != null) {
            $this->conn->close();
        }
    }
    
    public function getConn() {
        return $this->conn;
    }
}
?>