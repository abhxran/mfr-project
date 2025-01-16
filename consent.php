<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
//error_reporting(E_ALL);

/* * */

require 'vendor/autoload.php';
include('include/sendmail.php');
 
use \Firebase\JWT\JWT;

$secret_key = 'be43229b-84f9-4e62-9df3-3db2fbf5e74b';

$now = time();
$expiry = $now + 3600;

$jwt_payload = array(
    'iss' => 'https://tools.mindforceresearch.com',
    'aud' => 'https://dpdp.tools.mindforceresearch.com',
    'email' => 'compliance@mindforceresearch.com',
    'expiry' => $expiry
);

$token = JWT::encode($jwt_payload, $secret_key, 'HS256');

//echo "<br>" . $token . "<br>";

/* * */
//print_r($_POST);

$postData = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'department' => 'MFR Website',
    'template_id' => '15'
];

//print_r($postData);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://dpdp.tools.mindforceresearch.com/api/v1/create_consent',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => http_build_query($postData),
  CURLOPT_HTTPHEADER => array('Authorization: Bearer '.$token),
));
$response = curl_exec($curl);

$status = 0; $message = "Something went wrong while submitting the consent! Please try after sometime."; //$payload = [];

if (curl_errno($curl)) {
    echo 'cURL Error: ' . curl_error($curl);
} else {
    if ($response !== false) {
        $resp = json_decode($response,true);
        if(isset($resp["success"])){
            $status = 1;
            $message = "Consent submitted successfully!";
            //$payload = $resp["data"];
            $to = $_POST['email'];
            $subject = "Consent Confirmation";
            $mailcontent = "
            <p>Dear ". $_POST['name'].",</p>

            <p>
            MINDFORCE RESEARCH respects and understands the importance of your privacy and is therefore committed to ensure complete protection to the personal information.
            </p>
            <p>        
            We have received your informed consent regarding the processing of your personal data on ".date('h:i:s d M Y').". Your consent is Valid for 5 years from the recorded date unless withdrawn by you.
            </p>
            <p>        
            We hereby serve Privacy Notice  detailing purpose for which your personal information will be processed and  the manner you can exercise your Data principal Rights. You may download this Notice on your local device.
            </p>
            <p> 
            You have a right to withdraw your consent for processing of your personal data  at any time by selecting option at our home page Principal Rights.
            </p>
            <p> 
            If you have any concerns regarding the processing of your personal data, please reach out to us through the \"Principal Rights\" section on our homepage, and we will respond to your concerns promptly.
            </p>
            <p> 
            In case you are not satisfied with our redressal efforts, you may (if you so desire) approach the Data Protection Board of India.
            </p>
            <p> 
            Warm regards,<br>
            <b>Data Protection Officer</b>
            </p>
            <p> 
            MINDFORCE RESEARCH, TOWER 5, <br>
            ASSOTECH BUSINESS CRESTERRA, <br>
            SECTOR 135, NOIDA - 201305, INDIA<br>
            https://www.minforceresearch.com<br>
            ";
                    
            $status = sendComplianceSMTPEmail($to, $subject, $mailcontent );
            //echo $status;

        }
    }
}


$response = array("status"=>$status, "message"=>$message);

echo json_encode($response);

curl_close($curl);


?>
