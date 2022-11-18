<?php

$response = array( 
    'status' => 200, 
    'message' => 'Form details submited sucessfully...' 
); 


$name = $_POST['name'];
$email = $_POST['email'];
$phone_no = $_POST['phone'];
$url = $_POST['url'];
$message = $_POST['message'];

echo json_encode($response);