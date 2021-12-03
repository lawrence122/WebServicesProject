<?php
namespace App\models;

class FileConversion extends \App\core\Model{

	public function __construct(){
		parent::__construct();
	}

	public function find($conversionID){
		$stmt = self::$connection->prepare("SELECT * FROM fileconversion WHERE conversionID=:conversionID");
		$stmt->execute(['conversionID'=>$conversionID]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\FileConversion");
		return $stmt->fetch();
	}

	public function getAll(){
		$stmt = self::$connection->prepare("SELECT * FROM fileconversion");
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\FileConversion");
		return $stmt->fetchAll();
	}

	public function getAllFromClient($clientID){
		$stmt = self::$connection->prepare("SELECT * FROM fileconversion WHERE clientID=:clientID");
		$stmt->execute(['clientID'=>$clientID]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\FileConversion");
		return $stmt->fetchAll();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO fileconversion(clientID, requestDate, 
											completionDate, originalFormat, targetFormat, file, outputFile) 
											VALUES (:clientID, :requestDate, 
											:completionDate, :originalFormat, :targetFormat, :file, :outputFile)");
		return $stmt->execute(['clientID'=>$this->clientID, 'requestDate'=>$this->requestDate, 
								'completionDate'=>$this->completionDate, 'originalFormat'=>$this->originalFormat, 
								'targetFormat'=>$this->targetFormat, 'file'=>$this->file, 'outputFile'=>$this->outputFile]);		
	}
}