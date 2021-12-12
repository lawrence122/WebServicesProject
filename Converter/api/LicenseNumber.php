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

        return $licenseNumber;
    }
}
?>