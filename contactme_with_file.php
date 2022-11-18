<?php 

require_once ('./functions/func.php');

$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
$SERVER_NAME = isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : '';
    $filename = $_FILES['file']['name'];
    $location = "uploads/".$filename;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
    // /* Valid extensions */
    $valid_extensions = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');
    // /* Check file extension */
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
             

        // $tmp = $_FILES['file']['tmp_name'];
        // $file = $_FILES['file']['name'];
        // $subject = "testing";
        // $message = "hii";

        // send_mail_to_me($tmp, $file, $subject, $message);

    //    /* Upload file */
       if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
        $response['status'] = 200;
        $response['message'] = "http://$SERVER_NAME/$location";
        echo json_encode($response);
       }
       else{
        $response['status'] = 500;
        $response['message'] = "file upoad fail";
        echo json_encode($response);
       }
    }else{
        $response['status'] = 400;
        $response['message'] = "This file Extension not supported please attach pdf, jpg, jpeg, png, doc, docx";
        echo json_encode($response);
    }

