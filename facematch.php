<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        require_once('./awsconfig.php');
        require 'vendor/autoload.php';
        use Aws\Rekognition\RekognitionClient;
        $config = get_aws_config();
        $credentials = new Aws\Credentials\Credentials($config['aws_key'], $config['aws_secret']);
        $matchimage = $_GET["imagematch"];
        $threshold = 80;
        $rekognitionClient = RekognitionClient::factory(array(
            'region'    => "us-east-1",
            'version'   => 'latest',
            'credentials' => $credentials
        ));

        $refImageUrl = "http://localhost/aws_facerecognition/Capture1.PNG";
        $compareImage = "http://localhost/aws_facerecognition/".$matchimage;

        $compareFaceResults= $rekognitionClient->compareFaces([
            'SimilarityThreshold' => $threshold,
            'SourceImage' => [
                    'Bytes' => file_get_contents($refImageUrl)
                ],
            'TargetImage' => [
                    'Bytes' => file_get_contents($compareImage)
                ],
        ]);
    ?>

    <style>
        #leftbox {
        float:left;
        width:50%;
        height:280px;
        }
        #rightbox{
            float:right;
            width:50%;
            height:280px;
        }
        h1{
            color:blue;
            text-align:center;
        }
    </style>
</head>
<body>
    <div>
        <h1>AWS Facematch Result</h1>
    </div>
    <div id = 'boxes'>
        <div id = 'leftbox'>
            <img src='Capture1.png'/>
        </div>
        <div id = 'rightbox'>
            <img src='<?php echo $matchimage; ?>'/>
        </div>
    </div>
    <div>
        <h2>Below is the result object of AWS. Similarity property is available if face match found.</h2>
    </div>
    <div>
        <?php
            echo "<pre>";
            print_r($compareFaceResults);
            echo "</pre>";
        ?>
    </div>
</body>
</html>