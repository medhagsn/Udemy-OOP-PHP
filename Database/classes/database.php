<?php
class Database{
	private $host	= 'localhost';
	private $user	= 'root';
	private $pass	= '';
	private $dbname	= 'myblog';

	private $dbh;
	private $error;
	private $stmt;

	// public function __construct(){
	// 	// Set DSN
	// 	$dsn = 'mysql:host='. $this->host . ';dbname='. $this->dbname;
	// 	// Set Options
	// 	$options = array(
	// 		PDO::ATTR_PERSISTENT		=> true,
	// 		PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION
	// 	);

    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );
        $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);

		// Create new PDO
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		} catch(PDOException $e){
			$this->error = $e->getMessage();
		}
	}
  
	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
					default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		return $this->stmt->execute();
	}

	public function lastInsertId(){
		$this->dbh->lastInsertId();
	}

	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}