<?php
require_once("../controllers/ClientController.php");
require_once("../models/VideoConversion.php");
require_once("../../Client/awsClient.php");

class VideoController {
	function getAll() {
		$videos = new VideoConversion();
		return $videos->getAll();
	}

	function getAllFromClient($licenseNumber) {
		$client = new ClientController();
		$client = $client->getClient($licenseNumber);
		if (!is_null($client)) {
			$videos = new VideoConversion();
			return $videos->getAllFromClient($client['clientID']);
		} else {
			return "Invalid license number";
		}
	}

	function insert($data) {
		$client = new ClientController();
		$client = $client->getClient($data['licenseNumber']);

		if (is_null($client)) {
			return "Invalid license number";
		}

		$targetFile = basename($data['file']);
		$targetPath = $data['file'];

		$newFilename = pathinfo($targetFile, PATHINFO_FILENAME) . "." . $data['targetFormat'];
		$outputPath = "C:\\xampp\htdocs\WebServicesProject\Converter\output" . DIRECTORY_SEPARATOR . $newFilename;

		$video = new VideoConversion();
		$video->clientID = $client['clientID'];
		$video->requestDate = date('Y-m-d H:i:sP');
		$video->originalFormat = $data['originalFormat'];
		$video->targetFormat = $data['targetFormat'];
		$video->file = $targetFile;

		exec('C:\ffmpeg -i '.$targetPath.' '.$outputPath, $out, $res);

		if($res != 0) {
			error_log(var_export($out, true));
			error_log(var_export($res, true));
			return "Error!! video not converted";
		} else {					
			// Save record to database
			$video->outputFile = $outputPath;
			$video->completionDate = date('Y-m-d H:i:sP');
			$video->insert();

			$aws = new AWSClient();
			if ($aws->upload($newFilename, $outputPath) == "200") {
				return array('key' => $newFilename, 'path' => $outputPath);
			} else {
				return "Error!! File not uploaded";
			}
			// $aws = new AWSClient();
			// $aws->upload($newFilename, $targetPath);
			// return $aws->download($newFilename);
		}
	}

	function delete($conversionID) {
		$video = new VideoConversion();
		$video->conversionID = $conversionID;
		$video->delete();
		return "Video successfully deleted";
	}

	function deleteWithLicense($licenseNumber) {
		$client = new ClientController();
		$client = $client->getClient($licenseNumber);

		if (!is_null($client)) {
			$videos = new VideoConversion();
			$videos->clientID = $client['clientID'];
			$videos->deleteAll();
		} else {
			return "Invalid license number";
		}
	}
}
