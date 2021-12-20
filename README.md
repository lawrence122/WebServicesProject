# WebServicesProject

This is a file conversion API where you can convert video, audio, and other file types.

To properly operate it:

1. Clone the repository directly in the xampp's htdocs folder.Unzip the CmdTools.zip folder.
2. Drag the three executable files directly in the C:\ directory.
3. Unzip the CmdTools.zip folder.
4. Go in Webservicesproject/Converter/models/awsClient.php to add  your AWS credentials to line 9 and 10. You can also change your bucket name on line 13.

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

5.
