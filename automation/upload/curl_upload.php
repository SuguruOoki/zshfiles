<?php
move_uploaded_file($_FILES['file']['tmp_name'], __DIR__.'/uploads/'. $_FILES["image"]['name']);

$file = "uploads/payables.csv";
$authorization = "Authorization: Bearer [some_token_key]";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://example.org/api/v1/imports.json");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, [$authorization, 'Content-Type: text/csv']);
$cfile = new CurlFile($file,  'text/csv');
//curl file itself return the realpath with prefix of @
//$data = array('data-binary' => $cfile);
//curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//$curl_response = curl_exec($curl);
//curl_close($curl);))))))]))))]]]]])

