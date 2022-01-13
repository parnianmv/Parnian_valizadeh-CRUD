<?php

namespace CRUD\Helper;

class DBConnector
{

    /** @var mixed $db */
    private $db;
	private $username ;
	private $password;
	private $servername;
	private $firstTime;
	
    public function __construct($servername = "localhost",$username = "root", $password = "")
    {
		$this->servername = $servername;
		$this->username = $username;
		$this->password = $password;	
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function connect() : void
    {
		if($this->firstTime){
			$this->db = mysqli_connect($this->servername, $this->username, $this->password);
			if(!$this->db) {
			  die("Connection failed: " . mysqli_connect_error());
			}else{
				try{
					$sql = "CREATE DATABASE myDB";
					mysqli_query($this->db, $sql);
					$this->db = mysqli_connect($this->servername, $this->username, $this->password, "myDB");
					$sql = "CREATE TABLE Person (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					firstname VARCHAR(30) NOT NULL,
					lastname VARCHAR(30) NOT NULL,
					username VARCHAR(50) NOT NULL
					)";

					if ($this->db->query($sql) === FALSE) {
						//$this->exceptionHandler("Error creating table: " . $this->db->error);
					} 
				}catch(\Exception $e){
					$this->exceptionHandler($e->getMessage());
				}
			}
			$this->firstTime = false;
		}else{
			$this->db = mysqli_connect($this->servername, $this->username, $this->password, "myDB");
		}
    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query) 
    {
        return $this->db->query($query);
    }

    /**
     * @param string $message
     * @throws \Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {
		echo $message;
    }
	
	public function setFirstTime($first){
		$this->firstTime = $first;	
	}
}