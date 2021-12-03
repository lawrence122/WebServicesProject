<?php
namespace App\models;

class VideoConversion extends \App\core\Model{

	public function __construct(){
		parent::__construct();
	}

	public function find($conversionID){
		$stmt = self::$connection->prepare("SELECT * FROM videoconversion WHERE conversionID=:conversionID");
		$stmt->execute(['conversionID'=>$conversionID]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\VideoConversion");
		return $stmt->fetch();
	}

	public function getAll(){
		$stmt = self::$connection->prepare("SELECT * FROM videoconversion");
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\VideoConversion");
		return $stmt->fetchAll();
	}

	public function getAllFromClient($clientID){
		$stmt = self::$connection->prepare("SELECT * FROM videoconversion WHERE clientID=:clientID");
		$stmt->execute(['clientID'=>$clientID]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\VideoConversion");
		return $stmt->fetchAll();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO videoconversion(clientID, requestDate, 
											completionDate, originalFormat, targetFormat, file, outputFile) 
											VALUES (:clientID, :requestDate, 
											:completionDate, :originalFormat, :targetFormat, :file, :outputFile)");
		return $stmt->execute(['clientID'=>$this->clientID, 'requestDate'=>$this->requestDate, 
								'completionDate'=>$this->completionDate, 'originalFormat'=>$this->originalFormat, 
								'targetFormat'=>$this->targetFormat, 'file'=>$this->file, 'outputFile'=>$this->outputFile]);		
	}
}