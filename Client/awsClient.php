<?php
    require("../../vendor/autoload.php");
    class AWSClient {
        function __construct() {
            $this->s3 = new Aws\S3\S3Client([
                'region'  => 'us-east-1',
                'version' => 'latest',
                'credentials' => [
                    'key'    => "",
                    'secret' => "",
                ]
            ]);
            $this->bucket = "cnkbucket";
        }

        function upload($key, $source) {
            // Upload video
            $result = $this->s3->putObject([
                'Bucket' => $this->bucket,
                'Key'    => $key,
                'Body'   => 'this is a body',
                'SourceFile' => $source
            ]);
            return $result["@metadata"]["statusCode"];
        }

        // Download video
        function download($key,$saveAs) {
            //Downloads
            $result = $this->s3->getObject([
                'Bucket' => $this->bucket,
                'Key'    => $key,
                'SaveAs' => $saveAs . DIRECTORY_SEPARATOR . $key
            ]);

            // Link
            $cmd = $this->s3->getCommand('GetObject', [
                'Bucket' => $this->bucket,
                'Key' => $key
            ]);
            
            $request = $this->s3->createPresignedRequest($cmd, '+5 minutes');
            return "<a href='".(string)$request->getUri()."'>Download</a>";
        }
    }
?>