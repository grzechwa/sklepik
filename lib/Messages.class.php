<?php
class Messages {
	private $errors = array ();
	private $infos = array ();
	private $num = 0;
        private $products = array ();

	public function addError($message) {
		$this->errors[] = $message;
		$this->num ++;
	}

	public function addInfo($message) {
		$this->infos[] = $message;
		$this->num ++;
	}

	public function isEmpty() {
		return $this->num == 0;
	}
	
	public function isError() {
		return count ( $this->errors ) > 0;
	}
	
	public function isInfo() {
		return count ( $this->infos ) > 0;
	}
	
	public function getErrors() {
		return $this->errors;
	}
	
	public function getInfos() {
		return $this->infos;
	}
        
        public function getProducts($name) {
            // Connecting, selecting database
$link = mysql_connect('localhost:3306', 'root', '')
    or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('projekt_sklep') or die('Could not select database');

// Performing SQL query
$query = "SELECT * FROM towar WHERE nazwa like '$name%' LIMIT 10";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    array_push($this->products, $line);
}

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);

		return $this->products;
	}
	
	public function clear() {
		$this->errors = array ();
		$this->infos = array ();
		$this->num = 0;
		$this->error = false;
	}
}