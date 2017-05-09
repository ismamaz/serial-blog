<?php

class Database{


	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;


	public function __construct($db_name, $db_user = 'root', $db_pass='flingualelas&', $db_host='localhost'){

		$this->db_name = $db_name;
		$this->db_user=$db_user;
		$this->db_pass=$db_pass;
		$this->$db_host=$db_host;
	}

	public function getPDO(){

		if($this->pdo === null){

			$pdo = new PDO('mysql:dbname=BigBlog;host=localhost;charset=utf8','root', 'flingualelas&');

			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
			return $this->pdo;
		
	}

// Fonction Query

	public function query($statement){

		$req= $this->getPDO()->query($statement);
		$donnees=$req->fetchAll();
		return $donnees;
	}


//Fonction Execute

	public function execute($statement, $array){
		$req=$this->getPDO()->prepare($statement);

		$req->execute($array);

		$donnees=$req->fetchAll();
		return $donnees;
	}



}


?>