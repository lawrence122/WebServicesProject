<?php
require_once("../core/Model.php");

class FileConversion {

	public function __construct(){
		$this->Model = new Model();
	}

	public function find($conversionID){
		$stmt = $this->Model::$connection->prepare("SELECT * FROM fileconversion WHERE conversionID=:conversionID");
		$stmt->execute(['conversionID'=>$conversionID]);
		return $stmt->fetch();
	}

	public function getAll(){
		$stmt = $this->Model::$connection->prepare("SELECT * FROM fileconversion");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllFromClient($clientID){
		$stmt = $this->Model::$connection->prepare("SELECT * FROM fileconversion WHERE clientID=:clientID");
		$stmt->execute(['clientID'=>$clientID]);
		return $stmt->fetchAll();
	}

	public function insert(){
		$stmt = $this->Model::$connection->prepare("INSERT INTO fileconversion(clientID, requestDate, 
											completionDate, originalFormat, targetFormat, file, outputFile) 
											VALUES (:clientID, :requestDate, 
											:completionDate, :originalFormat, :targetFormat, :file, :outputFile)");
		return $stmt->execute(['clientID'=>$this->clientID, 'requestDate'=>$this->requestDate, 
								'completionDate'=>$this->completionDate, 'originalFormat'=>$this->originalFormat, 
								'targetFormat'=>$this->targetFormat, 'file'=>$this->file, 'outputFile'=>$this->outputFile]);		
	}
}