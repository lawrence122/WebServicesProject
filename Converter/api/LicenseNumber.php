<?php

class LicenseNumber {
    function generateLicenseNumber()
    {
        $licenseNumberLength = 10;
        $characters = '0123456789';
        $licenseNumber = "";

        for ($idx = 0; $idx < $licenseNumberLength; $idx++) {
            $licenseNumber .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $this->checkLicense($licenseNumber);
    }

    function checkLicense($licenseNumber)
	{
		$c = new ClientController();
		$client = $c->getClient($licenseNumber);
		while (!is_null($client)) {
			$licenseNumber = new LicenseNumber();
			$licenseNumber = $licenseNumber->generateLicenseNumber();
			$client = $c->getClient($licenseNumber);
		}
        echo "Valid License number: " . $licenseNumber . "<br>";
		return $licenseNumber;
	}
}
?>