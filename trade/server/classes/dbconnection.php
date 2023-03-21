<?php
class DbConnection {
	private $host = "localhost";
	private $dbname = "globalfxp_db";
	private $username = "globalfxp_db";
	private $password = "G6bJQQ5SQ1sE";
	public $connection;

	public function __construct() {
		try {
			$this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
		} catch(PDOException $ex) {
			echo $ex->getMessage();
		}
	}
}
?>