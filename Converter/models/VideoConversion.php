<?php
require_once("../core/Model.php");

class VideoConversion {

	public function __construct(){
		$this->Model = new Model();
	}

	public function find($conversionID){
		$stmt = $this->Model::$connection->prepare("SELECT * FROM videoconversion WHERE conversionID = :conversionID");
		$stmt->execute(['conversionID'=>$conversionID]);
		return $stmt->fetch();
	}

	public function getAll(){
		$stmt = $this->Model::$connection->prepare("SELECT * FROM videoconversion");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllFromClient($clientID){
		$stmt = $this->Model::$connection->prepare("SELECT * FROM videoconversion WHERE clientID = :clientID");
		$stmt->execute(['clientID'=>$clientID]);
		return $stmt->fetchAll();
	}

	public function insert(){
		$stmt = $this->Model::$connection->prepare("INSERT INTO videoconversion(clientID, requestDate, 
											completionDate, originalFormat, targetFormat, file, outputFile) 
											VALUES (:clientID, :requestDate, 
											:completionDate, :originalFormat, :targetFormat, :file, :outputFile)");
		return $stmt->execute(['clientID'=>$this->clientID, 'requestDate'=>$this->requestDate, 
								'completionDate'=>$this->completionDate, 'originalFormat'=>$this->originalFormat, 
								'targetFormat'=>$this->targetFormat, 'file'=>$this->file, 'outputFile'=>$this->outputFile]);		
	}

	public function delete() {
		$stmt = $this->Model::$connection->prepare("DELETE from videoconversion WHERE conversionID = :conversionID");
		$stmt->execute(['conversionID'=>$this->conversionID]);
	}

	public function deleteAll() {
		$stmt = $this->Model::$connection->prepare("DELETE from videoconversion WHERE clientID = :clientID");
		$stmt->execute(['clientID'=>$this->clientID]);
	}
}