<?php
    require("../../vendor/autoload.php");
    class AWSClient {
        function __construct() {
            $this->s3 = new Aws\S3\S3Client([
                'region'  => 'us-east-1',
                'version' => 'latest',
                'credentials' => [
                    'key'    => "AKIAUTZKO3SNYPVE6ILQ",
                    'secret' => "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",
                ]
            ]);
            $this->bucket = "cnkbucket";
        }

        function upload($key, $source) {
            // Upload video
            $result = $this->s3->putObject([
                'Bucket' => $this->bucket,
                'Key'    => $key,
                'Body'   => 'Conversion made with Lawrence and Émilie \' API',
                'SourceFile' => $source
            ]);
            return $result["@metadata"]["statusCode"];
        }

        // Download video
        function download($key, $outputPath) {
            // Link
            // $key = substr($key, 1, -1);
            $cmd = $this->s3->getCommand('GetObject', [
                'Bucket' => $this->bucket,
                'Key' => $key
            ]);
            
            $request = $this->s3->createPresignedRequest($cmd, '+5 minutes');
            echo "AWS client: ";
			var_dump($outputPath);
			echo "<br>";
            return "<a href='".(string)$request->getUri()."'>View file</a><br>
                    <a href='" . $outputPath . "' download>Download</a>";
        }
    }
?>