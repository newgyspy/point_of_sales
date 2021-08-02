<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.sms.to/sms/send",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS =>"{\n    \"message\": \"This is a test message\",\n    \"to\": \"+256759939936\",\n    \"sender_id\": \"SMS.to\",\n    \"callback_url\": \"https://sms.to/callback/handler\"\n}",
	CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Accept: application/json",
			"Authorization: Bearer <hbRpfz6K9kMPU2iQB5WJZpTNjskwvDiy>"
		),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>