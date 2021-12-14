<?php
require_once("../models/Client.php");
require_once("../models/FileConversion.php");

class FileController {
	function getAll() {
		$videos = new FileConversion();
		return $videos->getAll();
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

		$video = new FileConversion();
		$video->clientID = $client['clientID'];
		$video->requestDate = date('Y-m-d H:i:sP');
		$video->originalFormat = $data['originalFormat'];
		$video->targetFormat = $data['targetFormat'];
		$video->file = $targetFile;

		if (strtolower($data['targetFormat']) == "pdf") {
			exec('C:\pandoc ' . $targetPath . " -o " . $outputPath . " --pdf-engine C:\wkhtmltopdf");
		} else {
			exec('C:\pandoc ' . $targetPath . " -o " . $outputPath);
		}

		$video->outputFile = $newFilename;
		$video->completionDate = date('Y-m-d H:i:sP');
		$video->insert();
		return "File successfully converted";
	}
}
