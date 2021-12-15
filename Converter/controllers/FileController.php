<?php
require_once("../controllers/ClientController.php");
require_once("../models/FileConversion.php");

class FileController {
	function getAll() {
		$files = new FileConversion();
		return $files->getAll();
	}

	function getAllFromClient($licenseNumber) {
		$client = new ClientController();
		$client = $client->getClient($licenseNumber);
		if (!is_null($client)) {
			$files = new FileConversion();
			return $files->getAllFromClient($client['clientID']);
		} else {
			return "Invalid license number";
		}
	}

	function insert($data) {
		$client = new ClientController();
		$client = $client->getClient($data['licenseNumber']);

		if (is_null($client)) {
			return "Invalid license key";
		}

		$targetFile = basename($data['file']);
		$targetPath = $data['file'];

		$newFilename = pathinfo($targetFile, PATHINFO_FILENAME) . "." . $data['targetFormat'];
		$outputPath = "C:\\xampp\htdocs\WebServicesProject\Converter\output" . DIRECTORY_SEPARATOR . $newFilename;

		$file = new FileConversion();
		$file->clientID = $client['clientID'];
		$file->requestDate = date('Y-m-d H:i:sP');
		$file->originalFormat = $data['originalFormat'];
		$file->targetFormat = $data['targetFormat'];
		$file->file = $targetFile;

		if (strtolower($data['targetFormat']) == "pdf") {
			exec('C:\pandoc ' . $targetPath . " -o " . $outputPath . " --pdf-engine C:\wkhtmltopdf");
		} else {
			exec('C:\pandoc ' . $targetPath . " -o " . $outputPath);
		}

		$file->outputFile = $outputPath;
		$file->completionDate = date('Y-m-d H:i:sP');
		$file->insert();
		return "File successfully converted";
	}
}
