<?php
    require("../../vendor/autoload.php");

    $s3 = new Aws\S3\S3Client([
        'region'  => 'us-east-1',
        'version' => 'latest',
        'credentials' => [
            'key'    => "",
            'secret' => "",
        ]
    ]);

    $bucket = '';
    $key = 'Example.mp4';

    // Upload video
    // $result = $s3->putObject([
    //     'Bucket' => $bucket,
    //     'Key'    => $key,
    //     'Body'   => 'this is the body!',
    //     'SourceFile' => 'C:\xampp\htdocs\Lab11\Input\Example.mp4' // -- use this if you want to upload a file from a local location
    // ]);
    
    // $result = $result->toArray();
    // var_dump($result);
    // echo "<br>";
    // echo "Status Code: " . $result["@metadata"]["statusCode"] . "<br>";

    // Download video
    $result = $s3->getObject([
        'Bucket' => $bucket,
        'Key'    => $key,
        'SaveAs' => 'C:\\xampp\htdocs\Lab11\output' . DIRECTORY_SEPARATOR . $key
    ]);

    // Link
    $cmd = $s3->getCommand('GetObject', [
        'Bucket' => $bucket,
        'Key' => $key
    ]);
    
    $request = $s3->createPresignedRequest($cmd, '+1 minutes');
    echo "<a href='".(string)$request->getUri()."' download> Click here to download</a>";
?>