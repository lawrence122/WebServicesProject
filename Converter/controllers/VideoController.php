<?php
require_once("../models/Client.php");
require_once("../models/VideoConversion.php");

class VideoController {
	function getAll() {
		$videos = new VideoConversion();
		return $videos->getAll();
	}

	function getAllFromClient($clientID) {
		$videos = new VideoController();
		return $videos->getAllFromClient($clientID);
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

		$video = new VideoConversion();
		$video->clientID = $client['clientID'];
		$video->requestDate = date('Y-m-d H:i:sP');
		$video->originalFormat = $data['originalFormat'];
		$video->targetFormat = $data['targetFormat'];
		$video->file = $targetFile;

		exec('C:\ffmpeg -y -i '.$targetPath.' -c:v libx264 -c:a aac -pix_fmt yuv420p -movflags faststart -hide_banner '.$outputPath.' 2>&1', $out, $res);

		if($res != 0) {
			error_log(var_export($out, true));
			error_log(var_export($res, true));
			return "Error video not converted";
		} else {					
			// Save record to database
			$video->outputFile = $outputPath;
			$video->completionDate = date('Y-m-d H:i:sP');
			$video->insert();
			return "Video successfully converted";
		}
	}
}
